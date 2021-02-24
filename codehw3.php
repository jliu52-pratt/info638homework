<!DOCTYPE html>
<html>
<head>
		<title>Code Homework #3
		</title>
</head>
<html>
<body>
<?php
echo("<h1>Code Homework #3 [Arrays]</h1>"); 

//Problem #1
echo("<h2>Challenge 1: Book Lists</h2>" . "<br />");

    //Create a two-dimensional array defined $bookdata that stores rows of data as one array, and each row of book information as an array within this array.
$bookdata = array(
	array("Title","First Name","Last Name","Number of Pages","Type","Price"), #6 elements
	array("PHP and MySQL Web Development","Luke","Welling",144,"Paperback",31.63), 
	array("Web Design with HTML, CSS, JavaScript and jQuery","Jon","Duckett",135,"Paperback",41.23),
	array("PHP Cookbook: Solutions & Examples for PHP Programmers","David","Sklar",14,"Paperback",40.88),
	array("JavaScript and JQuery: Interactive Front-End Web Development","Jon","Duckett",251,"Paperback",22.09),
	array("Modern PHP: New Features and Good Practices","Josh","Lockhart",7,"Paperback",28.49),
	array("Programming PHP","Kevin","Tatroe",26,"Paperback",28.96)
);

//Plug arrays/elements into table. put a nststed for loop to access elements of $bookdata array.
echo "<table border=\"1\">";
//express what to use as a counter
for($i=0;$i<count($bookdata);$i++) {
  echo('<tr>'); #table row 
#say stop counter when it gets to be less than count function (stop iterating the array)
  for($b=0;$b<count($bookdata[$i]);$b++) {
	  ($i == 0 ) ? $style = ' style="background-color: Plum; color:white; font-style:heading;text-align:center"' : $style = NULL;
    echo("<td$style>" . $bookdata[$i][$b] . "</td>"); #data cell
  } 
  echo('</tr>');
}
echo "</table><p></p>";

//calculate the total price of index 5
echo ("Your total price is $");
echo $bookdata[1][5]+$bookdata[2][5]+$bookdata[3][5]+$bookdata[4][5]+$bookdata[5][5]+$bookdata[6][5];

    
//Problem #2
echo( "<h2>Challenge 2: Coin Toss, continued</h2>" . "<br />");      
    
    $a = 4; //define $a as the desired number "heads in a row" 

//Make a function that can be used in a loop. We will stop the loops once we get the desired number of heads.
function cointoss($toss)
{
  $toss_array = []; #make an empty array for "toss"
  $result_array = []; #make an empty array for "result"
  do {
    if (mt_rand(1,2) == 1)
    {
      array_push($result_array, 1); #use array_push to insert element 'heads' into existing array
      unset($toss_array); #delete array 
      $toss_array = [];
    }
		else
		{
		array_push($result_array, 2); #use array_push to insert element 'tails' into existing array
		array_push($toss_array, 2);
		}
  } while(count($toss_array) < $toss); #break loop once $toss_array reaches $a (desired number of heads)
  return $result_array;
}


echo ("Beginning the coin flipping, looking for $a heads in a row..." . "<br /><br />");
$result = cointoss($a);
$count = count($result); 

// make a foreach...as loop for $result array that will echo until desire doutcome of 'X' heads, with each loop that will set $flip as value of that position in array. 
foreach ($result as $flip) {
  if ($flip == 1)
  {
    echo "<img src='http://lincolnpennies.net/wp-content/uploads/2009/08/lincoln_penny_obverse1-250x249.jpg' alt='Heads' width=50 height-50/>" . "\n"; //if flip = 1, echo heads image
  }
  elseif ($flip == 2)
  {
    echo "<img src='http://lincolnpennies.net/wp-content/uploads/2009/08/lincoln-memorial-penny-250x248.jpg' alt='Tails' width=50 height-50/>" . "\n"; //if flip = 1, echo tails image
  }
} echo ("<br />". "<br>Flipped $a heads in  arow, in $count flips!");
echo "</div>";
                                
?>

</body>
</html>