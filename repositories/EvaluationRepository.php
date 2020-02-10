<?php


namespace Repository;


use Model\Evaluation;

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

    public function getAllByStudentId($student_id){
        $sql = "SELECT e.id, e.template_id, e.student_id, t.name as template_name, e.created_date FROM `evaluations` e
                JOIN `templates` t ON e.template_id = t.id
                JOIN `students` s ON e.student_id = s.id
                WHERE `student_id` = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $student_id);
        $statement->execute();
        $result = $statement->fetchAll();
        if (!$statement) {
            echo "\PDO::errorInfo():\n";
            var_dump($this->connection->errorInfo());
        }
        $evaluations = [];
        foreach ($result as $row) {
            $evaluation = new Evaluation($row['student_id'], $row['template_id'], $row['created_date']);
            $evaluation->id = $row['id'];
            $evaluation->template_name = $row['template_name'];
            $evaluations[] = $evaluation;
        }
        return $evaluations;
    }
}