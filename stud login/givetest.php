<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$conn = mysqli_connect("sql208.hyperphp.com","hp_32984812","2f3fccd3b1d","hp_32984812_mcqtest");
if(!$conn)
	die("FAILED TO CONNECT".mysqli_connect_error($conn));
?>

<html>
<form method=POST action=#>
Select Test : <select name=test>
<?php
$q = "Show tables";
$r = mysqli_query($conn,$q);
if(!$r)
	die("FAILED TO FETCH TABLES".mysqli_error($conn));

while($d=mysqli_fetch_row($r))
{
	if($d[0]!="studlist" && $d[0]!="result" && $d[0]!="test_details" && $d[0]!="log")
		echo "<option value=".$d[0].">".$d[0]."</option>";
}
?>
</select>
<input type=submit name=next value=next>
<?php
if(isset($_POST['next']))
{
	$rno=$_SESSION['rno'];
	$squery = "SELECT test_id FROM result WHERE rno=$rno";
	$rt=mysqli_query($conn,$squery);
	if(!$rt)
		die("FAILED TO FETCH TEST IDS".mysqli_error($conn));
	while($row=mysqli_fetch_row($rt))
	{
		if($row[0]==$_POST['test'])
			die("<h1 align=center><font color=Red>SORRY, YOU CAN'T GIVE THE SAME TEST TWICE!!!</font></h1><br><br><a href='studpage.php'>Return to Student Page</a>");
	}
	
	$_SESSION['test']=$_POST['test'];
	header('LOCATION:testpage.php');
}
?>
</form>
<br><br>
<table cellpadding=5px>
    <tr align=center><th>dm =></th><td>Digital Marketing</td></tr>
    <tr align=center><th>ds =></th><td>Data Structure</td></tr>
    <tr align=center><th>se =></th><td>Software Engineering</td></tr>
    <tr align=center><th>php =></th><td>PHP</td></tr>
    <tr align=center><th>bd =></th><td>BigData</td></tr>
</table>
<a href="studpage.php">Return to Student Page</a>
</html>