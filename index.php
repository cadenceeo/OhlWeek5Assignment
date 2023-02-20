<?php
require('model/database.php');
require('model/todo_db.php');

// POST Data
$newTask = filter_input(INPUT_POST, "newtask", FILTER_UNSAFE_RAW);
$title = filter_input(INPUT_POST, "title", FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, "description", FILTER_UNSAFE_RAW);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if($action){
        $action = 'create_read_form';
    }
}

// GET Data
$todoitems = filter_input(INPUT_POST, "todoitems", FILTER_UNSAFE_RAW);
if(!$todoitems){
    $todoitems = filter_input(INPUT_GET, "todoitems", FILTER_UNSAFE_RAW);
}

//$results = show_todoitems($todoitems);

switch($action){
    case 'select':
        if($todoitems){
            $reults = show_todoitems($todoitems);
            include('view/update_delete_form.php');
        }else{
            $error_message = "invalid city data. Check all fields";
            include('view/error.php');
        }
        break;
    case 'insert':
        if($todoitems && $itemNum && $title && $description){
            $count = insert_newTask($todoitems, $itemNum, $title, $description);
            header("location: .?action=select&todoitems={$todoitems}&created={$count}");
        }else{
            $error_message = "invalid task data. Check all fields";
            include('view/error.php');
        }
        break;
    case 'delete':
        if($itemNum){
            $count = delete_newTask($itemNum);
            header("Location: .?deleted={$count}");
        }
        break;
    default:
    include("view/update_delete_form.php");
}

?>