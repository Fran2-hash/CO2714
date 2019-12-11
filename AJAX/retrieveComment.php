<?php
include 'Comment_connect.php';
    $query = $mysqli->query("SELECT * FROM comments");
	$comments = array();
	while($row = $query->fetch_array()){
		array_push($comments, $row);
	}
	$mysqli->close();
      //the line below is significant, it sets the content type to JSON as opposed to the usual returning an HTML document 
	header("Content-type: application/json");
      //the line below encodes our array as JSON and outputs it
	echo json_encode($comments);
	die();

      
?>

