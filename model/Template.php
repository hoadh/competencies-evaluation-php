<?php


namespace Model;


class Template
{
    public $id;
    public $name;
    public $program_id;
    public $program_name;

    public function __construct($name, $programId)
    {
        $this->name = $name;
        $this->program_id = $programId;
    }

    public function setProgramName($programName) {
        $this->program_name = $programName;
    }
}
