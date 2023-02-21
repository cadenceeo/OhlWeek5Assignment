<?php

function insert_newTask( $itemNum, $title, $description){
    global $db;
    $count = 0;
    $query = 'INSERT INTO todoitems
                (ItemNum, Title, Description)
                VALUES ( :itemNum, :title, :description)';
    $statement = $db->prepare($query);
  //  $statement->bindValue(':todoitems', $todoitems);
    $statement->bindValue(':itemNum', $itemNum);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    if($statement->execute()){
        $count = $statement->rowCount();
    }
    $statement->closeCursor();
    return $count;
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