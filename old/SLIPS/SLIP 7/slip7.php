<?php

$vvv = $_GET['vvv'];
$kkk = $_GET['kkk'];
$iii = $_GET['iii'];
$op = $_GET['op'];

$varr = explode(" ",$vvv);
$karr = explode(" ",$kkk);

if(count($varr) != count($karr))
{
	echo "Number of keys and number of elements is not same(ARRAY NOT CREATED)";
}else{
	$a = array_combine($karr,$varr);
	echo "Given Array:<br>";
	print_r($a);

	switch($op)
	{
		case 1:
			//Elements as key value pair
			echo "<br><br>Elements with keys: <br>";
			echo "key -> value<br>";
			foreach($a as $key=>$value)
			{
				echo "$key => $value";
				echo "<br>";
			}
			break;
		
		case 2:
			//Size of array
			echo "<br><br>Size of Given Array= ".sizeof($a);
			break;
		
		case 3:
			//Delete element from given index
			unset($a[$iii]);
			echo "<br><br>Deleted element from index $iii <br>";
			print_r($a);
			break;

		case 4:
			//Reverse the order of each element’s key-value pair
			echo "<br><br>Reversed order of element's key value pair:<br>";
			$aaa = array_flip($a);
			print_r($aaa);
			break;
		
		case 5:
			//Traverse the elements in an array in random order
			echo "<br><br>Traverse the element in random order:<br>";
			shuffle($a);
			foreach($a as $qq=>$yy)
			{
			echo "<br>".$yy;
			}
	}
}
?>