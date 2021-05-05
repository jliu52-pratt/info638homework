<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign Up Form</title>
</head>
<body>
<?php
include_once'header.php';
require_once("login.php");
#only want to execute if user has submitted a form. error checking  
if (isset($_POST['submit'])) { //check if the form has been submitted
	if ((empty($_POST['lastname'])) || (empty($_POST['firstname'])) || (empty($_POST['username'])) || (empty($_POST['password'])) ) {
		echo "<p>Please fill out all of the form fields!</p>";
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$lastname = sanitizeMySQL($conn, $_POST['lastname']);
        $firstname = sanitizeMySQL($conn, $_POST['firstname']);
		$username = sanitizeMySQL($conn, $_POST['username']);			
		$password = sanitizeMySQL($conn, $_POST['password']);
		$query = "INSERT INTO `patient`(`patient_id`, `eng_last_name`, `eng_first_name`, `username`, `password`) VALUES(NULL, \"$lastname\", \"$firstname\", \"$username\", \"$password\")";
		$result = $conn->query($query);
		if (!$result) {
			die ("Database access failed: " . $conn->error);
		} else {
			echo "<p>Successfully added new patient named $firstname!</p><br>";
		}
	}
}
    // sanitizing our form values before printing out 
#error checking code function to determine whther a variable has been declared and "set"
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

<form method="post" action="signup_form.php"> 
    <p class="subtitle has-text-black">Sign Up</p>
        <fieldset>
            <legend>Add Your Credentials</legend><br>
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" required><br> 
            <label for="firstname">First Name:</label> 
            <input type="text" name="firstname" required><br>
            <label for="username">Username:</label> 
            <input type="text" name="username" required><br>
            <label for="password">Password:</label> 
            <input type="password" name="password" required><br>
            <input type="submit" name="submit">
        </fieldset>
        <div class="login">
        <label class="login">
            <br><a href="/hk_covid_portal/index.php">Return to  Log In Page</a>
        </label>
        </div>
</form>

<?php 
    include_once'footer.php'
?>
</body> 
</html>