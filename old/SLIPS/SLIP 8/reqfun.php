<?php
function sbvck($a,$b)
{
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
}

function sbvwck($a,$b)
{
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
}

function odd($z)
{
if($z%2==1)
return $z;
}

function foddelement($a,$b)
{
	echo "<br><br>Filtering odd elements:<br>";
			echo "<br><b>Array A:</b><br>";
				print_r(array_filter($a,'odd'));
			echo "<br><b>Array B:</b><br>";
				print_r(array_filter($b,'odd'));
}

function uis($a,$b)
{
	echo "<br><br>Find Union, intersection and setdiff<br>";
			echo "<br><b>Union:</b><br>";
				print_r(array_unique(array_merge($a,$b)));
			echo "<br><br><b>Intersection:</b><br>";
				print_r(array_intersect($a,$b));
			echo "<br><br><b>Setdiff:</b><br>";
				print_r(array_diff($a,$b));
}

?>