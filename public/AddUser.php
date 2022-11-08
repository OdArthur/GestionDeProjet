<?php
// include db
include __DIR__ . '/../database/db.php';
// include model
include __DIR__ . '/../model/AddUser.php';

    $user = [
        'username' => htmlspecialchars($_POST['username']),
        'password' => htmlspecialchars($_POST['password']),
		'privilege' => htmlspecialchars($_POST['privilege']),
    ];
    $result = createUser($dbh, $user);
	
	//header('Location: main.php');