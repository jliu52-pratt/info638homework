<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Patient Submit</title>
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
    
?>

<legend>Your information has been submitted successfully.</legend><br>
<legend>A health official will review your data and will contact you shortly.</legend>
<legend>In the meantime, please review the quarantine camps below and see what to pack for your 14-day quarantine if necessary.</legend><br><br>

<p class="subtitle has-text-black">Hong Kong Quarantine Camps</p> 
    <div class="columns">
        <div class="column">
            <fieldset>
                <legend>Lei Yue Mun Park and Holiday Village</legend><br>
                <img src="https://i1.wp.com/hongkongbuzz.hk/wp-content/uploads/2020/04/quarantine-unit.jpg?fit=800%2C600&ssl=1" width="300px">
                <p>Address: 75 Chai Wan Road, Sai Wan Shan, Hong Kong</p><br>
                <p>Available Units: 44/379</p> 
            </fieldset>
        </div>
        <div class="column">
                <fieldset>
                    <legend>Penny's Bay Quarantine Centre</legend><br>
                    <img src="https://www.atal.com/wp-content/uploads/2020/11/Temporary-Quarantine-Facilities-at-Pennys-Bay-Phase-IV-were-launched-in-early-November.jpg" width="300px">
                    <p>Address: Fantasy Road, Penny’s Bay, Lantau Island</p><br>
                    <p>Available Units: 1089/3500</p>
                </fieldset>
        </div>
        <div class="column">
            <fieldset>
                <legend>Silka Tsuen Wan</legend><br>
                <img src="https://media-cdn.tripadvisor.com/media/photo-s/11/28/de/45/standard-room.jpg" width="300px">
                <p>Address: 119 Wo Yi Hop Road, Kwai Chung, Kowloon</p><br>
                <p>Available Units: 33/409</p>

            </fieldset>
        </div>
        <div class="column">
            <fieldset>
                <legend>Dorsett Kwun Tong</legend><br>
                <img src="https://media-cdn.tripadvisor.com/media/photo-s/02/cd/ee/d3/dorsett-regency-kwun.jpg" width="300px">
                <p>Address: 84 Hung To Road, Kwun Tong, Kowloon, Hong Kong</p><br>
                <p>Available Units: 39/361</p>
            </fieldset>
        </div>
    </div>
<p class="subtitle has-text-black"><br>Packing List:</p>
    <li>Disinfectant wipes or spray</li>
    <li>Towels</li>
    <li>Bed sheets or a sleeping bag</li>
    <li>Clean and comfortable clothes</li>
    <li>Slippers and flip flops</li>
    <li>A WiFi egg or data card</li>
    <li>Books</li>
    <li>Laptop, or iPad</li>
    <li>An extension cord</li>
    <li>Masks</li>
    <li>Supplementary food</li>
    <li>Yoga mat</li>
    <li>Lightweight bowl, mug, cutlery, or a Swiss army knife</li>
    <li>Extra toilet paper</li>    
<?php 
    include_once'footer.php'
?>
</body> 
</html>