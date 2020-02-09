<?php

namespace Controller;


use Model\Clazz;
use Model\Student;

class StudentsController
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

    public function index()
    {
        $clazz_id = $_GET['clazz_id'];
        $students = $this->commonService->getAllStudentsByClazzId($clazz_id);
        include 'view/students/list.php';
    }

    public function add_many()
    {
        $clazz_id = $_GET['clazz_id'];
        $clazz = $this->commonService->getClazzById($clazz_id);
        $clazz_name = $clazz->name ;

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/students/add_many_step_1.php';
        } else {
            $step = $_GET['step'];

            if (isset($step) && $step == '2') {
                $_students = $_POST['students'];
                $students_array = explode("\n", $_students);

                $students = [];
                foreach ($students_array as $student) {
                    $array = explode("\t", $student);
                    if (sizeof($array) >= 3)
                    $students[] = $array;
                }

                include 'view/students/add_many_step_2.php';
            } else if (isset($step) && $step == '3') {

                $names = $_POST['names'];
                $codes = $_POST['codes'];

                $students = [];
                for($i=0; $i< sizeof($names); $i++){
                    $student = new Student($names[$i], $codes[$i], $clazz_id);
                    $students[] = $student;
                }

                $res = $this->commonService->createManyStudents($students);
                $message = 'Đã lưu danh sách học viên vào lớp ' . $clazz_name;
                include 'view/students/add_many_step_3.php';
            }
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $programs = $this->commonService->getAllPrograms();
            include 'view/clazzes/add.php';
        } else {
            $clazz = new Clazz($_POST['name'], $_POST['coach'], $_POST['program_id']);
            $res = $this->commonService->createClazz($clazz);
            $message = 'Program created';
            include 'view/clazzes/add.php';
        }
    }

    public function view()
    {
        $id = $_GET['id'];

        include 'view/clazzes/view.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $clazz = $this->commonService->getClazzById($id);
            include 'view/clazzes/delete.php';
        } else {
            $id = $_POST['id'];
            $this->commonService->deleteClazzById($id);
            header('Location: ./index.php');
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
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
