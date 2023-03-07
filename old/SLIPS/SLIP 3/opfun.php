<?php

function add($x,$y)
{
	echo "Given Numbers are:<br><br>A = $x <br>B = $y <br><br>";
	echo "Operation = ADDITION<br><br>";
	echo "$x + $y = ".($x+$y);
}

function sub($x,$y)
{
	echo "Given Numbers are:<br><br>A = $x <br>B = $y <br><br>";
	echo "Operation = SUBSTRACTION<br><br>";
	echo "$x - $y = ".($x-$y);
}

function mul($x,$y)
{
	echo "Given Numbers are:<br><br>A = $x <br>B = $y <br><br>";
	echo "Operation = MULTIPLICATION<br><br>";
	echo "$x x $y = ".($x*$y);
}

function div($x,$y)
{
	echo "Given Numbers are:<br><br>A = $x <br>B = $y $y <br><br>";
	echo "Operation = DIVISON<br><br>";
	echo "$x / $y = ".($x/$y);
}

?>