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

function UpdateTask($dbh, $Task)
{
    $query = $dbh->prepare('UPDATE task AS t
    SET t.Title = :NewTitle, t.Description = :NewDescription
    WHERE t.ID = :TaskID;');

    return $query->execute(
    [
    ':TaskID' => $Task['ID'],
    ':NewTitle' => $Task['Title'],
    ':NewDescription' => $Task['Description']
    ]
    );
}

function GetTaskUsers($dbh, $TaskID)
{
    $query = $dbh->prepare('SELECT users.ID, users.Username
                            FROM users
                            INNER JOIN userstasks
                            ON users.ID = userstasks.user_ID
                            WHERE userstasks.task_ID=:ID;');
    $query->execute([
        
        ':ID' => $TaskID]
    );
    return $query->fetchAll();
}

function GetMissingUsers($dbh, $Users)
{
    $query = $dbh->prepare('SELECT users.ID, users.Username FROM users;');
    $query->execute();
    $AllUsers = $query->fetchAll();

    foreach($Users as $user)
    {
        foreach($AllUsers as $UserID =>$CheckingUser)
        {
            if($user == $CheckingUser)
            {
                unset($AllUsers[$UserID]);
            }
        }
    }

    return $AllUsers;
}