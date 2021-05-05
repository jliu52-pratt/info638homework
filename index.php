<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Index</title>
</head>
<body>
<?php
session_start(); 
include_once'header.php';
require_once("login.php");
 
if (isset($_POST['submit'])) { //check if the form has been submitted
	if ( empty($_POST['username']) || empty($_POST['password']) ) {
		echo "<p>Please fill out all of the form fields!</p>";
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$username = sanitizeMySQL($conn, $_POST['username']);
		$password = sanitizeMySQL($conn, $_POST['password']);			
		$salt1 = "qm&h*";  
		$salt2 = "pg!@";  
		$password = hash('ripemd128', $salt1.$password.$salt2);
		$query  = "SELECT eng_last_name, eng_first_name FROM patient WHERE username='$username' AND password='$password'"; 
		$result = $conn->query($query);    
		if (!$result) die($conn->error); 
		$rows = $result->num_rows;
		if ($rows==1) {
			$row = $result->fetch_assoc();
			$_SESSION['eng_first_name'] = $row['eng_first_name'];
			$_SESSION['eng_last_name'] = $row['eng_last_name'];	
			header("Location: patientinfo_form.php"); 			
		} else {
			echo "<p>Invalid username/password combination!</p><br>";
		}
	}
}
function sanitizeString($var)
{
	$var = stripslashes($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	return $var;
}
function sanitizeMySQL($connection, $var)
{
	$var = sanitizeString($var);
	$var = $connection->real_escape_string($var);
	return $var;
}
?> 
                    <p class="subtitle has-text-black">Patient Log In</p>
            <form method="post" action="index.php"> 
                <fieldset>
                    <label for="username">Username:</label>
                    <input type="text" name="username" required><br> 
                    <label for="password">Password:</label> 
                    <input type="password" name="password" required><br>
                    <input type="submit" name="submit" value="Log-In">
                </fieldset>
            <div class="signup">
                                <label class="signup">
                    <br>Don't have an account? &nbsp;<a href="/~jliu52/hk_covid_portal/signup_form.php">Sign Up Now</a><br>
                </label>
                <label class="admin">
                    <br><a href="/~jliu52/hk_covid_portal/admin_login.php">Admin Log In</a>
                </label>
                            </div>
            </form>

<?php 
    include_once'footer.php'
?>
</body> 
</html>