<?php
$query = $dbh->prepare('SELECT * FROM `users` WHERE users.ID=:ID');


$query->execute([
        
        ':ID' => $_POST['PassedUserId']]
    );

$WorkingUser = $query->fetchAll();