<?php session_start(); date_default_timezone_set('Asia/Kolkata');
$conn = mysqli_connect("");
if(!$conn)
	die(mysqli_connect_error($conn));
?>
<html>
<form method=POST action=#>
SELECT A TEST_ID TO DELETE : <select name=tid>
<option value=""></option>
<?php
$rrr = $_SESSION['rno'];
if($_SESSION['class'] == "Faculty")
    $select="SELECT test_id FROM test_details WHERE by_rno=$rrr";
elseif($_SESSION['class']=="Admin")
    $select="SELECT test_id FROM test_details";
$delr = mysqli_query($conn,$select);
while($row=mysqli_fetch_row($delr))
{
	echo "<option value=$row[0]>$row[0]</option>";
}
?>
</select><br><br>
<input type=submit name=Delete value=Delete>
</form>
<a href='facpage.php'>Return to Faculty Page</a><br><br>
<?php
if(isset($_POST['Delete']))
{
    $rrr = $_SESSION['rno'];
		$nnn=$_SESSION['name'];
		$ccc=$_SESSION['class'];
		$t=date('d-m-y h:i:s');
	$tid = $_POST['tid'];
	$delete = "DROP TABLE $tid;";
	$delete.= "DELETE FROM test_details WHERE test_id='$tid';";
    $delete.= "INSERT INTO log(rno,name,class,task,remark,time) VALUES($rrr,'$nnn','$ccc','Deleted Test','$tid','$t');";
	
	if(mysqli_multi_query($conn,$delete))
	{
		echo "<br>DELETED TEST $tid <br>";

	}else{
		echo "FAILED TO DELETE $tid".mysqli_error($conn);
	}
}

$selr=mysqli_query($conn,"SELECT * FROM test_details");
if(!$selr)
	die("You need to return to faculty page!!!<br>".mysqli_error($conn));

echo "<table border=2 cellpadding=5px align=center>";
echo "<tr align=center><th colspan=9>TEST DETAILS</th></tr>";
echo "<tr align=center><th>Test ID</th><th>By rno</th><th>Sub</th><th>Subject</th><th>No of Ques</th><th>Time(minutes)</th><th>PlusMarks</th><th>MinusMarks</th><th>NA Marks(minus)</th></tr>";
while($a=mysqli_fetch_array($selr))
{
	echo "<tr align=center><td>".$a['test_id']."</td>
												<td>".$a['by_rno']."</td>
												<td>".$a['sub']."</td>
												<td>".$a['subject']."</td>
												<td>".$a['questions']."</td>
												<td>".$a['time_minutes']."</td>
												<td>".$a['plus']."</td>
												<td>".$a['minus']."</td>
												<td>".$a['na']."</td></tr>";
}
echo "</table>";
?>
</html>
