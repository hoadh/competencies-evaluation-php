<?php

namespace Model;

class Program
{
    public $id;
    public $name;
    public $type;

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }
}