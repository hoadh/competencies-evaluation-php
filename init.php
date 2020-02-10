<?php

require 'model/Clazz.php';
require "model/Program.php";
require 'model/Student.php';
require 'model/Template.php';
require 'model/Outcome.php';
require 'model/Evaluation.php';
require 'model/EvaluationDetail.php';

require "repositories/DBConnection.php";
require "repositories/ProgramRepository.php";
require 'repositories/ClazzRepository.php';
require 'repositories/StudentRepository.php';
require 'repositories/TemplateRepository.php';
require 'repositories/OutcomeRepository.php';
require 'repositories/EvaluationRepository.php';
require 'repositories/EvaluationDetailRepository.php';

require "services/CommonService.php";

require "controller/ProgramController.php";
require "controller/ClazzController.php";
require "controller/StudentsController.php";
require "controller/TemplateController.php";
require "controller/OutcomeController.php";
require "controller/EvaluationController.php";

use Controller\EvaluationController;
use Repository\DBConnection;

use Repository\EvaluationDetailRepository;
use Repository\EvaluationRepository;
use Repository\ProgramRepository;
use Repository\ClazzRepository;
use Repository\StudentRepository;
use Repository\TemplateRepository;
use Repository\OutcomeRepository;
use Controller\ProgramController;
use Controller\ClazzController;
use Controller\StudentsController;
use Controller\TemplateController;
use Controller\OutcomeController;

// Make sure all dependencies are initialized before injecting

// Init DB Conenction
$dbConnection = new DBConnection("mysql:host=localhost;dbname=dgnl","root", "" );
$connection = $dbConnection->connect();

// Instances of repositories
$programRepository = new ProgramRepository($connection);
$clazzRepository = new ClazzRepository($connection);
$studentsRepository = new StudentRepository($connection);
$templatesRepository = new TemplateRepository($connection);
$outcomeRepository = new OutcomeRepository($connection);
$evaluationRepository = new EvaluationRepository($connection);
$evaluationDetailRepository = new EvaluationDetailRepository($connection);

// Instance of service
$commonService = new CommonService(
    $programRepository,
    $clazzRepository,
    $studentsRepository,
    $templatesRepository,
    $outcomeRepository,
    $evaluationRepository,
    $evaluationDetailRepository
);

// Instances of controllers
$programController = new ProgramController($commonService);
$clazzController = new ClazzController($commonService);
$studentsController = new StudentsController($commonService);
$templateController = new TemplateController($commonService);
$outcomeController = new OutcomeController($commonService);
$evaluationController = new EvaluationController($commonService);

