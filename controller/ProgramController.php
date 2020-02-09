<?php
namespace Controller;

use \model\Program;

class ProgramController
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
        $programs = $this->commonService->getAllPrograms();
        include 'view/programs/list.php';
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            include 'view/programs/add.php';
        } else {
            $programs = new Program($_POST['name'], $_POST['type']);
            $res = $this->commonService->createProgram($programs);
            $message = 'Program created';
            include 'view/programs/add.php';
        }
    }

    public function view(){
        $id = $_GET['id'];
        $program = $this->commonService->getProgramById($id);
        include 'view/programs/view.php';
    }

    public function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $id = $_GET['id'];
            $program = $this->commonService->getProgramById($id);
            include 'view/programs/delete.php';
        } else {
            $id = $_POST['id'];
            $this->commonService->deleteProgramById($id);
            header('Location: ./index.php');
        }
    }

    public function edit(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $id = $_GET['id'];
            $program = $this->commonService->getProgramById($id);
            include 'view/programs/edit.php';
        } else {
            $id = $_POST['id'];
            $program = new Program($_POST['name'], $_POST['type']);
            $this->commonService->updateProgramById($id, $program);
            header('Location: ./index.php');
        }
    }
}