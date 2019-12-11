<!DOCTYPE html>
<html>
<head>
<title>Edit</title>

</head>
<body>
<?php
include 'connect.php';
session_start();
    $populatequery = "DELETE FROM Users WHERE ID='".$_GET['id']."'"; 
$mysqli->query($populatequery);
    echo "<p>This user does not exist any longer </p>";
                header("Location: display.php"); 
//we should go replace 
/*this with a prepared statement too!
	$result = $mysqli->query ($populatequery);
	if ($result){
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		  {
			  $fn = $row['Firstname'];
			  $sn = $row['Lastname'];
			  $em = $row['email'];
			  $pw = $row['password'];
		  }
  
	    }*/
?>
