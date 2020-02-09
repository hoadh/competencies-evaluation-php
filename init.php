<?php

require 'model/Clazz.php';
require "model/Program.php";
require 'model/Student.php';
require "repositories/DBConnection.php";
require "repositories/ProgramDB.php";
require 'repositories/ClazzDB.php';
require 'repositories/StudentRepository.php';
require "services/CommonService.php";
require "controller/ProgramController.php";
require "controller/ClazzController.php";
require "controller/StudentsController.php";



use Repository\DBConnection;
use Repository\ProgramDB;
use Repository\ClazzDB;
use Repository\StudentRepository;
use Controller\ProgramController;
use Controller\ClazzController;
use Controller\StudentsController;


// Make sure all dependencies are initialized before injecting

// Init DB Conenction
$dbConnection = new DBConnection("mysql:host=localhost;dbname=dgnl","root", "" );
$connection = $dbConnection->connect();

// Instances of repositories
$programRepository = new ProgramDB($connection);
$clazzRepository = new ClazzDB($connection);
$studentsRepository = new StudentRepository($connection);

// Instance of service
$commonService = new CommonService($programRepository, $clazzRepository, $studentsRepository);

// Instances of controllers
$programController = new ProgramController($commonService);
$clazzController = new ClazzController($commonService);
$studentsController = new StudentsController($commonService);

// Routing to controllers
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;

switch ($page) {
    case 'programs/add':
        $programController->add();
        break;
    case 'programs/view':
        $programController->view();
        break;
    case 'programs/delete':
        $programController->delete();
        break;
    case 'programs/edit':
        $programController->edit();
        break;
    case 'programs/list':
        $programController->index();
        break;

    case 'clazzes/add':
        $clazzController->add();
        break;
    case 'clazzes/view':
        $clazzController->view();
        break;
    case 'clazzes/delete':
        $clazzController->delete();
        break;
    case 'clazzes/edit':
        $clazzController->edit();
        break;
    case 'clazzes/list':
        $clazzController->index();
        break;

    case 'students/list':
        $studentsController->index();
        break;
    case 'students/add_many':
        $studentsController->add_many();
        break;
    default:
        $programController->index();
        break;
}
