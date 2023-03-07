<?php session_start();
$conn = mysqli_connect("sql208.hyperphp.com","hp_32984812","2f3fccd3b1d","hp_32984812_mcqtest");
if(!$conn)
	die("FAILED TO CONNECT".mysqli_connect_error($conn));
?>
<html>
<form method=POST action=#>
Select student : <select name=rno>
<option value="">ALL STUDENTS</option>
<?php
$selstud = "SELECT * FROM studlist ORDER BY rno;";
$selr = mysqli_query($conn,$selstud);
if(!$selr)
	echo "FAILED TO GET SPECIFIC STUDENT!!!".mysqli_error($conn);
while($row=mysqli_fetch_array($selr))
{
	echo "<option value=".$row['rno'].">".$row['rno']." ".$row['name']."</option>";
}
?>
</select>
<input type=submit name=select value=select>
<br>
</form>

<form method=POST action=#>
Select a Result_id to DELETE : 
<select name=del>
<option value=""></option>
<?php
$delr=mysqli_query($conn,"SELECT result_id FROM result");
while($roww=mysqli_fetch_array($delr))
{
	echo "<option value=".$roww['result_id'].">".$roww['result_id']."</option>";
}
?>
</select>
<input type=submit name=Delete value=Delete>
</form>
<br><br><a href='facpage.php'>Return to Faculty Page</a><br><br>
<?php
if(isset($_POST['Delete']))
{
	if(!empty($_POST['del']))
	{
		$del=$_POST['del'];
	if(mysqli_query($conn,"DELETE FROM result WHERE result_id='$del'"))
	{
		$rrr=$_SESSION['rno'];
		$nnn=$_SESSION['name'];
		$ccc=$_SESSION['class'];
		date_default_timezone_set('Asia/Kolkata');
		$t = date('d-m-y h:i:s');
		if(!mysqli_query($conn,"INSERT INTO log(rno,name,class,task,remark,time) VALUES($rrr,'$nnn','$ccc','Deleted Result','$del','$t')"))
			echo "FAILED TO INS".mysqli_error($conn);
		
		echo "<b>DELETED Result $del </b>";
	}else
		echo "FAILED TO DELETED $del".mysqli_error($conn);
	}
}

if(!empty($_POST['rno']) && empty($_POST['result']))
{
	$rno=$_POST['rno'];
	$select = "SELECT * FROM studlist, test_details, result 
					WHERE result.rno=studlist.rno 
					AND result.test_id=test_details.test_id
					AND result.rno=$rno";
    $marks=0;
    $maxmarks=0;
    $percent=0;
}else{
	$select = "SELECT * FROM studlist, test_details, result 
					WHERE result.rno=studlist.rno 
					AND result.test_id=test_details.test_id";
}
if(!empty($select))
{
	$res = mysqli_query($conn,$select);
	if(!$res)
		echo "FAILED TO FETCH RESULT!!!".mysqli_error($conn);
	echo "<form method=POST action='resdet.php'>";
	echo "<table border=1 cellpadding=5px align=center><tr align=center><th>Result_id</th><th>Roll_no</th><th>Name</th><th>Subject_id</th><th>Subject</th><th>Marks</th><th>Max_marks</th><th>Right_Ans</th><th>Wrong_ans</th><th>Not_Ans</th><th>Plus(+)</th><th>Minus(-)</th><th>NA(-)</th><th>Timestamp</th></tr>";
	while($arr=mysqli_fetch_array($res))
	{
		echo "<tr align=center><td><input type=submit name=result value=".$arr['result_id']."></td>
														<td>".$arr['rno']."</td>
														<td>".$arr['name']."</td>
														<td>".$arr['test_id']."</td>
														<td>".$arr['subject']."</td>
														<td>".$arr['marks']."</td>
														<td>".$arr['max_marks']."</td>
														<td>".$arr['right_ans']."</td>
														<td>".$arr['wrong_ans']."</td>
														<td>".$arr['not_ans']."</td>
														<td>".$arr['plus']."</td>
														<td>".$arr['minus']."</td>
														<td>".$arr['na']."</td>
														<td>".$arr['timestamp']."</td></tr>"
														;
        if(isset($rno))
        {
            $marks = $marks + $arr['marks'];
            $maxmarks = $maxmarks + $arr['max_marks'];
        }
	}
    if(isset($rno))
    {
        $percent = round(($marks/$maxmarks)*100,2);
        echo "<tr align=center><th colspan=5>Total Marks</th><th>$marks</th><th>$maxmarks</th><th colspan=7>Percentage = $percent%</th></tr>";
    }
	echo "</table>";
}
?>
</form>
</html>