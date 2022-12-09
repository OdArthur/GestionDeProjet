<?php


function RemoveSpecificTask($dbh, $taskID)
{
    $query = $dbh->prepare('DELETE userstaks AS ut
                                    WHERE ut.task_ID = :taskID;');
       
    return $query->execute([
                
        ':taskID' => $taskID]
    );
}


function GetSpecificTask($dbh, $taskID)
{
    $query = $dbh->prepare('SELECT * FROM `task` WHERE task.ID=:ID');
    $query->execute([
            
            ':ID' => $taskID]
        );
        return $query->fetchAll();
}