<?php


namespace Controller;


class OutcomeController
{
    public $commonService;

    public function __construct($commonService)
    {
        try {
            $this->commonService = $commonService;
        } catch (\Exception $exception) {
            var_dump($exception);
        }

    }

    public function index() {
        $template_id = $_GET['template_id'];
        $tempate = $this->commonService->getTemplateById($template_id);
        $outcomes = $this->commonService->getAllOutcomes($template_id);
        include 'view/outcomes/list.php';
    }

    public function add_header() {
        include 'view/outcomes/add_header.php';
    }

    public function add_subheader() {
        include 'view/outcomes/add_subheader.php';
    }

}