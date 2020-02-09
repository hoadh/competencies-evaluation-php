<?php
namespace Controller;

use \model\DBConnection;
use \model\ClazzDB;
use \model\Clazz;

class ClazzController
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
        $clazzes = $this->commonService->getAllClazzes();
        include 'view/clazzes/list.php';
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $programs = $this->commonService->getAllPrograms();
            include 'view/clazzes/add.php';
        } else {
            $clazz = new Clazz($_POST['name'], $_POST['coach'], $_POST['program_id']);
            $res = $this->commonService->createClazz($clazz);
            $message = 'Program created';
            include 'view/clazzes/add.php';
        }
    }

    public function view(){
        $id = $_GET['id'];
        $clazz = $this->commonService->getClazzById($id);
        include 'view/clazzes/view.php';
    }

    public function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $id = $_GET['id'];
            $clazz = $this->commonService->getClazzById($id);
            include 'view/clazzes/delete.php';
        } else {
            $id = $_POST['id'];
            $this->commonService->deleteClazzById($id);
            header('Location: ./index.php');
        }
    }

    public function edit(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $id = $_GET['id'];
            $programs = $this->commonService->getAllPrograms();
            $clazz = $this->commonService->getClazzById($id);
            include 'view/clazzes/edit.php';
        } else {
            $id = $_POST['id'];
            $clazz = new Clazz($_POST['name'], $_POST['coach'], $_POST['program_id']);
            $this->commonService->updateClazzById($id, $clazz);
            header('Location: ./index.php?page=clazzes/list');
        }
    }
}