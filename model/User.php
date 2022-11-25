<?php

function GetSpecificUser($dbh, $UserID)
{
    $query = $dbh->prepare('SELECT * FROM `users` WHERE users.ID=:ID');
    $query->execute([
            
            ':ID' => $UserID]
        );
        return $query->fetchAll();
}

function UpdateSpecificUser($dbh, $User, $IsChangingPassword)
{
    if($IsChangingPassword)
    {
        $query = $dbh->prepare('UPDATE users AS u
                                SET u.Username = :NewUsername, u.Password = :NewPassword, u.Privilege = :NewPrivilege
                                WHERE u.ID = :UserID;');
    
        return $query->execute(
            [
                ':UserID' => $User['ID'],
                ':NewUsername' => $User['Username'],
                ':NewPassword' => password_hash($User['Password'], PASSWORD_DEFAULT),
                ':NewPrivilege' => $User['Privilege']
            ]
        );
    }
    else
    {
        $query = $dbh->prepare('UPDATE users AS u
                                SET u.Username = :NewUsername, u.Privilege = :NewPrivilege
                                WHERE u.ID = :UserID;');

        return $query->execute(
            [
                ':UserID' => $User['ID'],
                ':NewUsername' => $User['Username'],
                ':NewPrivilege' => $User['Privilege']
            ]
        );
    }
}