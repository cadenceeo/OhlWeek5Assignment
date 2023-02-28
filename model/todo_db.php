<?php

function get_tasks(){
    global $db;
    $query = 'SELECT * FROM todoitems ';
    $statement = $db->prepare($query);
    $statement->execute();
    $todoitems = $statement->fetchAll();
    $statement->closeCursor();
    return $todoitems;
}


function add_task($title, $description)
{
    global $db;
    $query = 'INSERT INTO todoitems ( Title, Description ) VALUES (:title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}


function delete_task($title)
{
    global $db;
    $query = 'DELETE FROM todoitems where Title = :title';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->execute();
    $statement->closeCursor();
}

?>