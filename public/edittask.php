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
    $Task = [
        'ID' => htmlspecialchars($_POST['PassedTaskId']),
        'Title' => htmlspecialchars('' == $_POST['Title'] ? $_POST['PastTitle'] : $_POST['Title']),
        'Description' => htmlspecialchars('' == $_POST['Description'] ? $_POST['PastDescription'] : $_POST['Description'])
    ];

    UpdateTask($dbh, $Task);

    header('Location: main.php');
}
else if(isset($_POST['Remove']))
{
    RemoveSpecificTask($dbh, $_POST['PassedTaskId']);
    header('Location: main.php');
}
else
{
    $WorkingTask = GetSpecificTask($dbh, $_POST['PassedTaskId']);
    $WorkingUsers = GetTaskUsers($dbh, $_POST['PassedTaskId']);
    $MissingUsers = GetMissingUsers($dbh, $WorkingUsers);

    // include view
    include(__DIR__ . '/../css/cssimport.php');
    include(__DIR__ . '/../view/EditItem/edittask.php');
    include(__DIR__ . '/../javascript/jsimport.php');
}
