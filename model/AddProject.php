<?php
function createProject($dbh, $project) {

        $query = $dbh->prepare('INSERT INTO project (Title, Description, Owner_ID, CreationDate) VALUES (:Title, :Description, :Owner_ID, :CreationDate)');
        return $query->execute([
            
            ':Title'=> $project['Title'],
            ':Description' => $project['Description'],
            ':Owner_ID' =>  $project['Owner_ID'],
            ':CreationDate' =>$project['CreationDate']
        ]);
    
}