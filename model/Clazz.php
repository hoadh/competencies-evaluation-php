<?php

namespace Model;

class Clazz
{
    public $id;
    public $name;
    public $coach;
    public $program_id;

    public function __construct($name, $coach, $programId)
    {
        $this->name = $name;
        $this->coach = $coach;
        $this->program_id = $programId;
    }
}
