<?php


namespace Repository;

use Model\Template;

class TemplateRepository
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($template) {
        $sql = "INSERT INTO `templates`(`name`, `program_id`) VALUES (?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $template->name);
        $statement->bindParam(2, $template->program_id);
        return $statement->execute();
    }

    public function update($id, $template){
        $sql = "UPDATE `templates` SET `name` = ?, `program_id` = ? WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $template->name);
        $statement->bindParam(2, $template->program_id);
        $statement->bindParam(3, $id);
        return $statement->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM `templates` WHERE `id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function get($id){
        $sql = "SELECT t.id, t.name, t.program_id, p.name as program_name FROM `templates` t INNER JOIN `programs` p ON t.program_id = p.id WHERE t.`id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $template = new Template($row['name'], $row['program_id']);
        $template->id = $row['id'];
        return $template;
    }

    public function getAll()
    {
        $sql = "SELECT t.id, t.name, t.program_id, p.name as program_name 
                FROM `templates` t
                INNER JOIN `programs` p
                ON t.program_id = p.id ";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        if (!$statement) {
            echo "\PDO::errorInfo():\n";
            var_dump($this->connection->errorInfo());
        }
        $templates = [];
        foreach ($result as $row) {
            $template = new Template($row['name'], $row['program_id']);
            $template->setProgramName($row['program_name']);
            $template->id = $row['id'];
            $templates[] = $template;
        }
        return $templates;
    }
}