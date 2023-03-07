<?php
function onef()
{
	echo "<tr align=center><td>1</td> <td>50</td> <td>3.5</td> <td>175</td></tr>";
}
function twoe()
{
	echo "<tr align=center><td>2</td> <td>00</td> <td>4.0</td> <td>000</td></tr>";
}
function threee()
{
	echo "<tr align=center><td>3</td> <td>00</td> <td>5.2</td> <td>000</td></tr>";
}
function foure()
{
	echo "<tr align=center><td>4</td> <td>00</td> <td>6.5</td> <td>000</td></tr>";
}
function twof()
{
	echo "<tr align=center><td>2</td> <td>100</td> <td>4.0</td> <td>400</td></tr>";
}
function threef()
{
	echo "<tr align=center><td>3</td> <td>100</td> <td>5.2</td> <td>520</td></tr>";
}
function fixed()
{
	echo "<tr align=center><td>5</td> <td>Fixed Charge</td> <td>150</td> <td>150</td></tr>";
}

$name = $_POST['name'];
$cnum = $_POST['cnum'];
$u = $_POST['units'];
echo "<body align=center bgcolor=Black><font color=White>";
echo "<h1 align=center>Electricity BILL</h1>";
echo "<table border=2 align=center bgcolor=White>";
echo "<tr align=center><td>Name</td><td colspan=3><b>$name</b></td></tr>";
echo "<tr align=center><td>Consumer No.</td><td colspan=3><b>$cnum</b></td></tr>";
echo "<tr align=center><th>Sr No.</th><th>Units Consumed</th><th>Rate/Unit</th><th>COST</th></tr>";
if($u<=50)
{
	$c = 150 + ($u * 3.5);
	echo "<tr align=center><td>1</td> <td>$u</td> <td>3.5</td> <td>$c</td></tr>";
	twoe();
	threee();
	foure();
	fixed();
	echo "<tr align=center><td>Total</td><td>$u</td><td>-</td><td>$c</td></tr>";
}else if(50<$u && $u<=150){
	$uu = $u - 50;
	$cc = $uu*4;
	$c = 150 + 175 + $cc;
	onef();
	echo "<tr align=center><td>2</td> <td>$uu</td> <td>4.0</td> <td>$cc</td></tr>";
	threee();
	foure();
	fixed();
	echo "<tr align=center><td>Total</td><td>$u</td><td>-</td><td>$c</td></tr>";
}else if(150<$u && $u<=250){
	$uu = $u - 150;
	$cc = $uu*5.2;
	$c = 150 + 175 + 400 + $cc;
	onef();
	twof();
	echo "<tr align=center><td>3</td> <td>$uu</td> <td>5.2</td> <td>$cc</td></tr>";
	foure();
	fixed();
	echo "<tr align=center><td>Total</td><td>$u</td><td>-</td><td>$c</td></tr>";	
}else if(250<$u){
	$uu = $u - 250;
	$cc = $uu*6.5;
	$c = 150 + 175 + 400 + 520 + $cc;
	onef();
	twof();
	threef();
	echo "<tr align=center><td>4</td> <td>$uu</td> <td>6.5</td> <td>$cc</td></tr>";
	fixed();
	echo "<tr align=center><td>Total</td><td>$u</td><td>-</td><td>$c</td></tr>";
}
echo "</table>";
echo "</font></body>";
?>