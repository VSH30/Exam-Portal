<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$conn = mysqli_connect("sql208.hyperphp.com","hp_32984812","2f3fccd3b1d","hp_32984812_mcqtest");
if(!$conn)
	die("FAILED TO CONNECT".mysqli_connect_error($conn));

//QPAPER FETCH WITH TEST ID
$test = $_SESSION['test'];
$qsel = "SELECT * FROM $test ORDER BY Qno";
$qres = mysqli_query($conn,$qsel);
if(!$qres)
	die("FAILED TO GET QUESTION PAPER!!!".mysqli_error($conn));

$ra = 0;
$wa = 0;
$na = 0;

function disrow($inp,$op,$jj,$ans)
{
		if(($jj==$inp)	&& ($jj==$ans))
		{
			echo "<br><font color=Green><b>".$op."</b></font><b> (&#10003)</b>";
		}elseif(($jj==$inp) && ($jj!=$ans)){
			echo "<br><font color=Red><b>".$op."</b></font><b> (&#10799)</b>";
		}else{
			echo "<br>".$op."";
		}
}
echo "<a href='studpage.php'>Return to Student Page</a>";
////////////////////////////////////////////////////////////////////////////
$tdselect="SELECT * FROM test_details,studlist WHERE test_details.by_rno=studlist.rno AND test_id = '$test'";
$tdres=mysqli_query($conn,$tdselect);

if(!$tdres)
	die("FAILED TO GET TEST DETAILS!!!".mysqli_error($conn));

$arr=mysqli_fetch_array($tdres);
$_SESSION['time'] = $arr['time_minutes'];
$time = $_SESSION['time'];

$arrar=array();
//---------------------------------------//
echo "<h1 align=center>$test MCQs</h1>";
echo "<table align=center border=2 cellpadding=5px style='width:70%'>";
echo "<tr align=center><th style='width:30%'>Result_ID</th><th>".$test.$_SESSION['rno']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Roll_No</th><th>".$_SESSION['rno']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Name</th><th>".$_SESSION['name']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Subject</th><th>".$arr['subject']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Instructor</th><th>".$arr['name']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Test_ID</th><th>".$arr['test_id']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Number of Questions</th><th>".$arr['questions']."</th></tr>";
echo "</table>";
///////////////////////////////////////////////////////////////////////

echo "<table align=center border=2 cellpadding=5px style='width:75%'><tr align=center><th style='width:15%'>Q No.</th><th style='width:70%'>Question</th><th style='width:15%'>Marks</th></tr>";
for($i=1,$j=0;$row=mysqli_fetch_array($qres);$i++,$j=$j+4)
{
	$opt[$j] = $row['A'];
	$opt[$j+1] = $row['B'];
	$opt[$j+2] = $row['C'];
	$opt[$j+3] = $row['D'];
	echo "<tr align=center><td rowspan=2><b>$i</b></td><td><b>".$row['Question']."</b>";
	if(!isset($_POST[$i]))
		echo "<font color=Blue><b>(Not Attempted)</b></font>";
	if(isset($_POST[$i]))
	{
        $arrar[$i]=$_POST[$i]; //answer array

		disrow($_POST[$i],$row['A'],$j,$row['Ans']);
		disrow($_POST[$i],$row['B'],($j+1),$row['Ans']);
		disrow($_POST[$i],$row['C'],($j+2),$row['Ans']);
		disrow($_POST[$i],$row['D'],($j+3),$row['Ans']);
	}else{
        $arrar[$i]=99; //answer array na

		echo "<br>".$row['A']; //j=0
		echo "<br>".$row['B']; //j=+1
		echo "<br>".$row['C']; //j=+2
		echo "<br>".$row['D']."</td>"; //j=+3
	}

	if(isset($_POST[$i]))
	{
		if($_POST[$i]==$row['Ans'])
		{
			$ra++;
			echo "<td rowspan=2><font color=Green size=10px><b>".$_SESSION['plus']."</b></font></td></tr>";
		}else{
			$wa++;
			echo "<td rowspan=2><font color=Red size=10px><b>-".$_SESSION['minus']."</b></font></td></tr>";
		}
	}else{
		$na++;
		echo "<td rowspan=2><b><font size=10px>".$_SESSION['na']."</font></b></td></tr>";
	}
	echo "<tr><td><b>Solution : <font color=Purple>".$opt[$row['Ans']]."</font></b></tr>";
	//echo "<tr align=center><td colspan=3>-</td></tr>";
}
$marks = (($ra*$_SESSION['plus'])-($wa*$_SESSION['minus'])-($na*$_SESSION['na']));
$max = ($_SESSION['plus']*$_SESSION['noq']);
echo "<tr align=center><td colspan=3><b><font size=10px>Total Marks = $marks/$max</font></b></td></tr></table>";
echo "<a href='studpage.php'>Return to Student Page</a>";
$result_id = $test.$_SESSION['rno'];
$rno = $_SESSION['rno'];
$ts=date('d-m-y h:i:s');
$name=$_SESSION['name'];
$class=$_SESSION['class'];
$arrar=implode(",",$arrar);
$insert = "INSERT INTO result VALUES('$result_id','$test',$rno,$marks,$max,$ra,$wa,$na,'$ts','$arrar');";
$insert.="INSERT INTO log(rno,name,class,task,remark,time) VALUES($rno,'$name','$class','Test Submitted','$test','$ts');";
if(mysqli_multi_query($conn,$insert))
	echo "TEST RESULT UPLOADED!!!";
else
	echo "FAILED TO UPLOAD RESULT".mysqli_error($conn);
//result_id = $test.$_SESSION['rno']
//test_id = $test
//rno = $_SESSION['rno']
//marks = $marks
//max_marks = $max
//right_ans = $ra
//wrong_ans = $wa
//not_ans = $na
?>