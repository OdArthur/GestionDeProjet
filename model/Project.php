<?php
$query = $dbh->prepare('SELECT * FROM `project` WHERE project.ID=:ID');

$query->execute([
        
        ':ID' => $_POST['PassedProjectId']]
    );

$WorkingProject = $query->fetchAll();

$query = $dbh->prepare('SELECT * FROM `users` WHERE users.ID=:ID');

$query->execute([
        
        ':ID' => $WorkingProject[0]['Owner_ID']]
    );

$WorkingUser = $query->fetchAll();

function RemoveProject($dbh, $ProjectID)
{
$query = $dbh->prepare('DELETE FROM project WHERE `project`.`ID` = :ID');
return $query->execute(
    [
        ':ID' => $ProjectID
    ]
    );
}