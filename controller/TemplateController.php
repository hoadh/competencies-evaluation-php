<?php


namespace Controller;


use Model\Template;

class TemplateController
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
    public function index(){
        $templates = $this->commonService->getAllTemplates();
        include 'view/templates/list.php';
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $programs = $this->commonService->getAllPrograms();
            include 'view/templates/add.php';
        } else {
            $template = new Template($_POST['name'], $_POST['program_id']);
            $res = $this->commonService->createTemplate($template);
            $message = 'Template đã được tạo';
            include 'view/templates/add.php';
        }
    }

    public function view(){
        $id = $_GET['id'];
        $template = $this->commonService->getTemplateById($id);
        include 'view/templates/view.php';
    }

    public function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $id = $_GET['id'];
            $template = $this->commonService->getTemplateById($id);
            include 'view/templates/delete.php';
        } else {
            $id = $_POST['id'];
            $this->commonService->deleteTemplateById($id);
            header('Location: ./index.php');
        }
    }

    public function edit(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $id = $_GET['id'];
            $programs = $this->commonService->getAllPrograms();
            $template = $this->commonService->getTemplateById($id);
            include 'view/templates/edit.php';
        } else {
            $id = $_POST['id'];
            $template = new Template($_POST['name'], $_POST['program_id']);
            $this->commonService->updateTemplateById($id, $template);
            header('Location: ./index.php?page=templates/list');
        }
    }
}