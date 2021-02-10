<!DOCTYPE html>
<html>
<head>
		<title>Code Homework #1
		</title>
</head>
<html>
<body>
<?php
echo("Code Homework #1 [Variables, expressions, and control flow]" . "<br /><br />");

    //Problem #1
echo( "Challenge 1: Correct Change" . "<br /><br />");
$amount = 159; //can change input value
$leftover = $amount;

$NumDollars = (int)($leftover / 100); //make sure it is an integer num. 

$leftover = $leftover % 100; //carry over remainder for each code below. 
$NumQuarters = (int)($leftover / 25);

$leftover = $leftover % 25;
$NumDimes = (int)($leftover / 10);

$leftover = $leftover % 10;
$NumNickels = (int)($leftover / 5); 

$leftover = (int)($leftover % 5); //leftover cents.

echo( "You are due\n" . $amount . "\n cents in change total." . "<br />\n");
echo ("You are due back\n" . $NumDollars . "\ndollar(s),\n" . $NumQuarters . "\nquarter(s),\n" . $NumDimes . "\ndime(s),\n" . $NumNickels . "\nnickel(s), and\n" . $leftover . "\ncent(s)" . "<br /><br />");

    //Problem #2:
echo( "Challenge 2: 99 Bottles of Beer" . "<br /><br />");
$count = 4;
while ($count >= 1) {
	echo ("$count bottles of beer on the wall, $count bottles of beer." . "<br />\n");
    --$count;
    echo ("Take one down, pass it around, $count bottles of beer on the wall." . "<br /><br />");
}
    
 ?>

</body>
</html>