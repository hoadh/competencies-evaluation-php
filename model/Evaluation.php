<?php


namespace Model;


class Evaluation
{
    public $id;
    public $student_id;
    public $template_id;
    public $template_name;
    public $created_date;

    public function __construct($student_id, $template_id, $created_date)
    {
        $this->template_id = $template_id;
        $this->student_id = $student_id;
        $this->created_date = $created_date;
    }
}