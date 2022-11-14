<?php
// ~/php/GestionDeProjet/public/AddProject.php
include(__DIR__ . '/../view/checkconnection.php');
// include db
include(__DIR__ . '/../database/db.php');
// include model
include(__DIR__ . '/../model/AddProject.php');

    $project = [
        'Title' => htmlspecialchars($_POST['Title']),
        'Description' => htmlspecialchars($_POST['Description']),
        'Owner_ID' => htmlspecialchars($_SESSION['ID']),
        'CreationDate' => Date("Y-m-j")
    ];
    $result = createProject($dbh, $project);

    header('Location: main.php');

//include view