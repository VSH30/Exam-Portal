<?php
function display($a,$b)
{
	echo "Given Inputs are:<br><br>";
	echo "First String= ".$a;
	echo "<br>Second String= ".$b;
}

$fs = $_GET['fs'];
$ss = $_GET['ss'];
$po = $_GET['po'];
$op = $_GET['op'];
$split;

switch($op)
{
	case 1:
		display($fs,$ss);
		echo "<br><br>Using strcmp:";
		if(strcmp($fs,$ss)==0)
		{
			echo "<br><br>First String = Second String";
		}else{
			echo "<br><br>First String != Second String";
		}
		echo "<br><br>Using == :";
		if($fs == $ss)
		{
			echo "<br><br>First String = Second String";
		}else{
			echo "<br><br>First String != Second String";
		}
		break;
	
	case 2:
		display($fs,$ss);
		$fsss = $fs." ".$ss;
		echo "<br><br>Appending Second String to First: <br>".$fsss;
		break;
	
	case 3:
		display($fs,$ss);
		$l = strlen($fs) - $po;
		$abc = substr($fs,$po,$l);
		echo "<br><br>Reverse First String from Given Position:<br>
		Position = $po <br>Reverse = ".strrev($abc);
		break;
	
	default:
		echo "Please choose a opertion!!!";
		break;
}
?>