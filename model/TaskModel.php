<?php



$query = $dbh->prepare('DELETE userstaks AS ut
                                WHERE ut.task_ID = :taskID;');
   
$query->execute([
            
    ':taskID' => $_POST['taskID']]
);