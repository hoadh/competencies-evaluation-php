<?php


namespace Repository;


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
}