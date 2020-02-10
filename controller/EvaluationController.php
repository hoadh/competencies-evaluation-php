<?php


namespace Controller;

use Model\Evaluation;
use Model\EvaluationDetail;

class EvaluationController
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

    public function list() {
        $student_id = $id = $_GET['student_id'];
        $evaluations = $this->commonService->getAllEvaluationByStudentId($student_id);
        include 'view/evaluations/list.php';
    }

    public function step_1() {
        $student_id = $id = $_GET['student_id'];
        $templates = $this->commonService->getAllTemplates();
        include 'view/evaluations/step_1.php';
    }

    public function step_2() {
        $student_id = $id = $_GET['student_id'];
        $template_id = $id = $_GET['template_id'];
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $tempate = $this->commonService->getTemplateById($template_id);
            $outcomes = $this->commonService->getAllOutcomes($template_id);
            include 'view/evaluations/step_2.php';
        } else {

            $newEvaluation = new Evaluation($student_id, $template_id, "");
            $evaluationId = $this->commonService->createEvaluation($newEvaluation);
            $evaluations = $_POST['evaluations'];

            $evaluationDetails = [];
            foreach ($evaluations as $evaluation) {
                $parts = explode("_", $evaluation);
                if (sizeof($parts) >= 2) {
                    $evaluationDetails[] = new EvaluationDetail($evaluationId, $parts[0], $parts[1]);
                }
            }
            $res = $this->commonService->createManyEvaluationDetails($evaluationDetails);
            if ($res) {
                include 'view/evaluations/step_3.php';
            }
        }
    }
}