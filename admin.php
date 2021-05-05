<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['eng_first_name']) || !isset($_SESSION['eng_last_name']) ) {
	header("Location: admin_login.php");
} 
   
include_once'header.php';
require_once("login.php");

echo "<h3>Welcome, ".$_SESSION['eng_first_name']." ".$_SESSION['eng_last_name'];
echo " | <small><a href=\"sign_out.php\">Logout</a></small></h3><br>";
 
# Make the connection to mysql using the credentials above
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

# Construct the query for the results we'd like
$query = "SELECT * FROM `patient` T1 INNER JOIN `patient_info` T2 ON T1.patient_id = T2.patient_id"; 

# Run our query, making sure we received results back
$result = $conn->query($query);
if (!$result) die("Database access failed: " . $conn->error);


$rows = $result->num_rows;
echo "There are $rows current entries to review."."<br><br>";
    
?>
       
<div class="container has-text-left">
    <div class="content">
        <h6 class>Patient List</h6>
    </div>
</div>
 
<?php
echo "<table><tr><th>Patient Id</th><th>Last Name</th><th>First Name</th><th>Chinese Name</th><th>Phone Number<th>Flat Number</th><th>Floor Number</th><th>Building Name</th><th>Street Address</th></tr>";
while ($row = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>";
    echo "<a href=\"viewpatient.php?patient_info_id=".$row["patient_info_id"]."\">".$row["patient_info_id"]."</a>";
    echo"</td><td>".$row["eng_last_name"]."</td><td>".$row["eng_first_name"]."</td><td>".$row["chi_name"]."</td><td>".$row["phone_number"]."</td><td>".$row["flat_number"]."</td><td>".$row["floor_number"]."</td><td>".$row["building_name"]."</td><td>".$row["street_address"]."</td>";
	echo "</tr>";
}
echo "</table> . <br>";

?>
    
<div class="container has-text-left">
    <div class="content">
        <h6 class>Patient Count by District</h6>
    </div>
</div>

<?php

$query = "SELECT `district_by_region`, `region`, COUNT(`district_id`) FROM `district` GROUP BY `district_by_region` ORDER BY COUNT(`district_id`) DESC
";
    
$result = $conn->query($query);
if (!$result) die("Database access failed: " . $conn->error);

echo "<table><tr><th>District by Region</th><th>Region</th><th>Patient Count</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
	echo "<td>".$row["district_by_region"]."</td><td>".$row["region"]."</td><td>".$row["COUNT(`district_id`)"]."</td>";
	echo "</tr>";
    
}
echo "</table> . <br>";
?>

<div class="container has-text-left">
    <div class="content">
        <h6 class>Exposure Location Clusters</h6>
    </div>
</div>
<?php

$query = "SELECT `exposure_location`, `exposure_date`, COUNT(`exposure_id`) FROM `exposure` GROUP BY `exposure_location` ORDER BY COUNT(`exposure_id`) DESC
";
    
$result = $conn->query($query);
if (!$result) die("Database access failed: " . $conn->error);

echo "<table><tr><th>Exposure Location Name</th><th>Date</th><th>Patient Count</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
	echo "<td>".$row["exposure_location"]."</td><td>".$row["exposure_date"]."</td><td>".$row["COUNT(`exposure_id`)"]."</td>";
	echo "</tr>";
    
}
echo "</table> . <br>";

# close the database connection
$result->close();
$conn->close();

include_once'footer.php'
?>

</body>
</html>
