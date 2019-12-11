<!DOCTYPE html>
<html>
<head>
<title>Edit</title>

</head>
<body>
<?php
include 'connect.php';
session_start();
    $populatequery = "SELECT * from Users WHERE ID='".$_GET['id']."'"; //we should go replace this with a prepared statement too!
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
  
	    }
?>
<div class="container">
<h1>Edit record:</h1>
<form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post" >
   Firstname: <br><input class="form-control" type="text" id="fname" name="fname" value="<?php echo "$fn"; ?>"/><br>
   Surname: <br><input class="form-control" type="text" id="sname" name="sname" value="<?php echo"$sn"; ?>"/><br>
   Email: <br><input class="form-control" type="text" id="email" name="email" value="<?php echo"$em"; ?>"/><br>
   Password: <br><input class="form-control" type="text" id="pass" name="pass"/><br> <!--  <!--value="<?php echo"$pw"; ?>" -->
   <input class="btn btn-primary" type="submit" id="submit" name="submit" value="submit"/>
</form>	    
<?php
}

if (isset( $_POST['submit'] ))
{
    $newPassword = $_POST["pass"];
    $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
	$updatequery ="UPDATE Users SET Firstname=?, Lastname=?, email=?, password=? WHERE id=?";
    $stmt = $mysqli->prepare($updatequery);
    $stmt->bind_param('ssssi', $_POST['fname'], $_POST['sname'], $_POST['email'], $hashed_password, $_GET['id']);
	
    if (!$stmt->execute()) {
        echo "Error: ".$mysqli->error;
    }
    else {
        echo "<p>Record updated successfully</p>";
        echo "<a href=\"display.php\">display</a>";
    } 
}
else
{
?>

</div>

<?php
}
?>
<p> to see the records</p>

<?php
$result->close();
$mysqli->close();
?>
</body>
</html>
