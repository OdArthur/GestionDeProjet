<?php
// ~/php/GestionDeProjet/public/createproject.php
include(__DIR__ . '/../view/checkconnection.php');
// include database
include(__DIR__ . '/../database/db.php');
// include model
include(__DIR__ . '/../model/SidebarDB.php');
include(__DIR__ . '/../model/TaskModel.php');

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
    RemoveSpecificTask($dbh, $_POST['PassedTaskId']);
    header('Location: main.php');
}
else
{
    $WorkingTask = GetSpecificTask($dbh, $_POST['PassedTaskId']);

    // include view
    include(__DIR__ . '/../css/cssimport.php');
    include(__DIR__ . '/../view/EditItem/edittask.php');
    include(__DIR__ . '/../javascript/jsimport.php');
}
