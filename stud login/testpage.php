<html>
<head>
<style>
.stick{
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
  background-color: white;
  border: 2px solid Black;
}
</style>
</head>
<body align=center>
<?php
session_start();////////////////////
date_default_timezone_set('Asia/Kolkata');
if(empty($_SESSION['c']))
	$_SESSION['c']=1;
else{
	$_SESSION['c']++;

	if($_SESSION['c']>1)
	{
		unset($_SESSION['c']);
		header('LOCATION:studpage.php');
	}
}
////////////////////

$conn = mysqli_connect("");
if(!$conn)
	die("FAILED TO CONNECT".mysqli_connect_error($conn));

$test = $_SESSION['test'];

$tdselect="SELECT * FROM test_details WHERE test_id = '$test'";
$tdres=mysqli_query($conn,$tdselect);

if(!$tdres)
	die("FAILED TO START TEST!!!".mysqli_error($conn));

$arr=mysqli_fetch_array($tdres);
$_SESSION['time'] = $arr['time_minutes'];
$time = $_SESSION['time'];
//---------------------------------------//
echo "<h1>$test MCQs</h1>";
echo "<table align=center border=2 cellpadding=5px style='width:70%'>";
echo "<tr align=center><th style='width:30%'>Roll_No</th><th>".$_SESSION['rno']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Name</th><th>".$_SESSION['name']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Subject</th><th>".$arr['subject']."</th></tr>";
echo "<tr align=center><th style='width:30%'>Number of Questions</th><th>".$arr['questions']."</th></tr>";
echo "<tr align=center><th colspan=2>Marks Distribution:</th></tr>";
echo "<tr align=center><th style='width:30%'>RIGHT ANS ( + )</th><th>".$arr['plus']."</th></tr>";
echo "<tr align=center><th style='width:30%'>WRONG ANS ( - )</th><th>".$arr['minus']."</th></tr>";
echo "<tr align=center><th style='width:30%'>NOT ANS ( - )</th><th>".$arr['na']."</th></tr>";
echo "</table>";

echo "<form name=exam method=POST action='testres.php' align=left>";

echo "<div class='stick'><h1 align=center>Time Left = <span id='time'>$time </span>Minutes</h1><input type=submit name=sbumit value=submit style='height:50px; width:50px align=center'></div>";

$_SESSION['noq'] = $arr['questions'];
$_SESSION['plus'] = $arr['plus'];
$_SESSION['minus'] = $arr['minus'];
$_SESSION['na'] = $arr['na'];
//-----------------------------------------//



$qsel = "SELECT * FROM $test ORDER BY Qno";
$qres = mysqli_query($conn,$qsel);
if(!$qres)
	die("FAILED TO GET QUESTION PAPER!!!".mysqli_error($conn));
for($i=1,$j=0;$row=mysqli_fetch_array($qres);$i++,$j=$j+4)
{
	echo "<hr></hr>
			<i>Question ".$row['Qno'].":</i><br>
			<b>".$row['Question']."</b><br>
			<input type=radio name=$i value=$j><b>".$row['A']."<br>
			<input type=radio name=$i value=".($j+1)."><b>".$row['B']."<br>
			<input type=radio name=$i value=".($j+2)."><b>".$row['C']."<br>
			<input type=radio name=$i value=".($j+3)."><b>".$row['D']."<br>
			<br>";
}
?>

</form>
<script>
function startTimer(duration, display) {
	var timer = duration;
	var minutes, seconds;
	var form=document.forms.exam;
	
	var t=setInterval(function() {
		
		minutes = parseInt(timer / 60, 10);
		seconds = parseInt(timer % 60, 10);
		minutes = minutes < 10 ? "0" + minutes : minutes;
		seconds = seconds < 10 ? "0" + seconds : seconds;

		display.textContent = minutes + ":" + seconds;

		if (--timer <= 0) {
			timer = duration;
			if( !isNaN( t ) )clearInterval( t );
			form.submit();
		}
	}, 1000);
}

window.onload = function() {
	var examTime = 60 * <?php echo $_SESSION['time']; ?>;
	var display = document.querySelector('#time');
	startTimer(examTime, display);
};
</script>
</body>
</html>
