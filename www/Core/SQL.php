<?php
namespace App\Core;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'vendor/autoload.php';

use Faker;


class SQL{

    protected $pdo;
    private static ?SQL $instance = null;
    protected $table;

    protected function __construct()
    {
        try {
            $this->pdo = new \PDO("pgsql:host=database;dbname=esgi;port=5432", "esgi", "Test1234");
        }catch(\Exception $e){
            die("Erreur SQL : ".$e->getMessage());
        }
        //$this->table = static::class;
        //$this->table = static::class;
        $classExploded = explode("\\", get_called_class());
        $this->table = "esgi_".end($classExploded);
    }

    public static function getInstance(): SQL
    {
        if (self::$instance === null) {
            self::$instance = new SQL();
        }
        return self::$instance;
    }

    public static function populate(Int $id): object
    {
        $class = get_called_class();
        $objet = new $class();
        return $objet->getOneWhere(["id"=>$id]);
    }

    public function getOneWhere(array $where): ?object
    {
        $sqlWhere = [];
        foreach ($where as $column=>$value) {
            $sqlWhere[] = $column."=:".$column;
        }
        $queryPrepared = $this->pdo->prepare("SELECT * FROM ".$this->table." WHERE ".implode(" AND ", $sqlWhere));
        $queryPrepared->setFetchMode( \PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute($where);
        $result = $queryPrepared->fetch();  // Call fetch only once and store the result
        return $result ? $result : null;
    }


    public function save(): void
    {
        $columns = get_object_vars($this);
        $columnsToExclude = get_class_vars(get_class());
        $columns = array_diff_key($columns, $columnsToExclude);

        //var_dump($this->getEmail());

        if(is_numeric($this->getId()) && $this->getId()>0) {
            // Update date_updated every time save() is called
            $this->setDateUpdated(new \DateTime());
            $sqlUpdate = [];

            foreach ($columns as $column=>$value) {

                if ($column === 'date_updated') {
                    $sqlUpdate[] = $column."= :".$column;
                } else {
                    $sqlUpdate[] = $column."=:".$column;
                }

            }
            $queryPrepared = $this->pdo->prepare("UPDATE ".$this->table.
                " SET ".implode(",", $sqlUpdate). " WHERE id=".$this->getId());
        }else{
            // Set date_inserted to the current date and time when a new user is created
            $this->setDateInserted(new \DateTime());
            $queryPrepared = $this->pdo->prepare("INSERT INTO ".$this->table.
                " (".implode("," , array_keys($columns) ).") 
        VALUES
         (:".implode(",:" , array_keys($columns) ).") ");
        }

        $queryPrepared->execute($columns);
    }

    public function delete(): void
    {
        $queryPrepared = $this->pdo->prepare("DELETE FROM ".$this->table." WHERE id=".$this->getId());
        $queryPrepared->execute();
    }

    public function getAll(): array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM ".$this->table);
        $queryPrepared->setFetchMode( \PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }

}
