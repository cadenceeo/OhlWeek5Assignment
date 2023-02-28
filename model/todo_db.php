<?php

function add_task($title, $description)
{
    global $db;
    $query = 'INSERT INTO todoitems ( title, description ) VALUES (:title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}

function get_tasks(){
    global $db;
    $query = 'SELECT * FROM todoitems ORDER BY itemNum';
    $statement = $db->prepare($query);
    $statement->execute();
    $todoitems = $statement->fetchAll();
    $statement->closeCursor();
    return $todoitems;
}

function delete_newTask($itemNum){
    global $db;
    $count = 0;
    $query = 'DELETE FROM todoitems
                WHERE ItemNum = :itemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(":itemNum", $itemNum);
    $success = $statement->execute();
    $statement->closeCursor();
    if($statement->execute()){
        $count = $statement->rowCount();
    }
    $statement->closeCursor();
    return $count;
}

?>