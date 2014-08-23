<?php
//connect to MySQL
      DEFINE ('DB_USER', 'root');
      DEFINE ('DB_PASSWORD', '');
	  DEFINE ('DB_HOST', 'localhost');
	  DEFINE ('DB_NAME', 'party');
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
       OR die("could not connect");
mysqli_set_charset($dbc, 'utf8');

//get data from form
$e = $_POST['email'];
$p = $_POST['pass'];

//escape the data to prevent SQL Injection
$eI = mysqli_real_escape_string($dbc,"$e");
$pI = mysqli_real_escape_string($dbc,"$p");

//select the userID from the account
$q = "SELECT userID FROM users WHERE email = '$eI' AND password = SHA1('$pI')";
$run = mysqli_query($dbc, $q);
while ($row = mysqli_fetch_assoc($run)){
}
//start the session
session_start();
$_SESSION['uID'] = "$row";
print("You are now logged in.");
?>
