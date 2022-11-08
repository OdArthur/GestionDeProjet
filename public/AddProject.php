<?php
// include db
include __DIR__ . '/../database/db.php';
// include model
include __DIR__ . '/../model/AddProject.php';



    $project = [
        //'ID' => htmlspecialchars($_POST['ID']),
        'Title' => htmlspecialchars($_POST['Title']),
        'Description' => htmlspecialchars($_POST['Description']),
        //'Owner_ID' => htmlspecialchars($_POST['Owner_ID']),
        //'CreationDate' => htmlspecialchars($_POST['CreationDate'])
    ];
    $result = createProject($dbh, $project);

    //header('Location: /public/main.php');