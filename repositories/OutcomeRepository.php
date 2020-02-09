<?php


namespace Repository;


use Model\Outcome;

class OutcomeRepository
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($outcome) {
        $sql = "INSERT INTO `outcomes`(`title`, `parent_id`, `can_evaluate`) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $outcome->title);
        $statement->bindParam(2, $outcome->parent_id);
        $statement->bindParam(3, $outcome->can_evaluate);
        return $statement->execute();
    }

    public function getAll($template_id)
    {
        $sql = "SELECT * FROM `outcomes` where `template_id` = ? order by `order`";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $template_id);
        $statement->execute();
        $result = $statement->fetchAll();
        if (!$statement) {
            echo "\PDO::errorInfo():\n";
            var_dump($this->connection->errorInfo());
        }
        $outcomes = [];
        foreach ($result as $row) {
            $outcome = new Outcome($row['title'], $row['parent_id'], $row['can_evaluate']);
            $outcome->id = $row['id'];
            $outcomes[] = $outcome;
        }
        return $outcomes;
    }

    public function getAllByParentId($template_id, $parent_id)
    {
        $sql = "SELECT * FROM `outcomes` where `template_id` = ? and `parent_id` = ? order by order desc";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $template_id);
        $statement->bindParam(2, $parent_id);
        $statement->execute();
        $result = $statement->fetchAll();
        if (!$statement) {
            echo "\PDO::errorInfo():\n";
            var_dump($this->connection->errorInfo());
        }
        $outcomes = [];
        foreach ($result as $row) {
            $outcome = new Outcome($row['title'], $row['parent_id'], $row['can_evaluate']);
            $outcome->id = $row['id'];
            $outcomes[] = $outcome;
        }
        return $outcomes;
    }
}