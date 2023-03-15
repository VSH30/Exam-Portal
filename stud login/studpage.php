<?php session_start();
date_default_timezone_set('Asia/Kolkata');?>
<html>
<body>
<table border=2 cellpadding=15px align=center>
	<tr align=center>
		<th colspan=3>Student Page</th>
	</tr>
	<tr align=center>
		<td><a href="givetest.php">Give Test</a></td>
		<td><a href="myresult.php">My Result</a></td>
		<td><a href="chngpass.php">Change Password</a></td>
	</tr>
</table>
<form method=POST action=#>
<input type=submit name=Logout value=Logout>
</form>
</body>
</html>
<?php
if(isset($_POST['Logout']))
{
	$conn = mysqli_connect("");
	if(!$conn)
	die("FAILED TO CONNECT".mysqli_connect_error($conn));
	$rrr=$_SESSION['rno'];
	$nnn=$_SESSION['name'];
	$ccc=$_SESSION['class'];
	$t = date('d-m-y h:i:s');
	if(!mysqli_query($conn,"INSERT INTO log(rno,name,class,task,remark,time) VALUES($rrr,'$nnn','$ccc','Student Logout','-','$t')"))
		echo "FAILED TO INS".mysqli_error($conn);
	session_destroy();
	header('LOCATION:../Loginpage.php');
}
?>
