<?php

include("reqfun.php");

$vvv = $_GET['vvv'];
$kkk = $_GET['kkk'];
$bvvv = $_GET['bvvv'];
$bkkk = $_GET['bkkk'];

$op = $_GET['op'];

$varr = explode(" ",$vvv);
$karr = explode(" ",$kkk);

$bvarr = explode(" ",$bvvv);
$bkarr = explode(" ",$bkkk);

if(count($varr) != count($karr))
{
	echo "<b><font color=840000>Number of keys and number of elements is not same for Array A(ARRAY NOT CREATED)</font></b>";
}else if(count($bvarr) != count($bkarr)){
	echo "<b><font color=840000>Number of keys and number of elements is not same for Array B(ARRAY NOT CREATED)</font></b>";
}else{
	
	$b = array_combine($bkarr,$bvarr);
	$a = array_combine($karr,$varr);
	
	echo "Given Arrays:</b><br>";
	echo "<br><b>Array A:</b><br>";
	print_r($a);
	echo "<br><b>Array B:</b><br>";
	print_r($b);

	switch($op)
	{
		case 1: //sort arrays by value(Chaning keys)
			sbvck($a,$b);
			break;
		
		case 2: //sort arrays by value(Without Changing Keys)
			sbvwck($a,$b);
			break;
		
		case 3: //Filter odd elements from arrays
			foddelement($a,$b);
			break;

		case 4: //Sort the diff at a glance
			echo "DONT KNOW THE SOLUTION!!!";
			break;
		
		case 5: //Merge the given arrays
			echo "<br><br>Merging the given arrays:<br>";
			print_r(array_merge($a,$b));
			break;
		
		case 6: //Find Union, intersection and setdiff
			uis($a,$b);
			break;
	}
}
?>