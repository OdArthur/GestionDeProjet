<?php

$query = $dbh->prepare('SELECT * FROM `users` ORDER BY `ID` ASC');
$query->execute();
$Users = $query -> fetchAll();

function createUser($dbh, $user) {
        $query = $dbh->prepare('INSERT INTO users (Username, Password, Privilege) VALUES (:username, :password, :privilege)');
        return $query->execute([
            ':username' => $user['username'],
            ':password'=> password_hash($user['password'], PASSWORD_DEFAULT),
            ':privilege' => $user['privilege']
        ]);
    }