<?php

//echo $_POST['PassedUserId'];
// ~/php/GestionDeProjet/public/main.php
include(__DIR__ . '/../view/checkconnection.php');
// include database
include(__DIR__ . '/../database/db.php');
// include model
include(__DIR__ . '/../model/SidebarDB.php');
include(__DIR__ . '/../model/Project.php');

$WorkingProject = GetProject($dbh, $_POST['PassedProjectId']);
$WorkingUser = GetOwner($dbh, $WorkingProject[0]['Owner_ID']);

// include view
include(__DIR__ . '/../css/cssimport.php');
include(__DIR__ . '/../view/Main/project.php');
include(__DIR__ . '/../javascript/jsimport.php');