<?php

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

    case 'templates/add':
        $templateController->add();
        break;
    case 'templates/view':
        $templateController->view();
        break;
    case 'templates/delete':
        $templateController->delete();
        break;
    case 'templates/edit':
        $templateController->edit();
        break;
    case 'templates/list':
        $templateController->index();
        break;
    case 'outcomes/list':
        $outcomeController->index();
        break;
    case 'outcomes/add_header':
        $outcomeController->add_header();
        break;
    case 'outcomes/add_subheader':
        $outcomeController->add_subheader();
        break;

    default:
        $programController->index();
        break;
}
