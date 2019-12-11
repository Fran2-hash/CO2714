<!DOCTYPE html>
<html>
<head>
<title> AJAX</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="checkscript.js"></script>
<script>
$( document ).ready(function() {
      $("#submit").prop('disabled',true);
  });
</script>


</head>
<body>

<form id="form" name="form" action="insert.php" onsubmit="return checkempty();" method="post">
  <h3>Fill Your Information!</h3>
  <label>Firstname :</label>
  <input id="fname" name="fname" type="text">
  <br/>
  <label>Surname :</label>
  <input id="sname" name="sname" type="text">
  <br/>
  <label>Username :</label>
  <input id="uname" name ="uname" type="text" onblur="checkUser()" ><span id="message"></span>
  <br/>
  <label>Password :</label>
  <input id="pword" name="pword" type="password">
  <br/>
  <label>Email :</label>
  <input id="email" name="email" type="text">
  <input id="submit" name="submit" type="submit" value="Submit">
</form>

</body>
</html>

