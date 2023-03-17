<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$conn = mysqli_connect("");
if(!$conn)
	die("FAILED TO CONNECT".mysqli_connect_error($conn));

//QPAPER FETCH WITH TEST ID
//a
$resultdet=$_POST['result'];
$rquery = "SELECT * FROM studlist,result,test_details WHERE test_details.by_rno=studlist.rno AND result.test_id=test_details.test_id AND result_id='$resultdet';";
$resres=mysqli_query($conn,$rquery);
if(!$resres)
    die("FAILED TO GET RES".mysqli_error($conn));
$resarr=mysqli_fetch_array($resres);

$post=$resarr['answer'];
$post=explode(",",$post);
/*$flag=0;
foreach($post as $a)
{
    if($a!=99)
        $flag=1;
}
if(!$flag)
    echo "<h1 align=center><font color=Red>RESULT MIGHT BE WRONG<br>This page was created after you submitted the test. SORRY!!!</font></h1>";*/
    //print_r($post);
//a
$test = $resarr['test_id'];
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
//$tdselect="SELECT * FROM test_details WHERE test_id = '$test'";
//$tdres=mysqli_query($conn,$tdselect);

//if(!$tdres)
//	die("FAILED TO GET TEST DETAILS!!!".mysqli_error($conn));

//$arr=mysqli_fetch_array($tdres);
$_SESSION['time'] = $resarr['time_minutes'];
$time = $_SESSION['time'];

$arrar=array();
//---------------------------------------//
//print_r($resarr);
echo "<h1 align=center>$test MCQs</h1>";
echo "<table align=center border=2 cellpadding=5px style='width:70%'>";
echo "<tr align=center><th style='width:30%'>Result_ID</th><th>".$resarr['result_id']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Roll_No</th><th>".$_SESSION['rno']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Name</th><th>".$_SESSION['name']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Subject</th><th>".$resarr['subject']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Instructor</th><th>".$resarr['name']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Test_ID</th><th>".$resarr['test_id']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Number of Questions</th><th>".$resarr['questions']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Time</th><th>".$resarr['timestamp']."</th></tr>";
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
	if($post[$i-1]==99)
		echo "<font color=Blue><b>(Not Attempted)</b></font>";
	if(!($post[$i-1]==99))
	{
        $arrar[$i]=$post[$i-1]; //answer array

		disrow($post[$i-1],$row['A'],$j,$row['Ans']);
		disrow($post[$i-1],$row['B'],($j+1),$row['Ans']);
		disrow($post[$i-1],$row['C'],($j+2),$row['Ans']);
		disrow($post[$i-1],$row['D'],($j+3),$row['Ans']);
	}else{
        $arrar[$i]=99; //answer array na

		echo "<br>".$row['A']; //j=0
		echo "<br>".$row['B']; //j=+1
		echo "<br>".$row['C']; //j=+2
		echo "<br>".$row['D']."</td>"; //j=+3
	}

	if(!($post[$i-1]==99))
	{
		if($post[$i-1]==$row['Ans'])
		{
			$ra++;
			echo "<td rowspan=2><font color=Green size=10px><b>".$resarr['plus']."</b></font></td></tr>";
		}else{
			$wa++;
			echo "<td rowspan=2><font color=Red size=10px><b>-".$resarr['minus']."</b></font></td></tr>";
		}
	}else{
		$na++;
		echo "<td rowspan=2><b><font size=10px>".$resarr['na']."</font></b></td></tr>";
	}
	echo "<tr><td><b>Solution : <font color=Purple>".$opt[$row['Ans']]."</font></b></tr>";
	//echo "<tr align=center><td colspan=3>-</td></tr>";
}
$marks = (($ra*$resarr['plus'])-($wa*$resarr['minus'])-($na*$resarr['na']));
$max = ($resarr['plus']*$resarr['questions']);
echo "<tr align=center><td colspan=3><b><font size=10px>Total Marks = $marks/$max</font></b></td></tr></table>";
echo "<a href='studpage.php'>Return to Student Page</a>";
?>
