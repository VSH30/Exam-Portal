<?php

$side = $_GET['side'];
$radius = $_GET['radius'];
$length = $_GET['length'];
$breadth = $_GET['breadth'];

interface A
{
	function ar($x,$y);
}
class R implements A
{
	function ar($x,$y)
	{
		$ar = $x * $y;
		echo "<h3>Area of Rectangle = $ar</h3>";
	}
}
class S extends R
{
	function ar($x,$y)
	{
		$ar = $x * $y;
		echo "<h3>Area of Square = $ar</h3>";
	}
}
class C
{
	function ar($r)
	{
		$ar = (22/7)*pow($r,2);
		echo "<h3>Area of Circle = $ar</h3>";
	}
}
echo "<body bgcolor=Black align=center>";
echo "<font color =White>";
echo "<h1>SLIP 11</h1>";
$rect = new R;
$rect->ar($length,$breadth);

$sq = new S;
$sq->ar($side,$side);

$circle = new C;
$circle->ar($radius);
echo "</font></body>";
?>