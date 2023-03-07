<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$conn = mysqli_connect("sql208.hyperphp.com","hp_32984812","2f3fccd3b1d","hp_32984812_mcqtest");
if(!$conn)
	die("FAILED TO CONNECT".mysqli_connect_error($conn));

?>

<html>
<form method=POST action=#>
<?php
if(!isset($_POST['next']) && !isset($_POST['submit']))
{
	echo 
"<a href='facpage.php'>Return to Faculty Page</a><br><br>

Select Subject : <select name=sub>
<option value=dm>Digital Marketing</option>
<option value=ds>Data Structutre</option>
<option value=se>Software Engineering</option>
<option value=php>PHP</option>
<option value=bd>BigData</option>
</select> 

Select Test Number : <select name=no>
<option value=01>01</option>
<option value=02>02</option>
<option value=03>03</option>
<option value=04>04</option>
<option value=05>05</option>
</select><br>

Number of Questions(MCQ) :<select name=noq>";

for($i=1;$i<=20;$i++)
{
	echo "<option value=$i>$i</option>";
}
echo "</select><br><br><b>Marks Distribution:<br>
Plus Marks(Right Ans) : <input type=number name=plus><br> Minus Marks(Wrong Answer) : <input type=number name=minus><br> Not Answered(NA) : <input type=number name=na><br><br>
Enter Time(minutes) : <input type=number name=time><br><br>
<input type=submit name=next value=next><br><br><br>";
}
//////////////////////////////

/////////////////////////////
if(isset($_POST['next']))
{
	$subjects = array('dm'=>"Digital Marketing", 'ds'=>"Data Structure", 'se'=>"Software Engineering", 'php'=>"PHP", 'bd'=>"Big Data");
	$sub = $_POST['sub']; $no = $_POST['no']; $tb = $sub.$no;
	$_SESSION['tb'] = $tb;
	$_SESSION['noq'] = $_POST['noq'];
	$noq = $_POST['noq'];
	$subject = $subjects[$_POST['sub']];
	$plus = $_POST['plus'];
	$minus = $_POST['minus'];
	$na = $_POST['na'];
	$time= $_POST['time'];
	$rrr=$_SESSION['rno'];
	$nnn=$_SESSION['name'];
	$ccc=$_SESSION['class'];
	echo "Subject = ".$subject;
	echo "<br>Test id = ".$tb;
	echo "<br>Number of Questions = ".$_POST['noq'];
	$t=date('d-m-y h:i:s');
	$create = "CREATE TABLE $tb(Qno INT(2) PRIMARY KEY,Question VARCHAR(150),A VARCHAR(100),B VARCHAR(100),C VARCHAR(100),D VARCHAR(100),Ans INT(3));";
	$create .= "INSERT INTO test_details VALUES('$tb',$rrr,'$sub','$subject',$noq,$time,$plus,$minus,$na);";
	$create .= "INSERT INTO log(rno,name,class,task,remark,time) VALUES($rrr,'$nnn','$ccc','Upload Test','$tb','$t');";
	if(mysqli_multi_query($conn,$create))
		echo "<br>TABLE CREATED<br>";
	else
		die(mysqli_error($conn));
	for($i=0,$j=0;$i<$_POST['noq'];$i++,$j=$j+4)
	{
		echo "<hr></hr>";
		echo "<br><br><b>Enter Question ".($i+1)." : </b><textarea cols=100 rows=2 name='q[]'></textarea>";
		echo "<br><b>Option 1 : </b><input type=text name='a[]' size=100>";
		echo "<br><b>Option 2 : </b><input type=text name='b[]' size=100>";
		echo "<br><b>Option 3 : </b><input type=text name='c[]' size=100>";
		echo "<br><b>Option 4 : </b><input type=text name='d[]' size=100>";
		echo "<br><b>Solution : </b><select name='sol[$i]'>
																<option value=$j>Option 1</option>
																<option value=".($j+1).">Option 2</option>
																<option value=".($j+2).">Option 3</option>
																<option value=".($j+3).">Option 4</option>
																</select>";
	}
	echo "<br><br>
	<h2><font color=Red>PLEASE CHECK IF YOU HAVE GIVEN SOLUTIONS FOR ALL QUESTIONS</font></h2>
	<br><br><input type=submit name=submit value='Upload Test' style='height:50px; width:100px'>";
}

if(isset($_POST['submit']))
{
	$ques = $_POST['q'];
	$opA = $_POST['a'];
	$opB = $_POST['b'];
	$opC = $_POST['c'];
	$opD = $_POST['d'];
	$sol = $_POST['sol'];
	$tb = $_SESSION['tb'];
	for($i=0;$i<count($ques);$i++)
	{
		$qins = "INSERT INTO $tb VALUES(".($i+1).",'$ques[$i]','$opA[$i]','$opB[$i]','$opC[$i]','$opD[$i]',$sol[$i])";
		if(mysqli_query($conn,$qins))
		{
			echo "<br>Question ".($i+1)." inserted";
		}else{
			echo "FAILED TO INS!!!<br><b>Error = ".mysqli_error($conn)."</b>";
		}
	}
}
?>
</form>
<a href='facpage.php'>Return to Faculty Page</a>
</html>