<?php
// ~/php/GestionDeProjet/public/createproject.php
include(__DIR__ . '/../view/checkconnection.php');
// include database
include(__DIR__ . '/../database/db.php');
// include model
include(__DIR__ . '/../model/SidebarDB.php');
include(__DIR__ . '/../model/User.php');

if(isset($_POST['username']))
{
    $User = [
        'ID' => htmlspecialchars($_POST['PassedUserId']),
        'Username' => htmlspecialchars('' == $_POST['username'] ? $_POST['PastUsername'] : $_POST['username']),
        'Password' => htmlspecialchars($_POST['password']),
        'Privilege' => htmlspecialchars($_POST['privilege'])
    ];

    $result = UpdateSpecificUser($dbh, $User, '' == $_POST['password'] ? false : true);

    header('Location: main.php');
}
else
{
    $tempUserID = $_POST['PassedUserId'];
    $WorkingUser = GetSpecificUser($dbh, $tempUserID);

    // include view
    include(__DIR__ . '/../css/cssimport.php');
    include(__DIR__ . '/../view/EditItem/edittask.php');
    include(__DIR__ . '/../javascript/jsimport.php');
}
