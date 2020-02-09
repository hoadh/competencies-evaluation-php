<?php


namespace Controller;


use Model\Outcome;

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
        $template_id = $_GET['template_id'];
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            include 'view/outcomes/add_header.php';
        } else {
            $header = new Outcome($template_id, $_POST['title'], 0, false);
            $res = $this->commonService->createOutcome($header);
            $message = 'Đã được tạo';
            include 'view/outcomes/add_header.php';
        }
    }

    public function add_subheader() {
        $template_id = $_GET['template_id'];
        $parent_id = $_GET['parent_id'];
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            include 'view/outcomes/add_subheader.php';
        } else {
            $header = new Outcome($template_id, $_POST['title'], $_POST['parent_id'], false);
            $res = $this->commonService->createOutcome($header);
            $message = 'Đã được tạo';
            include 'view/outcomes/add_subheader.php';
        }
    }

}