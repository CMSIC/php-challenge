<?php
namespace App\Core;

error_reporting(E_ALL);
ini_set('display_errors', '1');


abstract class SQL{

    protected $pdo;
    protected $table;

    public function __construct()
    {
        //Connexion à la bdd
        //SINGLETON à réaliser
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
        return ($queryPrepared->fetch() ? $queryPrepared->fetch() : null);
    }


    public function save(): void
    {
        $columns = get_object_vars($this);
        $columnsToExclude = get_class_vars(get_class());
        $columns = array_diff_key($columns, $columnsToExclude);

        // Include date_inserted, date_updated, and country in the $columns array
        if ($this->date_inserted !== null) {
            $columns['date_inserted'] = $this->date_inserted;
        }
        if ($this->date_updated !== null) {
            $columns['date_updated'] = $this->date_updated;
        }
        if ($this->country !== null) {
            $columns['country'] = $this->country;
        }

        if(is_numeric($this->getId()) && $this->getId()>0) {
            // Update date_updated every time save() is called
            $this->setDateUpdated(new \DateTime());
            $sqlUpdate = [];
            foreach ($columns as $column=>$value) {
                $sqlUpdate[] = $column."=:".$column;
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

}
