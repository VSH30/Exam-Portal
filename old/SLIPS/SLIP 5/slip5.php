<?php
$icode = $_POST['icode'];
$iname = $_POST['iname'];
$ius = $_POST['ius'];
$irate = $_POST['irate'];

$code = explode(",",$icode);
$name = explode(",",$iname);
$us = explode(",",$ius);
$rate = explode(",",$irate);
$total = 0;

for($i=0;$i<5;$i++)
{
	$total = $total + ($us[$i] * $rate[$i]);
}

echo "<body><h1 align=center>Total BILL</h1></body>";
echo "<table border=2 align=center>";
echo "<tr align=center><th>Code</th><th>Name</th><th>Units Sold</th><th>Rate</th><th>Cost</th></tr>";

for($i=0;$i<5;$i++)
{
	echo "<tr align=center><td>$code[$i]</td><td>$name[$i]</td><td>$us[$i]</td><td>$rate[$i]</td><td>".($us[$i]*$rate[$i])."</td></tr>";
}
echo "<tr align=center><td colspan=2>TOTAL</td><td>".(array_sum($us))."</td><td>-</td><td>$total</td></tr></table>";

?>