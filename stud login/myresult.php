<?php session_start();
date_default_timezone_set('Asia/Kolkata');?>
<html>
<body>
<form method=POST action='resdet.php'>
<a href="studpage.php">Return to Student Page</a>
<h1 align=center><font style="border-bottom:double 5px;">My Result</font></h1>
<table border=2 cellpadding=5px align=center>
<?php
$n=$_SESSION['name'];
$r=$_SESSION['rno'];
$c=$_SESSION['class'];
$marks=0;
$percent=0;
$maxmarks=0;
echo "<tr align=center><th colspan=3>Name :</th><td colspan=9>$n</td></tr>";
echo "<tr align=center><th colspan=3>Roll_No :</th><td colspan=9>$r</td></tr>";
echo "<tr align=center><th colspan=3>Class :</th><td colspan=9>$c</td></tr>";
echo "<tr align=center><th colspan=12><font style='border-bottom:double 3px;'>TEST RESULTS</font></th></tr>";

$conn = mysqli_connect();
if(!$conn)
	die("FAILED TO CONNECT".mysqli_connect_error($conn));

$select = "SELECT * FROM studlist, test_details, result 
					WHERE result.rno=studlist.rno 
					AND result.test_id=test_details.test_id
					AND result.rno=$r";

$res = mysqli_query($conn,$select);

if(!$res)
	echo "FAILED TO FETCH RESULT!!!".mysqli_error($conn);
else
{
	echo "<tr align=center><th>Result_id</th><th>Subject_id</th><th>Subject</th><th>Marks</th><th>Max_marks</th><th>Right_Ans</th><th>Wrong_ans</th><th>Not_Ans</th><th>Plus(+)</th><th>Minus(-)</th><th>NA(-)</th><th>Timestamp</th></tr>";
	while($arr=mysqli_fetch_array($res))
	{
		echo "<tr align=center><td><input type=submit name=result value=".$arr['result_id']."></td>
														<td>".$arr['test_id']."</td>
														<td>".$arr['subject']."</td>
														<td>".$arr['marks']."</td>
														<td>".$arr['max_marks']."</td>
														<td><font color=Green>".$arr['right_ans']."</font></td>
														<td><font color=Red>".$arr['wrong_ans']."</font></td>
														<td><font color=Blue>".$arr['not_ans']."</font></td>
														<td>".$arr['plus']."</td>
														<td>".$arr['minus']."</td>
														<td>".$arr['na']."</td>
														<td>".$arr['timestamp']."</td></tr>"
														;
        $marks = $marks + $arr['marks'];
        $maxmarks = $maxmarks + $arr['max_marks'];
	}
    $percent = round(($marks/$maxmarks)*100,2);
    if($percent<=40){
        $color="Red";
    }elseif(40<$percent && $percent<=70){
        $color="Blue";
    }elseif(70<$percent && $percent<=100){
        $color="Green";
    }
    echo "<tr align=center><th colspan=3><font style='font-size:30px; border-bottom:double 3px;'>Total</font></th><th><font color=$color style='font-size:30px; border-bottom:double 3px;'>$marks</font></th><th><font style='font-size:30px; border-bottom:double 3px;'>$maxmarks</font></th><th colspan=7><font style='font-size:30px; border-bottom:double 3px;'>Percentage = <font color=$color>$percent%</font></font></u></th></tr>";
}
?>
</table>
<a href="studpage.php">Return to Student Page</a>
</form>
</body>
</html>
