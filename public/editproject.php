<?php
// ~/php/GestionDeProjet/public/createproject.php
include(__DIR__ . '/../view/checkconnection.php');
// include database
include(__DIR__ . '/../database/db.php');
// include model
include(__DIR__ . '/../model/SidebarDB.php');
include(__DIR__ . '/../model/Project.php');

if(isset($_POST['Edit']))
{
    $WorkingProject = GetProject($dbh, $_POST['PassedProjectId']);
    $WorkingUser = GetOwner($dbh, $WorkingProject[0]['Owner_ID']);
    $Managers = GetManagers($dbh);
    // include view
    include(__DIR__ . '/../css/cssimport.php');
    include(__DIR__ . '/../view/EditItem/editproject.php');
    include(__DIR__ . '/../javascript/jsimport.php');
}

if(isset($_POST['Remove']))
{
    RemoveProject($dbh, $_POST['PassedProjectId']);
    header('Location: main.php');
}

if(isset($_POST['Title']))
{
    $Project = [
        'ID' => htmlspecialchars($_POST['ProjectID']),
        'Title' => htmlspecialchars('' == $_POST['Title'] ? $_POST['PastTitle'] : $_POST['Title']),
        'Description' => htmlspecialchars('' == $_POST['Description'] ? $_POST['PastDescription'] : $_POST['Description']),
        'Owner_ID' => htmlspecialchars($_POST['Owner_ID'])
    ];

    $result = UpdateProject($dbh, $Project);

    header('Location: main.php');
}
