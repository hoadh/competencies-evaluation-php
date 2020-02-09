<?php

require 'model/Clazz.php';
require "model/Program.php";
require 'model/Student.php';
require 'model/Template.php';
require "repositories/DBConnection.php";
require "repositories/ProgramRepository.php";
require 'repositories/ClazzRepository.php';
require 'repositories/StudentRepository.php';
require 'repositories/TemplateRepository.php';
require "services/CommonService.php";
require "controller/ProgramController.php";
require "controller/ClazzController.php";
require "controller/StudentsController.php";
require "controller/TemplateController.php";

use Repository\DBConnection;
use Repository\ProgramRepository;
use Repository\ClazzRepository;
use Repository\StudentRepository;
use Repository\TemplateRepository;
use Controller\ProgramController;
use Controller\ClazzController;
use Controller\StudentsController;
use Controller\TemplateController;


// Make sure all dependencies are initialized before injecting

// Init DB Conenction
$dbConnection = new DBConnection("mysql:host=localhost;dbname=dgnl","root", "" );
$connection = $dbConnection->connect();

// Instances of repositories
$programRepository = new ProgramRepository($connection);
$clazzRepository = new ClazzRepository($connection);
$studentsRepository = new StudentRepository($connection);
$templatesRepository = new TemplateRepository($connection);

// Instance of service
$commonService = new CommonService($programRepository, $clazzRepository, $studentsRepository, $templatesRepository);

// Instances of controllers
$programController = new ProgramController($commonService);
$clazzController = new ClazzController($commonService);
$studentsController = new StudentsController($commonService);
$templateController = new TemplateController($commonService);

