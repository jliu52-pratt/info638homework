<?php
include_once 'header.php';
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['patient_info_id'])) {
	$id = sanitizeMySQL($conn, $_GET['patient_info_id']);
	$query = "SELECT * FROM district WHERE patient_info_id=".$id;
	$result = $conn->query($query);
	if (!$result) die ("Invalid patient id.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No patient found with id of $id<br>";
	} else {
		while ($row = $result->fetch_assoc()) {
            echo '<h1>Patient Details</h1><br>';
            echo "district: ";
			echo $row["district_by_region"].", ".$row["region"];		
		}
	}
    
} else {
	echo "No patient id passed";
}

if (isset($_GET['patient_info_id'])) {
	$id = sanitizeMySQL($conn, $_GET['patient_info_id']);
	$query = "SELECT * FROM patient_info WHERE patient_info_id=".$id;
	$result = $conn->query($query);
	if (!$result) die ("Invalid patient id.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No patient found with id of $id<br>";
	} else {
		while ($row = $result->fetch_assoc()) {
            echo "<br><br>hkid number: ";
			echo $row["hkid_number"]." <br> date of birth: ".$row["date_of_birth"]." <br> sex: ".$row["sex"];		
		}
	}
    
} else {
	echo "No patient id passed";
}

if (isset($_GET['patient_info_id'])) {
	$id = sanitizeMySQL($conn, $_GET['patient_info_id']);
	$query = "SELECT * FROM patient_medical WHERE patient_info_id=".$id;
	$result = $conn->query($query);
	if (!$result) die ("Invalid patient id.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No patient found with id of $id<br>";
	} else {
		while ($row = $result->fetch_assoc()) {
            echo "<br> symptoms (0=false, 1=true): ";
			echo $row["if_symptoms"]." <br> vaccinated (0=false, 1=true): ".$row["if_vaccinated"]." <br> government tested (0=false, 1=true): ".$row["if_gov_tested"]." <br> allergies: ".$row["allergies"];		
		}
	}
    
} else {
	echo "No patient id passed";
}

if (isset($_GET['patient_info_id'])) {
	$id = sanitizeMySQL($conn, $_GET['patient_info_id']);
	$query = "SELECT * FROM exposure WHERE patient_info_id=".$id;
	$result = $conn->query($query);
	if (!$result) die ("Invalid patient id.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No patient found with id of $id<br>";
	} else {
		while ($row = $result->fetch_assoc()) {
            echo "<br> exposure location: ";
			echo $row["exposure_location"]." <br> exposure date: ".$row["exposure_date"]." <br> exposure time: ".$row["exposure_time"];		
		}
	}

echo "<p><br><a href=\"admin.php\">Return to Admin's Dashboard</a></p>";

    
} else {
	echo "No patient id passed";
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
