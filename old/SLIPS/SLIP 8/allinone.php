<?php
//MAINNNN
function odd($z)
{
if($z%2==1)
return $z;
}

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
	echo "Number of keys and number of elements is not same for Array A(ARRAY NOT CREATED)";
}else if(count($bvarr) != count($bkarr)){
	echo "Number of keys and number of elements is not same for Array B(ARRAY NOT CREATED)";
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
			echo "<br><br>Sort arrays by value(Chaning Keys):<br>";
			echo "<b>Array A(Ascending):</b><br>";	
				sort($a);
				print_r($a);
			echo "<br><b>Array A(Descending):</b><br>";
				rsort($a);
				print_r($a);
			echo "<br><b>Array B(Ascending):</b><br>";	
				sort($b);
				print_r($b);
			echo "<br><b>Array B(Descending):</b><br>";
				rsort($b);
				print_r($b);
			break;
		
		case 2: //sort arrays by value(Without Changing Keys)
			echo "<br><br>Sort arrays by value(Without Chaning Keys):<br>";
			echo "<br><b>Array A(Ascending):</b><br>";	
				asort($a);
				print_r($a);
			echo "<br><b>Array A(Descending):</b><br>";
				arsort($a);
				print_r($a);
			echo "<br><b>Array B(Ascending):</b><br>";	
				asort($b);
				print_r($b);
			echo "<br><b>Array B(Descending):</b><br>";
				arsort($b);
				print_r($b);
			break;
		
		case 3: //Filter odd elements from arrays
			echo "<br><br>Filtering odd elements:<br>";
			echo "<br><b>Array A:</b><br>";
				print_r(array_filter($a,'odd'));
			echo "<br><b>Array B:</b><br>";
				print_r(array_filter($b,'odd'));
			break;

		case 4: //Sort the diff at a glance
			echo "DONT KNOW THE SOLUTION!!!";
			break;
		
		case 5: //Merge the given arrays
			echo "<br><br>Merging the given arrays:<br>";
			print_r(array_merge($a,$b));
			break;
		
		case 6: //Find Union, intersection and setdiff
			echo "<br><br>Find Union, intersection and setdiff<br>";
			echo "<br><b>Union:</b><br>";
				print_r(array_unique(array_merge($a,$b)));
			echo "<br><br><b>Intersection:</b><br>";
				print_r(array_intersect($a,$b));
			echo "<br><br><b>Setdiff:</b><br>";
				print_r(array_diff($a,$b));
			break;
	}
}
?>