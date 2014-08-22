<?php 
 //connect to MySQL
      DEFINE ('DB_USER', 'root');
      DEFINE ('DB_PASSWORD', '');
	  DEFINE ('DB_HOST', 'localhost');
	  DEFINE ('DB_NAME', 'site');
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
       OR die("could not connect");
mysqli_set_charset($dbc, 'utf8');

 
 //get user submitted values and set as variables
$fn = $_POST['fname']; 
$ln = $_POST['lname'];
$u =  $_POST['uname'];
$e =  $_POST['email'];
$p =  $_POST['pass'];

 //escape the strings to prevent SQL injection attacks.
$fname = mysqli_real_escape_string($dbc,"$fn");
$lname = mysqli_real_escape_string($dbc,"$ln");
$uname = mysqli_real_escape_string($dbc,"$u");
$email = mysqli_real_escape_string($dbc,"$e");
$pass = mysqli_real_escape_string($dbc,"$p");

 //insert the user's data into the database 
$q = "INSERT INTO users (firstName, lastName, email, password, username) VALUES ('$fname','$lname', '$email', SHA1('$pass'), '$uname');";
mysqli_query($dbc, $q) or die("Sorry, you were unable to be entered at this time. \nPl");

 //check the user is submitted correctly
$q2 = "SELECT userID FROM users WHERE username ='$uname';";
$abc = mysqli_query($dbc, $q2);
$row = mysqli_fetch_assoc($abc);
if (isset($row)) {
   print("<a href='login.php'>Log in to your new account?</a>");
} else {
	print("Sorry, we were unable to enter you at this time.");
}

?>
