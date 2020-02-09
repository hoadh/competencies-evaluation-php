<?php


namespace Model;


class Outcome
{
    public $id;
    public $title;
    public $parent_id;
    public $can_evaluate;

    public function __construct($title, $parentId, $canEvaluate = true)
    {
        $this->title = $title;
        $this->parent_id = $parentId;
        $this->can_evaluate = $canEvaluate;
    }
}