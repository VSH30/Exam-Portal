<?php
function kmtom($x)
{
	$m = $x * (1/1.609);
	echo "<h3>$x Kilometers = $m Miles<h3>";
}
function mtokm($y)
{
	$km = $y * 1.609;
	echo "<h3>$y Miles = $km Kilometers</h3>";
}
echo "<body align=center><h1 align=center>SLIP 13</h1><h2>Distance Calculator</h2>";
$d = $_GET['d'];
$op = $_GET['op'];

switch($op)
{
	case 1:
		mtokm($d);
		break;
	
	case 2:
		kmtom($d);
		break;
		
	default:
		echo "Please select an Operation!!!";
		break;
}
echo "</body>";
?>