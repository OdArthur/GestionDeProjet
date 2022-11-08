<?php
$query = $dbh->prepare('SELECT * FROM `project` ORDER BY `ID` ASC');
$query->execute();
$Projects = $query -> fetchAll();


function createProject($dbh, $project) {

        $query = $dbh->prepare('INSERT INTO project (Title, Description) VALUES (:Title, :Description)');
        return $query->execute([
            
            ':Title'=> $project['Title'],
            ':Description' => $project['Description']
            //1 =>  $project['Owner_ID'],
            //':CreationDate' =>$project['CreationDate']
        ]);
    
}