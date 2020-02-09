<?php


namespace Model;


class Outcome
{
    public $id;
    public $title;
    public $parent_id;
    public $can_evaluate;
    public $template_id;
    public $order;

    public function __construct($template_id, $title, $parentId, $canEvaluate = true)
    {
        $this->template_id = $template_id;
        $this->title = $title;
        $this->parent_id = $parentId;
        $this->can_evaluate = $canEvaluate;
    }
}