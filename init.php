<?php

require 'model/Clazz.php';
require "model/Program.php";
require "repositories/DBConnection.php";
require "repositories/ProgramDB.php";
require 'repositories/ClazzDB.php';
require "services/CommonService.php";
require "controller/ProgramController.php";
require "controller/ClazzController.php";

use Controller\ClazzController;
use \Model\DBConnection;
use \Model\ProgramDB;
use \Model\ClazzDB;
use \Controller\ProgramController;

// Make sure all dependencies are initialized before injecting

// Init DB Conenction
$dbConnection = new DBConnection("mysql:host=localhost;dbname=dgnl","root", "" );
$connection = $dbConnection->connect();

// Instances of repositories
$programRepository = new ProgramDB($connection);
$clazzRepository = new ClazzDB($connection);

// Instance of service
$commonService = new CommonService($programRepository, $clazzRepository);

// Instances of controllers
$programController = new ProgramController($commonService);
$clazzController = new ClazzController($commonService);

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
    default:
        $programController->index();
        break;
}
