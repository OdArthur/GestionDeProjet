<?php
function createTask($dbh, $task, $user_ID) {

        $query = $dbh->prepare('INSERT INTO task (Title, Description, Project_ID) VALUES (:Title, :Description, :Project_ID)');
        $query->execute([
            
            ':Title'=> $task['Title'],
            ':Description' => $task['Description'],
            ':Project_ID' =>  $task['Project_ID'],
        ]);
        $taskID = $dbh->lastInsertId();
        $query = $dbh->prepare('INSERT INTO userstasks (user_ID, task_ID) VALUES (:user_ID, :task_ID)');
        return $query->execute([
            
            ':user_ID'=> $user_ID,
            ':task_ID' => $taskID,
        ]);
}

function GetUsers($dbh)
{
    $query = $dbh->prepare('SELECT * FROM `users` ORDER BY `ID` DESC');
    $query->execute();
    return $query -> fetchAll();
}