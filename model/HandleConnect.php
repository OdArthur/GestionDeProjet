<?php

$query = $dbh->prepare('SELECT * FROM `users` ORDER BY `ID` ASC');
$query->execute();
$Users = $query -> fetchAll();

function GetUser($dbh, $user) {
        $query = $dbh->prepare('SELECT * FROM users WHERE Username = :username');
        $query->execute(array(
            ':username' => $user['username']
            ));

        $connecteduser = [
            'ID' => null,
            'username' => null,
            'password' => null,
            'privilege' => null
        ];

        while ($donnees = $query->fetch())
            {
                $connecteduser['ID'] = $donnees['ID'];
                $connecteduser['username'] = $donnees['Username'];
                $connecteduser['password'] = $donnees['Password'];
                $connecteduser['privilege'] = $donnees['Privilege'];
            }
        $query->closeCursor();
        return $connecteduser;
    }