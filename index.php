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
    case 'add_task':
        if($title && $description){
            add_task($title, $description);
            header("Location: .?action=$list_todoitems");
        }else{
            $error = "Invalid Task data .Check all felids and try again";
            include("view/error.php");
            exit();
        }
        break;
    case "delete_task":
        if ($title) {
            try {
                delete_task($title);
            } catch (PDOException $e) {
                $error = "You cannot delete a course if assignments exists in the course";
                include('view/error.php');
                exit();
            }
            header("Location: .?action=$list_todoitems");
        }
        break;
    default:
    $todoitems = get_tasks();
    include("view/show_add_tasks.php");
}

?>