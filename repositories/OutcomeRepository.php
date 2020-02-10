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
        $order = "";
        if ($outcome->parent_id == 0) {
            $order = $next[0];
        } else if (isset($next) && sizeof($next) > 0) {
            if ($next[0] == '1' && $next[1] == null) {
                $order = '1.1';
            } else if (strlen($next[1]) == 1) {
                $order = $next[1] . "." . $next[0];
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
//        $statement->debugDumpParams();
        if (!$res) {
            echo "\PDO::errorInfo():\n";
            var_dump($this->connection->errorInfo());
        }
        return $res;
    }

    public function createMany($template_id, $parent_id, $outcomeTitles) {
        $next = $this->getMaxOrder($template_id, $parent_id);
        $nextNumber = 0;
        $parts = [];
        $lastPart = 0;
        $orders = [];
        if (isset($next) && sizeof($next) > 0) {
            if ($next[0] == '1' && $next[1] == null) {
                $nextNumber = 1;
            } else if (strlen($next[1]) == 1) {
                $nextNumber = (int) $next[0];
            } else {
                $parts = explode(".", $next[1]);
                $parts[] = $next[0];
                $nextNumber = (int) $next[0];
                $lastPart = sizeof($parts) - 1;
                /*
                $largest = ((int) $next[0] > (int) $parts[$lastPart]) ? (int) $next[0] : (int) $parts[$lastPart];
                $parts[] = $largest;
                $nextNumber = (int) $largest;*/
            }
        }


        $sql = "INSERT INTO `outcomes`(`title`, `parent_id` , `template_id`, `order`) VALUES (?, ?, ?, ?)";
        $statement = null;
        $outcomeTitlesSize = sizeof($outcomeTitles);
        if ($outcomeTitlesSize > 0) {

            for($i=1; $i<$outcomeTitlesSize; $i++){
                $sql .= ", (?, ?, ?, ?)";
            }

            $statement = $this->connection->prepare($sql);

            $count = 1;

            // need build the order string before binding params
            for($i=0; $i<$outcomeTitlesSize; $i++){
                $parts[$lastPart] = $nextNumber++;
                $order = implode(".", $parts) . "";
                $orders[] = $order;
            }

            for($i=0; $i<$outcomeTitlesSize; $i++){
                $statement->bindParam($count++, $outcomeTitles[$i]);
                $statement->bindParam($count++, $parent_id);
                $statement->bindParam($count++, $template_id);
                $statement->bindParam($count++, $orders[$i]);
            }

        }

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
                SELECT max(`order`) as `next` FROM (
                    SELECT `order` FROM `outcomes` where `template_id` = ? and `id` = ?
                    union
                    SELECT `order` FROM `outcomes` where `template_id` = ? and `parent_id` = ?
                ) a";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $template_id);
        $statement->bindParam(2, $parent_id);
        $statement->bindParam(3, $template_id);
        $statement->bindParam(4, $parent_id);
        $statement->bindParam(5, $template_id);
        $statement->bindParam(6, $parent_id);
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