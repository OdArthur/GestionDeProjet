<?php
function RemoveSpecificTask($dbh, $taskID)
{
    $query = $dbh->prepare('DELETE FROM userstasks WHERE userstasks.task_ID = :taskID;');
       
    $query->execute([
                
        ':taskID' => $taskID]
    );

    $query = $dbh->prepare('DELETE FROM task WHERE task.ID = :taskID;');

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

function AddUserOnTask($dbh, $UserID, $TaskID)
{
    $query = $dbh->prepare('INSERT INTO userstasks (user_ID, task_ID) VALUES (:user_ID, :task_ID)');
    return $query->execute([
        ':user_ID' => $UserID,
        ':task_ID'=> $TaskID
    ]);
}

function RemoveUserOnTask($dbh, $UserID, $TaskID)
{
    $query = $dbh->prepare('DELETE FROM userstasks WHERE userstasks.user_ID=:UserID AND userstasks.task_ID=:TaskID;');
       
    return $query->execute([
                
        ':TaskID' => $TaskID,
        ':UserID' => $UserID
        ]);
}