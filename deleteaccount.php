<?php 
// this file works on the premise that a session already exists, containing the userID, named uID.
// get the user's ID from the session created upon login.
$uID = $_SESSION['uID'];

//connect to MySQL
      DEFINE ('DB_USER', 'root');
      DEFINE ('DB_PASSWORD', '');
	  DEFINE ('DB_HOST', 'localhost');
	  DEFINE ('DB_NAME', 'site');
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
       OR die("could not connect");
mysqli_set_charset($dbc, 'utf8');

//check the user still exists
$check = "SELECT username FROM users WHERE userID='uID'";
$r = mysqli_query($dbc, $check);
$row = mysqli_fetch_assoc($r); 
if (isset($row)) {
     // carry on the program
} else {
     die("Sorry, the account you tried to delete does not exist.");
}

//delete the user's account
$del = "DELETE FROM users WHERE userID='uID'";
$query = mysqli_query($dbc, $del)or die("Sorry, we could not delete your account at this time.");
print("Your account has been deleted, please contact us if your experience with the site has not been satisfactory.");
?>
