<?php
namespace Model;

class ProgramDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($program) {
        $sql = "INSERT INTO `programs`(`name`, `type`) VALUES (?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $program->name);
        $statement->bindParam(2, $program->type);
        return $statement->execute();
    }

    public function update($id, $post){
        $sql = "UPDATE `programs` SET `name` = ?, `type` = ? WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $post->name);
        $statement->bindParam(2, $post->type);
        $statement->bindParam(3, $id);
        return $statement->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM `programs` WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function get($id){
        $sql = "SELECT * FROM `programs` WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $post = new Program($row['name'], $row['type']);
        $post->id = $row['id'];
        return $post;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `programs`";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        if (!$statement) {
            echo "\PDO::errorInfo():\n";
            var_dump($this->connection->errorInfo());
        }
        $programs = [];
        foreach ($result as $row) {
            $post = new Program($row['name'], $row['type']);
            $post->id = $row['id'];
            $programs[] = $post;
        }
        return $programs;
    }
}