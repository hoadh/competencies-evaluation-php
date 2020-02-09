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

    public function add_many_outcomes() {
        $template_id = $_GET['template_id'];
        $parent_id = $_GET['parent_id'];
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            include 'view/outcomes/add_many_outcomes.php';
        } else {
            $step = $_GET['step'];
            if (isset($step) && $step == '2') {

                $_outcomes = $_POST['outcomes'];
                $outcomes_array = explode("\n", $_outcomes);
                $outcomes = [];
                foreach ($outcomes_array as $outcome) {
                    if (strlen($outcome) > 0) {
                        $outcomes[] = trim($outcome);
                    }
                }
                include 'view/outcomes/add_many_outcomes_step_2.php';
            } else if (isset($step) && $step == '3') {
                $outcomes = $_POST['outcomes'];
                $res = $this->commonService->createManyOutcomes($template_id, $parent_id, $outcomes);
                $message = 'Đã được tạo';
                include 'view/outcomes/add_many_outcomes_step_2.php';
            }

        }
    }

}