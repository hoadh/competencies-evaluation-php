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
        $next = $this->getMaxOrder($outcome->template_id, $outcome->parent_id);
//        var_dump($next);
        $order = "";
        if (isset($next) && sizeof($next) > 0) {
            if ($next[0] == '1') {
                $order = '1';
            } else if (strlen($next[1]) == 1) {
                $order = $next[0];
            } else {
                $parts = explode(".", $next[1]);
                $parts[sizeof($parts) - 1] = $next[0];
                $order = implode(".", $parts);
            }
        }

//        var_dump($order);

        $canEvaluate = ($outcome->can_evaluate) ? 1 : 0;
        $sql = "INSERT INTO `outcomes` (`title`, `parent_id`, `can_evaluate`, `template_id`, `order`) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $outcome->title);
        $statement->bindParam(2, $outcome->parent_id);
        $statement->bindParam(3, $canEvaluate);
        $statement->bindParam(4, $outcome->template_id);
        $statement->bindParam(5, $order);
        $res = $statement->execute();
        $statement->debugDumpParams();
        if (!$res) {
            echo "\PDO::errorInfo():\n";
            var_dump($this->connection->errorInfo());
        }
        return $res;
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
            $outcome = new Outcome($row['template_id'], $row['title'], $row['parent_id'], $row['can_evaluate']);
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
            $outcome = new Outcome($row['template_id'], $row['title'], $row['parent_id'], $row['can_evaluate']);
            $outcome->id = $row['id'];
            $outcomes[] = $outcome;
        }
        return $outcomes;
    }

    public function getMaxOrder($template_id, $parent_id)
    {
        $sql = "SELECT count(*)+1 as `next` FROM `outcomes` where `template_id` = ? and `parent_id` = ?
                union
                SELECT max(`order`) as `next` FROM `outcomes` where `template_id` = ? and `parent_id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $template_id);
        $statement->bindParam(2, $parent_id);
        $statement->bindParam(3, $template_id);
        $statement->bindParam(4, $parent_id);
        $statement->execute();
        $result = $statement->fetchAll();
        if (!$statement) {
            echo "\PDO::errorInfo():\n";
            var_dump($this->connection->errorInfo());
        }
        $next = [];
        foreach ($result as $row) {
            $next[] = $row['next'];
        }
        return $next;
    }
}