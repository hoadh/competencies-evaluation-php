<?php
namespace Repository;

use Model\Clazz;

class ClazzDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($program) {
        $sql = "INSERT INTO `clazzes`(`name`, `coach` ,`program_id`) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $program->name);
        $statement->bindParam(2, $program->coach);
        $statement->bindParam(3, $program->program_id);
        return $statement->execute();
    }

    public function update($id, $post){
        $sql = "UPDATE `clazzes` SET `name` = ?, `coach` = ?, `program_id` = ? WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $post->name);
        $statement->bindParam(2, $post->coach);
        $statement->bindParam(3, $post->program_id);
        $statement->bindParam(4, $id);
        return $statement->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM `clazzes` WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function get($id){
        $sql = "SELECT * FROM `clazzes` WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $clazz = new Clazz($row['name'], $row['coach'], $row['program_id']);
        $clazz->id = $row['id'];
        return $clazz;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `clazzes`";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        if (!$statement) {
            echo "\PDO::errorInfo():\n";
            var_dump($this->connection->errorInfo());
        }
        $clazzes = [];
        foreach ($result as $row) {
            $clazz = new Clazz($row['name'], $row['coach'], $row['program_id']);
            $clazz->id = $row['id'];
            $clazzes[] = $clazz;
        }
        return $clazzes;
    }
}