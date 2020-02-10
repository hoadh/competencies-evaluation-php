<?php


namespace Model;


class EvaluationDetail
{
    public $evaluation_id;
    public $outcome_id;
    public $evaluate;

    public function __construct($evaluation_id, $outcome_id, $evaluate)
    {
        $this->evaluation_id = $evaluation_id;
        $this->outcome_id = $outcome_id;
        $this->evaluate = $evaluate;
    }
}