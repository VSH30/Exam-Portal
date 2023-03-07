<?php
function dis($x,$y,$z,$o)
{
	echo "<tr align=center><td>".($o+1)."</td><td>$x[$z]</td><td>$y[$z]</td></tr>";
}

$cost = 0;
$na = array("Watermelon","Onions","Tomatoes","Ginger root","Bananas","Pineapple","Coconut","Grapes");
$ra = array(16,25,20,75,40,40,20,75);

echo "<h1 align=center>SLIP 15</h1>";

if(empty($_POST['s']))
{
	echo "<br><h3 align=center>You haven't selected any item!!!</h3><br>";
}else{
		echo "<table border=1 align=center><tr><th>SrNo.</th><th>Item Name</th><th>Rate</th></tr>";
		$s = $_POST['s'];
		$n = count($s);
		for($i=0;$i<$n;$i++)
		{
			$op = $s[$i];
			dis($na,$ra,$op,$i);
			$cost = $cost + $ra[$op];
		}
		echo "<tr align=center><td colspan=2>TOTAL COST</td><td>$cost</td></tr></table>";
}
?>