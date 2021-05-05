<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Patient Information Form</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['eng_first_name']) || !isset($_SESSION['eng_last_name']) ) {
	header("Location: index.php");
} 
    
include_once'header.php';
require_once("login.php");

echo "<h3>Welcome, ".$_SESSION['eng_first_name']." ".$_SESSION['eng_last_name'];
echo " | <small><a href=\"sign_out.php\">Logout</a></small></h3><br>";
    
#only want to execute if user has submitted a form. error checking  
if (isset($_POST['submit'])) { //check if the form has been submitted
	if ((empty($_POST['chinesename'])) || (empty($_POST['hkidnumber'])) || (empty($_POST['phonenumber'])) || (empty($_POST['dateofbirth'])) || (empty($_POST['sex'])) || (empty($_POST['flatnumber'])) || (empty($_POST['floornumber'])) || (empty($_POST['buildingname'])) || (empty($_POST['streetaddress'])) ) {
		echo "<p>Please fill out all of the form fields!</p>";
	} else {
		$conn = new mysqli($hn, $un, $pw, $db);
		if ($conn->connect_error) die($conn->connect_error);
		$chinesename = sanitizeMySQL($conn, $_POST['chinesename']);
        $hkidnumber = sanitizeMySQL($conn, $_POST['hkidnumber']);
		$phonenumber = sanitizeMySQL($conn, $_POST['phonenumber']);			
		$dateofbirth = sanitizeMySQL($conn, $_POST['dateofbirth']);
        $sex = sanitizeMySQL($conn, $_POST['sex']);
        $flatnumber = sanitizeMySQL($conn, $_POST['flatnumber']);
        $floornumber = sanitizeMySQL($conn, $_POST['floornumber']);
        $buildingname = sanitizeMySQL($conn, $_POST['buildingname']);
        $streetaddress = sanitizeMySQL($conn, $_POST['streetaddress']);
		$query = "INSERT INTO `patient_info` (`patient_info_id`, `patient_id`, `chi_name`, `hkid_number`, `phone_number`, `date_of_birth`, `sex`, `flat_number`, `floor_number`, `building_name`, `street_address`) VALUES (NULL, \'18'\, \"$chinesename\", \"$hkidnumber\", \"$phonenumber\", \"$dateofbirth\", \"$sex\", \"$flatnumber\", \"$floornumber\", \"$buildingname\", \"$streetaddress\")";
		$result = $conn->query($query);
		if (!$result) {
			die ("Database access failed: " . $conn->error);
		} else {
			echo "<p>Successfully added your personal information!<a href=\"index.php\">A health official will contact you shortly. In the meantime, please</a></p>";
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
    <form method="post" action="patientinfo_form.php">
        <p class="subtitle has-text-black">Patient Information </p> 
        <legend>Please add your information below.</legend><br><br>
    <div class="columns">
      <div class="column">
         <fieldset>
            <legend>Personal</legend><br>
            <label for="chinesename">Chinese Name:</label>
            <input type="text" name="chinesename"><br> 
            <label for="hkidnumber">HKID Number:</label> 
            <input type="text" name="hkidnumber" required><br>
            <label for="phonenumber">Phone Number:</label> 
            <input type="text" name="phonenumber" required><br>
            <label for="dateofbirth">Date of Birth:</label> 
            <input type="date" name="dateofbirth" required><br>
            <label for="sex">Sex:</label> 
            <input type="radio" name="sex"> m
            <input type="radio" name="sex"> f<br>
            <label for="flatnumber">Flat Number:</label>
            <input type="text" name="flatnumber" required><br> 
            <label for="floornumber">Floor Number:</label> 
            <input type="text" name="floornumber" required><br>
            <label for="buildingname">Building Name:</label> 
            <input type="text" name="buildingname"><br>
            <label for="streetaddress">Street Address:</label> 
            <input type="text" name="streetaddress" required><br>
            <input type="submit" name="submit">
        </fieldset>
      </div>
    <div class="column">
        <fieldset>
            <legend>Address District</legend><br>
             <select name="region">
                <option value="hongkong">Hong Kong</option>
                <option value="kowloon">Kowloon</option>
                <option value="newterritories">New Territories</option>
             </select><br>
             <select name="district"><br>
                <option value="aberdeen">Aberdeen</option>
                <option value="admiralty">Admiralty</option>
                <option value="apleichau">Ap Lei Chau</option>
                <option value="causewaybay">Causeway Bay</option>
                <option value="central">Central</option>
                <option value="chaiwan">Chai Wan</option>
                <option value="chunghomkok">Chung Hom Kok</option>
                <option value="deepwaterbay">Deep Water Bay</option>
                <option value="happyvalley">Happy Valley</option>
                <option value="kennedytown">Kennedy Town</option>
                <option value="mid-levels">Mid-Levels</option>
                <option value="northpoint">North Point'</option>
                <option value="pokfulam">Pok Fu Lam</option>
                <option value="quarrybay">Quarry Bay</option>
                <option value="repulsebay">Repulse Bay</option>
                <option value="saiyingpun">Sai Ying Pun</option>
                <option value="shaukeiwan">Shau Kei Wan</option>
                <option value="sheko">Shek O</option>
                <option value="shektongtsui">Shek Tong Tsui</option>
                <option value="sheungwan">Sheung Wan</option>
                <option value="stanley">Stanley</option>
                <option value="taitam">Tai Tam</option>
                <option value="thepeak">The Peak</option>
                <option value="wanchai">Wan Chai</option>
                <option value="wongchukhang">Wong Chuk Hang</option>
                <option value="cheungshawan">Cheung Sha Wan</option>
                <option value="diamondhill">Diamond Hill</option>
                <option value="homantin">Ho Man Tin</option>
                <option value="hunghom">Hung Hom</option>
                <option value="kowloonbay">Kowloon Bay</option>
                <option value="kowlooncity">Kowloon City</option>
                <option value="kowloontong">Kowloon Tong</option>
                <option value="kwuntong">Kwun Tong</option>
                <option value="lokfu">Lok Fu</option>
                <option value="ngauchiwan">Ngau Chi Wan</option>
                <option value="ngautaukok">Ngau Tau Kok'</option>
                <option value="saumauping">Sau Mau Ping</option>
                <option value="shamshuipo">Sham Shui Po</option>
                <option value="shekkipmei">Shek Kip Mei</option>
                <option value="taikoktsui">tai kok tsui</option>
                <option value="tokwawan">to kwa wan</option>
                <option value="tsimshatsui">tsim sha tsui</option>
                <option value="tszwanshan">tsz wan shan</option>
                <option value="wangtauhom">wang tau hom</option>
                <option value="wongtaisin">wong tai sin</option>
                <option value="yaumatei">yau ma tei</option>
                <option value="yautong">yau tong</option>
                <option value="yauyatcheun">yau yat cheun</option>
                <option value="cheungchau">cheung chau</option>
                <option value="clearwaterbay">clear water bay</option>
                <option value="crookedisland">crooked island</option>
                <option value="fanling">Fanling</option>
                <option value="grassisland">grass island</option>
                <option value="heilingchau">hei ling chau</option>
                <option value="hungshuikiu">hung shui kiu</option>
                <option value="kwaichung">kwai chung</option>
                <option value="kwutung">kwu tung</option>
                <option value="lammaisland">lamma island</option>
                <option value="lantauisland">lantau island</option>
                <option value="laufaushan">lau fau shan'</option>
                <option value="maonshan">ma on shan</option>
                <option value="mawan">ma wan</option>
                <option value="pengchau">peng chau</option>
                <option value="pingche">ping che</option>
                <option value="saikung">sai kung</option>
                <option value="shataukok">sha tau kok</option>
                <option value="shatin">sha tin</option>
                <option value="shamtseng">sham tseng</option>
                <option value="shekkwuchau">shek kwu chau</option>
                <option value="sheungshui">sheung shui</option>
                <option value="sokwunwat">so kwun wat</option>
                <option value="takwuling">ta kwu ling</option>
                <option value="tailam">tai lam</option>
                <option value="taipo">tai po</option>
                <option value="taipokau">tai po kau</option>
                <option value="tinshuiwai">tin shui wai</option>
                <option value="tingkau">ting kau</option>
                <option value="tseungkwano">tseung kwan o</option>
                <option value="tsingyi">tsing yi</option>
                <option value="tsuenwan">tsuen wan</option>
                <option value="tuenmun">tuen mun</option>
                <option value="yuenlong">yuen long</option>
             </select><br>
            <input type="submit" name="submit">
        </fieldset>
      </div>
      <div class="column">
        <fieldset>
            <legend>Medical History</legend><br>
            <label for="ifsymptoms">Are you experiencing any symptoms?</label><br> 
            <input type="radio" name="ifsymptoms"> y 
            <input type="radio" name="ifsymptoms"> n<br>
            <label for="ifvaccinated">Have you been vaccinated?</label>
            <input type="radio" name="ifvaccinated"> y 
            <input type="radio" name="ifvaccinated"> n<br>
            <label for="ifvaccinated">Have you been government tested for COVID-19 in the past 3 days?</label>
            <input type="radio" name="ifgovtested"> y 
            <input type="radio" name="ifgovtested"> n<br>
            <label for="allergies">Do you have any allergies?</label> 
            <input type="text" name="allergies"><br>
            <input type="submit" name="submit">
        </fieldset>
      </div>
      <div class="column">
        <fieldset>
            <legend>Exposure Location</legend><br>
            <label for="exposurelocation">Location Name:</label>
            <input type="text" name="exposurelocatioon"><br> 
            <label for="exposuredate">Date of Visit:</label> 
            <input type="date" name="exposuredate" required><br>
            <label for="exposuretime">Time of Visit:</label> 
            <input type="timse" name="exposuretime" required><br>
            <button onclick="location.href='/~jliu52/hk_covid_portal/patient_submit.php'" type="button">Submit</button>
        </fieldset>
      </div>
    </div>
    </form>

<?php 
    include_once'footer.php'
?>
</body> 
</html>