<?php

include 'connect.php';

if(!isset(($_POST['search']))||($_POST['search'] ===""))
{
	$sql = "select firstname, surname, email from livesearch ORDER BY surname ASC";
}
else
{
	$search = $_POST['search'];
    $sql = "select firstname, surname, email from users where firstname like '%$search%' or surname like '%$search%' ORDER BY surname ASC";
    
 }
$query = $mysqli->query($sql); //$conn is defined in connect.php
    $users = array();
        while($row = $query->fetch_array()){
	    array_push($users, $row);
                    }
        $mysqli->close();
header("Content-type: application/json");
echo json_encode($users);
die();
?>
