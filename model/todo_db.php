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

function get_task_description($title)
{
    if (!$title) {
        return "All Courses";
    }
    global $db;
    $query = 'SELECT * FROM todoitems WHERE Description = :description';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->execute();
    $todoitem = $statement->fetch();
    $statement->closeCursor();
    $description = $todoitem['Description'];
    return $description;
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
    $query = 'DELETE FROM todoitems where title = :title';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->execute();
    $statement->closeCursor();
}

?>