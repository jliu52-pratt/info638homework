<!DOCTYPE html>
<html>
<head>
		<title>Code Homework #2
		</title>
</head>
<html>
<body>
<?php
echo("<h1>Code Homework #3 [Arrays]</h1>"); 

//Problem #1
echo( "<h2>Challenge 1: Book List</h2>" . "<br />");
//Create multi-dimensional array 
$bookdata = array(
	array("Title","First Name","Last Name","Number of Pages","Type","Price"),
	array("PHP and MySQL Web Development","Luke","Welling",144,"Paperback",31.63), 
	array("Web Design with HTML, CSS, JavaScript and jQuery","Jon","Duckett",135,"Paperback",41.23),
	array("PHP Cookbook: Solutions & Examples for PHP Programmers","David","Sklar",14,"Paperback",40.88),
	array("JavaScript and JQuery: Interactive Front-End Web Development","Jon","Duckett",251,"Paperback",22.09),
	array("Modern PHP: New Features and Good Practices","Josh","Lockhart",7,"Paperback",28.49),
	array("Programming PHP","Kevin","Tatroe",26,"Paperback",28.96)
);

//Plug book data into a table
echo "<table border=\"1\">";
for($i=0;$i<count($bookdata);$i++) {
  echo('<tr>');
  for($j=0;$j<count($bookdata[$i]);$j++) {
	  ($i == 0 ) ? $style = ' style="background-color: gray; color:white; font-style:heading;text-align:center"' : $style = NULL;
    echo("<td$style>" . $bookdata[$i][$j] . "</td>");
  } 
  echo('</tr>');
}
echo "</table><p></p>";

//calculate total price
echo "Your total price is $";
echo $bookdata[1][5]+$bookdata[2][5]+$bookdata[3][5]+$bookdata[4][5]+$bookdata[5][5]+$bookdata[6][5];

    
//Problem #2
echo( "<h2>Challenge 2: Coin Toss, continued</h2>" . "<br />");      
    
    $a = 4; //set the number of heads you want in a row.

//Make a function that will be used in the loop. It will stop the loop once it gets the desired result.
function cointoss($toss)
{
  $test_array = [];
  $result_array = [];
  do {
    if (mt_rand(1,2) == 1)
    {
      array_push($result_array, 1);
      unset($test_array);
      $test_array = [];
    }
		else
		{
		array_push($result_array, 2);
		array_push($test_array, 2);
		}
  } while(count($test_array) < $toss);
  return $result_array;
}


echo "We are looking for $a heads in a row...<br>";
$result = cointoss($a);
$count = count($result);

// I made a loop that prints the result list until we get the desired result.
foreach ($result as $flip) {
  if ($flip == 1)
  {
    echo "<img src='http://lincolnpennies.net/wp-content/uploads/2009/08/lincoln_penny_obverse1-250x249.jpg' alt='Heads' width=50 height-50/>";
  }
  elseif ($flip == 2)
  {
    echo "<img src='http://lincolnpennies.net/wp-content/uploads/2009/08/lincoln-memorial-penny-250x248.jpg' alt='Tails' width=50 height-50/>";
  }
} echo "<br><p>It took $count tosses to land $a heads in a row.</p>";
echo "</div>";


                                    
?>

</body>
</html>