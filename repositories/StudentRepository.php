<?php

namespace Repository;

use Model\Student;

class StudentRepository
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($student) {
        $sql = "INSERT INTO `students`(`name`, `code` ,`clazz_id`) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $student->name);
        $statement->bindParam(2, $student->code);
        $statement->bindParam(3, $student->clazz_id);
        return $statement->execute();
    }

    public function update($id, $student){
        $sql = "UPDATE `students` SET `name` = ?, `code` = ?, `clazz_id` = ? WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $student->name);
        $statement->bindParam(2, $student->code);
        $statement->bindParam(3, $student->clazz_id);
        $statement->bindParam(4, $id);
        return $statement->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM `students` WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function get($id){
        $sql = "SELECT * FROM `students` WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $clazz = new Student($row['name'], $row['code'], $row['clazz`_id']);
        $clazz->id = $row['id'];
        return $clazz;
    }
    public function getAllByClazzId($clazz_id){
        $intClazzId = (int) $clazz_id;
        $sql = "SELECT * FROM `students` WHERE `clazz_id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $intClazzId);
        $statement->execute();
        $result = $statement->fetchAll();
        if (!$statement) {
            echo "\PDO::errorInfo():\n";
            var_dump($this->connection->errorInfo());
        }
        $students = [];
        foreach ($result as $row) {
            $clazz = new Student($row['name'], $row['code'], $row['clazz_id']);
            $clazz->id = $row['id'];
            $students[] = $clazz;
        }
        return $students;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `students`";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        if (!$statement) {
            echo "\PDO::errorInfo():\n";
            var_dump($this->connection->errorInfo());
        }
        $students = [];
        foreach ($result as $row) {
            $clazz = new Student($row['name'], $row['code'], $row['clazz_id']);
            $clazz->id = $row['id'];
            $students[] = $clazz;
        }
        return $students;
    }
}