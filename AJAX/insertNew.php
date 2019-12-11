<?php
include 'Comment_connect.php';

      //$_POST['com'] should contain our new comments, pay close attention to the fact the name com must be the keyname sent by the AJAX request we will write.
    
$com = $_POST['com'];	
$stmt = $mysqli->prepare("INSERT into comments (comments) VALUES (?)");
$stmt->bind_param('s', $com);
$success = $stmt->execute(); 

$stmt->close();
$mysqli->close();
?>
