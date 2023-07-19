<?php


require __DIR__ . "/../library/get-database-connection.php";

class FilmModel
{
    public static function getAll()
    {
        $connection = getDatabaseConnection();
        $query = $connection->query("SELECT * FROM esgi_film;");
        return $query->fetchAll();
    }

    public static function create($json)
    {
        $connection = getDatabaseConnection();
        $query = $connection->prepare("INSERT INTO esgi_film( title, description, year, length, category) VALUES(:title, :description, :year, :length, :category);");
        $query->execute($json);
    }


    public static function deleteById($json)
    {
        $connection = getDatabaseConnection();
        $query = $connection->prepare("DELETE FROM esgi_film WHERE id = $json;");
        $query->execute();
    }
}
