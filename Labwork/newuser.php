<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

include 'connect.php';

if (!isset( $_POST['submit'] )) {
    echo "<p>ERROR form was not submitted</p>";
}
else {
    $hash= password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $sql = "insert into Users (firstname, lastname, email, password) values ('".$_POST['fname']."','".$_POST['sname']."','".$_POST['email']."','".$hash."')";

    if (!$mysqli->query($sql)) {
echo "Error: ", $mysqli->error;
    }
    else {
        //here we could redirect he user back to another page or simple output a success message
echo "sucessfull thank you";
    echo "<a href=\"display.php\">display</a>";
    } 
    $mysqli->close();
}
}
else {
?>
<!DOCTYPE html>
<html>
<head>
<title>Add user</title>
</head>
<body>
<h1>Add record</h1>
<form action="newuser.php" method="post" >
   Firstname: <input type="text" id="fname" name="fname"/>
   Surname: <input type="text" id="sname" name="sname"/>
   Email: <input type="text" id="email" name="email"/>
   Password: <input type="password" id="pass" name="pass"/>
   <input type="submit" id="submit" name="submit" value="submit"/>
</form>
</body>
</html>
<?php
}
?>
