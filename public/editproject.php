<?php
// ~/php/GestionDeProjet/public/createproject.php
include(__DIR__ . '/../view/checkconnection.php');
// include database
include(__DIR__ . '/../database/db.php');
// include model
include(__DIR__ . '/../model/SidebarDB.php');
include(__DIR__ . '/../model/Project.php');

if(isset($_POST['Edit']))
{
    print("EDITING");
}
if(isset($_POST['Remove']))
{
    RemoveProject($dbh, $_POST['PassedProjectId']);
    header('Location: main.php');
}

// include view
include(__DIR__ . '/../css/cssimport.php');
include(__DIR__ . '/../view/EditItem/editproject.php');
include(__DIR__ . '/../javascript/jsimport.php');
