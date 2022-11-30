<?php
function GetProject($dbh, $ProjectID){
    $query = $dbh->prepare('SELECT * FROM `project` WHERE project.ID=:ID');
    $query->execute([
            
            ':ID' => $ProjectID]
        );
    
    return $query->fetchAll();
}

function GetOwner($dbh, $OwnerID)
{
    $query = $dbh->prepare('SELECT * FROM `users` WHERE users.ID=:ID');

    $query->execute([
            
            ':ID' => $OwnerID]
        );
    
    return $query->fetchAll();
}


function RemoveProject($dbh, $ProjectID)
{
    $query = $dbh->prepare('DELETE FROM project WHERE `project`.`ID` = :ID');
    return $query->execute(
        [
            ':ID' => $ProjectID
        ]
    );
}

function GetManagers($dbh)
{
    $query = $dbh->prepare('SELECT * FROM `users` WHERE users.Privilege != 0');
    $query->execute();
    return $query->fetchAll();
}

function UpdateProject($dbh, $Project)
{
    $query = $dbh->prepare('UPDATE project AS p
    SET p.Title = :NewTitle, p.Description = :NewDescription, p.Owner_ID = :NewOwner
    WHERE p.ID = :ProjectID;');

    return $query->execute(
    [
    ':ProjectID' => $Project['ID'],
    ':NewTitle' => $Project['Title'],
    ':NewDescription' => $Project['Description'],
    ':NewOwner' => $Project['Owner_ID']
    ]
    );
}