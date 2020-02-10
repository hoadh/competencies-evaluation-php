<?php


namespace Repository;


use Model\Outcome;

class EvaluationDetailRepository
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function createMany($outcomeEvaluations) {

        $sql = "INSERT INTO `evaluation_details`(`evaluation_id`, `outcome_id` , `evaluate`) VALUES (?, ?, ?)";
        $statement = null;
        $size = sizeof($outcomeEvaluations);
        if ($size > 0) {

            for($i=1; $i<$size; $i++) {
                $sql .= ", (?, ?, ?)";
            }

            $statement = $this->connection->prepare($sql);

            $count = 1;
            for($i=0; $i<$size; $i++){
                $statement->bindParam($count++, $outcomeEvaluations[$i]->evaluation_id);
                $statement->bindParam($count++, $outcomeEvaluations[$i]->outcome_id);
                $statement->bindParam($count++, $outcomeEvaluations[$i]->evaluate);
            }
        }
        // $statement->debugDumpParams();
        return $statement->execute();
    }

    public function getDetailByEvaluationId($evaluation_id) {
        $sql = 'SELECT o.title,
                       o.can_evaluate,
                       o.parent_id,
                       o.`order`,
                       CASE WHEN ed.evaluate = 0 THEN \'N/A\'
                            WHEN ed.evaluate = 1 THEN \'Chưa Đạt\'
                            WHEN ed.evaluate = 2 THEN \'Đạt\'
                            WHEN ed.evaluate IS NULL THEN \'\'
                        END AS `evaluate`
                FROM outcomes o
                LEFT JOIN evaluations e on o.template_id = e.template_id
                LEFT JOIN evaluation_details ed on e.id = ed.evaluation_id and ed.outcome_id = o.id
                WHERE e.id = ?
                ORDER BY o.`order`';

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $evaluation_id);
        $statement->execute();
        $result = $statement->fetchAll();
        if (!$statement) {
            echo "\PDO::errorInfo():\n";
            var_dump($this->connection->errorInfo());
        }
        $outcomes = [];
        foreach ($result as $row) {
            $outcome = new Outcome('', $row['title'], $row['parent_id'], $row['can_evaluate']);
            $outcome->evaluate = $row['evaluate'];
            $outcomes[] = $outcome;
        }
        return $outcomes;
    }
}