<?php
namespace Model;

class Student
{
    public $id;
    public $name;
    public $code;
    public $clazz_id;

    public function __construct($name, $code, $clazz_id)
    {
        $this->name = $name;
        $this->code = $code;
        $this->clazz_id = $clazz_id;
    }
}