<?php
// include db
include __DIR__ . '/../database/db.php';
// include model
include __DIR__ . '/../model/HandleConnect.php';

    $user = [
        'username' => htmlspecialchars($_POST['username']),
        'password' => htmlspecialchars($_POST['password']),
    ];
    $connectedUser = GetUser($dbh, $user);

    if(isset($connectedUser['ID']) and password_verify($_POST['password'], $connectedUser['password']))
    {
        session_start();
        $_SESSION['ID'] = $connectedUser['ID'];
        $_SESSION['Username'] = $connectedUser['username'];
        $_SESSION['Password'] = $connectedUser['password'];
        $_SESSION['Privilege'] = $connectedUser['privilege'];
    }
	
    header('Location: main.php');