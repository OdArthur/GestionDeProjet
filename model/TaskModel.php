<?php
function RemoveSpecificTask($dbh, $taskID)
{
    $query = $dbh->prepare('DELETE userstasks WHERE userstasks.task_ID = :taskID;');
       
    $query->execute([
                
        ':taskID' => $taskID]
    );

    $query = $dbh->prepare('DELETE task WHERE task.ID = :taskID;');

    return $query->execute([
        ':taskID' => $taskID
    ]);
}


function GetSpecificTask($dbh, $taskID)
{
    $query = $dbh->prepare('SELECT * FROM `task` WHERE task.ID=:ID');
    $query->execute([
            
            ':ID' => $taskID]
        );
        return $query->fetchAll();
}