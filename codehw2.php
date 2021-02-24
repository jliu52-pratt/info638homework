<!DOCTYPE html>
<html>
<head>
		<title>Code Homework #2
		</title>
</head>
<html>
<body>
<?php
echo("<h1>Code Homework #2 [Functions]</h1>"); 

    //Problem #1
echo( "<h2>Challenge 1: ISBN Validation</h2>" . "<br />");
  
$isbn = "0812995821"; //insert isbn code here
echo "Checking isbn: $isbn for validity...";

//not sure if there was an easier way to do this than seperating them into individual variables
$ISBNstring = $isbn;
$a = substr($ISBNstring,-10,1);
$b = substr($ISBNstring,-9,1);
$c = substr($ISBNstring,-8,1);
$d = substr($ISBNstring,-7,1);
$e = substr($ISBNstring,-6,1);
$f = substr($ISBNstring,-5,1);
$g = substr($ISBNstring,-4,1);
$h = substr($ISBNstring,-3,1);
$i = substr($ISBNstring,-2,1);
$j = substr($ISBNstring,-1,1);

// testing for the last digit. If equals to X, assign 10.
if ($j == "x") {
	$j = 10;
}

echo ("<br /><br />");

//adding the sum together
$sumtotal = ((10*$a)+(9*$b)+(8*$c)+(7*$d)+(6*$e)+(5*$f)+(4*$g)+(3*$h)+(2*$i)+(1*$j));
  if ($sumtotal % 11 == 0)
  {
    echo "This is a valid ISBN!";
  } else {
    echo "This is an invalid ISBN";
  }

    echo ("<br /><br />");
    
//Problem #2 Coin Toss

//Part A
echo( "<h2>Challenge 2: Coin Toss</h2>" . "<br />");
    
#set up function for coin toss with head $a or tail $b
function cointoss($a, $b) {
	$flip = mt_rand($a, $b);
	if ($flip==$a) {
	echo "<img src='http://lincolnpennies.net/wp-content/uploads/2009/08/lincoln_penny_obverse1-250x249.jpg' alt='Heads' width=50 height-50/>";
} else {
	echo "<img src='http://lincolnpennies.net/wp-content/uploads/2009/08/lincoln-memorial-penny-250x248.jpg' alt='Tails' width=50 height-50/>";
}
}
echo "Flipping a coin 1 times..." . "<br>";
$coin1 = cointoss(1, 2);
echo ($coin1 . "<br /><br />");
echo "Flipping a coin 3 times...". "<br>";
$coin2 = cointoss(1,2);
$coin3 = cointoss(1,2);
$coin4 = cointoss(1,2);
echo ($coin2 . $coin3 . $coin4 . "<br /><br />"); 
echo "Flipping a coin 5 times..."."<br>";
$coin5= cointoss(1,2);
$coin6= cointoss(1,2);
$coin7= cointoss(1,2);
$coin8= cointoss(1,2);
$coin9= cointoss(1,2);
echo ($coin5 . $coin6 . $coin7 . $coin8 . $coin9 . "<br /><br />"); 
echo "Flipping a coin 7 times..."."<br>";
$coin10= cointoss(1,2);
$coin11= cointoss(1,2);
$coin12= cointoss(1,2);
$coin13= cointoss(1,2);
$coin14= cointoss(1,2);
$coin15= cointoss(1,2);
$coin16= cointoss(1,2);
echo ($coin10 . $coin11 . $coin12 . $coin13 . $coin14 . $coin15 . $coin16 . "<br /><br />"); 
echo "Flipping a coin 9 times..."."<br>";
$coin17= cointoss(1,2);
$coin18= cointoss(1,2);
$coin19= cointoss(1,2);
$coin20= cointoss(1,2);
$coin21= cointoss(1,2);
$coin22= cointoss(1,2);
$coin23= cointoss(1,2);
$coin24= cointoss(1,2);
$coin25= cointoss(1,2);
echo ($coin17 . $coin18 . $coin19 . $coin20 . $coin21 . $coin22 . $coin23 . $coin24 . $coin25 . "<br /><br />"); 

    
//Part B. Stuck; not sure how to get two heads                  
?>

</body>
</html>