<?php
require('model/database.php');
require('model/todo_db.php');


// POST Data
$taskID = filter_input(INPUT_POST, "taskID", FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, "title", FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, "description", FILTER_UNSAFE_RAW);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if($action){
        $action = 'show_add_tasks';
    }
}

// GET Data
$todoitems = filter_input(INPUT_POST, "todoitems", FILTER_VALIDATE_INT);
if(!$todoitems){
    $todoitems = filter_input(INPUT_GET, "todoitems", FILTER_VALIDATE_INT);
}


switch($action){
    case 'list_todoitems':
        $todoitems = get_tasks();
        include('view/show_add_tasks.php');
        break;
    case 'add_description':
        if($title && $description){
            add_task($title, $description);
            header("Location: .?action=$title");
        }else{
            $error_message = "invalid task data. Check all fields";
            include('view/error.php');
            exit();
        }
        break;
    default:
    $todoitems = get_tasks();
    include("view/show_add_tasks.php");
}

?>