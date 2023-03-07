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

switch($op)
{
	case 1:
		display($ls,$ss,$ts);
		echo "<br><br>First Occurence of Small in Large = ".strpos($ls,$ss);
		echo "<br>Last Occurence of Small in Large = ".strrpos($ls,$ss);
		break;
	
	case 2:
		display($ls,$ss,$ts);
		echo "<br><br>Total Occurence of Small in Large = ".substr_count($ls,$ss);
		break;
	
	case 3:
		display($ls,$ss,$ts);
		echo "<br><br>Replace Small with 3rd in Large: ".str_replace($ss,$ts,$ls);
		break;
	
	default:
		echo "Please choose a opertion!!!";
		break;
}