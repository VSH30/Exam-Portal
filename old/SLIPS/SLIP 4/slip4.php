<?php
function display($a,$b,$c)
{
	echo "Given Inputs are:<br><br>";
	echo "Large String= ".$a;
	echo "<br>Small String= ".$b;
	echo "<br>Third String= ".$c;
}

$ls = $_GET['ls'];
$ss = $_GET['ss'];
$ts = $_GET['ts'];
$op = $_GET['op'];
$split;

switch($op)
{
	case 1:
		display($ls,$ss,$ts);
		if(strpos($ls,$ss) == 0)
		{
			echo "<br><br>Small string appears at start of Large string.";
		}else{
			echo "<br><br>Small string does not appear at start of Large string.";
		}
		break;
	
	case 2:
		display($ls,$ss,$ts);
		echo "<br><br>Replace Small with 3rd in Large: <br>".str_replace($ss,$ts,$ls);
		break;
	
	case 3:
		display($ls,$ss,$ts);
		echo "<br><br>Split large string into separate words: <br>";
		print_r (explode(" ",$ls));
		break;
	
	default:
		echo "Please choose a opertion!!!";
		break;
}