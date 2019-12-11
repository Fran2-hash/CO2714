<?php
include 'connect.php';
session_start();
$sql = "SELECT ID, firstname, lastname, email FROM Users";
$result = $mysqli->query ($sql);
if ($result){
if ($result->num_rows > 0) {
      	echo "<table>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Firstname</th>";
		echo "<th>lastname</th>";
		echo "<th>Email</th>";
		echo "</tr>";
      while($row = $result->fetch_assoc()) 
      {
       // output data of each row
        //echo  '<a href="edit.php?id='.$row["ID"].'">Edit</a>';
          echo "<tr>";
            //echo "<td>"'<a href="delete.php?id='.$row["ID"].'">Delete</a>';"</td>";
           echo "<td>".$row['ID']."</td>";
          echo "<td>".$row['firstname']."</td>";
             
          echo "<td>".$row['lastname']."</td>";
             
          echo "<td>".$row['email']."</td>";
echo "<td><a href=\"edit.php?id=".$row["ID"]."\">Edit</a></td>";
echo "<td><a href=\"delete.php?id=".$row["ID"]."\">Delete</a></td>";
          
        
          echo "</tr>";
      }
      echo "</table>";
	  
} else {
    echo "0 results";
}
$result->close();
$mysqli->close();
}
?>
