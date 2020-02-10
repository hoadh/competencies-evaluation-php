<?php


namespace Repository;


class EvaluationRepository
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($evaluation) {
        $sql = "INSERT INTO `evaluations`(`student_id`, `template_id`, `created_date`) VALUES (?, ?, NOW())";
        $statement = $this->connection->prepare($sql);
        $this->connection->beginTransaction();
        $statement->bindParam(1, $evaluation->student_id);
        $statement->bindParam(2, $evaluation->template_id);
        $statement->execute();
        $this->connection->commit();
        $statement = $this->connection->query("SELECT LAST_INSERT_ID()");
        $lastId = $statement->fetchColumn();
        return $lastId;
    }
}