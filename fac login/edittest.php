<?php session_start(); date_default_timezone_set('Asia/Kolkata');
$conn = mysqli_connect("sql208.hyperphp.com","hp_32984812","2f3fccd3b1d","hp_32984812_mcqtest");
if(!$conn)
	die(mysqli_connect_error($conn));
?>
<html>
<body>
<br><br><a href='facpage.php'>Return to Faculty Page</a><br><br>
<form method=POST action=#>
Select test to Edit : <select name=test>
<option value=""></option>
<?php 
$rno=$_SESSION['rno'];
if($_SESSION['class']=="Faculty")
    $q="SELECT * FROM test_details WHERE by_rno=$rno";
elseif($_SESSION['class']=="Admin")
    $q="SELECT * FROM test_details;";
$r=mysqli_query($conn,$q);
if(!$r)
    die("FAILED TO GET TEST DETAILS!!!<br>".mysqli_error($conn));
while($arr=mysqli_fetch_array($r))
{
    echo "<option value=".$arr['test_id'].">".$arr['test_id']."</option>";
}
echo "</select>
<input type=submit name=select value=select>";
///////////////////////////////////////////
    
    $x=mysqli_query($conn,$q);
    echo "<table border=2 cellpadding=5px align=center>";
    echo "<tr align=center><th colspan=9>TEST DETAILS</th></tr>";
    echo "<tr align=center><th>Test ID</th><th>By rno</th><th>Sub</th><th>Subject</th><th>No of Ques</th><th>Time(minutes)</th><th>PlusMarks</th><th>MinusMarks</th><th>NA Marks(minus)               </th></tr>";
    while($a=mysqli_fetch_array($x))
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

/////////////////////////////////////////
if(isset($_POST['select']))
{
    if(!empty($_POST['test']))
    {
        $_SESSION['test']=$_POST['test'];
        header('LOCATION:testeditpage.php');
    }else{
        echo "PLEASE SELECT A TEST ID TO EDIT!!!";
    }
}
?>

</form>
</body>
</html><?php session_start(); date_default_timezone_set('Asia/Kolkata');
$conn=mysqli_connect("sql109.epizy.com","epiz_33155826","VM2uvdozzLq","epiz_33155826_mcqtest");
if(!$conn)
	die(mysqli_connect_error($conn));
?>
<html>
<body>
<br><br><a href='facpage.php'>Return to Faculty Page</a><br><br>
<form method=POST action=#>
Select test to Edit : <select name=test>
<option value=""></option>
<?php 
$rno=$_SESSION['rno'];
if($_SESSION['class']=="Faculty")
    $q="SELECT * FROM test_details WHERE by_rno=$rno";
elseif($_SESSION['class']=="Admin")
    $q="SELECT * FROM test_details;";
$r=mysqli_query($conn,$q);
if(!$r)
    die("FAILED TO GET TEST DETAILS!!!<br>".mysqli_error($conn));
while($arr=mysqli_fetch_array($r))
{
    echo "<option value=".$arr['test_id'].">".$arr['test_id']."</option>";
}
echo "</select>
<input type=submit name=select value=select>";
///////////////////////////////////////////
    
    $x=mysqli_query($conn,$q);
    echo "<table border=2 cellpadding=5px align=center>";
    echo "<tr align=center><th colspan=9>TEST DETAILS</th></tr>";
    echo "<tr align=center><th>Test ID</th><th>By rno</th><th>Sub</th><th>Subject</th><th>No of Ques</th><th>Time(minutes)</th><th>PlusMarks</th><th>MinusMarks</th><th>NA Marks(minus)               </th></tr>";
    while($a=mysqli_fetch_array($x))
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

/////////////////////////////////////////
if(isset($_POST['select']))
{
    if(!empty($_POST['test']))
    {
        $_SESSION['test']=$_POST['test'];
        header('LOCATION:testeditpage.php');
    }else{
        echo "PLEASE SELECT A TEST ID TO EDIT!!!";
    }
}
?>

</form>
</body>
</html><?php session_start(); date_default_timezone_set('Asia/Kolkata');
$conn=mysqli_connect("sql109.epizy.com","epiz_33155826","VM2uvdozzLq","epiz_33155826_mcqtest");
if(!$conn)
	die(mysqli_connect_error($conn));
?>
<html>
<body>
<br><br><a href='facpage.php'>Return to Faculty Page</a><br><br>
<form method=POST action=#>
Select test to Edit : <select name=test>
<option value=""></option>
<?php 
$rno=$_SESSION['rno'];
if($_SESSION['class']=="Faculty")
    $q="SELECT * FROM test_details WHERE by_rno=$rno";
elseif($_SESSION['class']=="Admin")
    $q="SELECT * FROM test_details;";
$r=mysqli_query($conn,$q);
if(!$r)
    die("FAILED TO GET TEST DETAILS!!!<br>".mysqli_error($conn));
while($arr=mysqli_fetch_array($r))
{
    echo "<option value=".$arr['test_id'].">".$arr['test_id']."</option>";
}
echo "</select>
<input type=submit name=select value=select>";
///////////////////////////////////////////
    
    $x=mysqli_query($conn,$q);
    echo "<table border=2 cellpadding=5px align=center>";
    echo "<tr align=center><th colspan=9>TEST DETAILS</th></tr>";
    echo "<tr align=center><th>Test ID</th><th>By rno</th><th>Sub</th><th>Subject</th><th>No of Ques</th><th>Time(minutes)</th><th>PlusMarks</th><th>MinusMarks</th><th>NA Marks(minus)               </th></tr>";
    while($a=mysqli_fetch_array($x))
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

/////////////////////////////////////////
if(isset($_POST['select']))
{
    if(!empty($_POST['test']))
    {
        $_SESSION['test']=$_POST['test'];
        header('LOCATION:testeditpage.php');
    }else{
        echo "PLEASE SELECT A TEST ID TO EDIT!!!";
    }
}
?>

</form>
</body>
</html>