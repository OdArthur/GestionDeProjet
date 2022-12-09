<?php
// ~/php/GestionDeProjet/public/createuser.php
include(__DIR__ . '/../view/checkconnection.php');
// include database
include(__DIR__ . '/../database/db.php');
// include model
include(__DIR__ . '/../model/SidebarDB.php');
include(__DIR__ . '/../model/AddTask.php');
// include view

if(isset($_POST['Title']))
{
    $task = [
        'Title' => htmlspecialchars($_POST['Title']),
        'Description' => htmlspecialchars($_POST['Description']),
        'Project_ID' => htmlspecialchars($_POST['PassedProjectId']),
    ];

    $result = createTask($dbh, $task, $_POST['User_ID']);

    header('Location: main.php');
}
else
{
    $AllUsers = GetUsers($dbh);

    include(__DIR__ . '/../css/cssimport.php');
    include(__DIR__ . '/../view/CreateItem/createtask.php');
    include(__DIR__ . '/../javascript/jsimport.php');
}
