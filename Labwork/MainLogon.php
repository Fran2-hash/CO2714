<!DOCTYPE html>
<html>
<head>
<title>Logon</title>

</head>
<body>

<?php

include 'connect.php';?>
<form method="POST" action="MainLogon.php">
Email:<br><input type="text" name="email" id="email"/>
<br>
Password:<br><input type="password" name="password" id="password"/>
<br>
<input type="submit" name="submit" value="Login"/>
</form>


<?php
$email = $_POST['email'];
$password = $_POST['password'];


$stmt = $mysqli->prepare("SELECT * FROM Users WHERE Email = ?");
$stmt->bind_param('s', $email);

//this selects all the details into an array to display it
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

// after checking if the result is back and will aloso verify the hashed password by using verify the hash. also creating a session.

if (!empty($user['Email'])) { 
    if (password_verify($password, $user['Password'])) {
        echo "<p>Login Successful</p>";
        session_start();
        $_SESSION['login'] = TRUE;
        $_SESSION['user'] = $user['Email'];
    
    } else {
		echo "<p>Login Failed</p>";
        
    }
} else {
                    echo "<p>This user does not exist</p>";
                header("Location: edit.php"); 
}

//close the statments and the database query

$stmt->close();
$mysqli->close();

// now after the logon page has checked if the user exits, and redirect to login page

session_start();
If($_SESSION[‘login’] === TRUE)
{
   echo "<p>Welcome “.$_SESSION[‘user’]</p>";
}
else
{
   header("Location: newuser.php");
}
// next is to create a delect query to allow the user to delete their records

?>
</body>
</html>
