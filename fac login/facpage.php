<?php session_start();
date_default_timezone_set('Asia/Kolkata');
?>
<html>
<head>
    <style>
        th{
            font-size:50px;
        }
        td{
            font-size:30px;
        }
    </style>
</head>
<body>
<table border=2 cellpadding=30px align=center>
<tr align=center><th colspan=6>FACULTY PAGE</th></tr>
	<tr align=center>
		<td><a href="uploadtest.php">Upload Test</a></td>
        <td><a href="results.php">Results</a></td>
		<td><a href="adddeluser.php">Add/Delete User</a></td>
    </tr>
    <tr align=center>
		<td><a href="deletetest.php">Delete Test</a></td>
        <td><a href="edittest.php">Edit Test</a></td>
        <td><a href="logs.php">Actvity Logs</a></td>
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
    if($_SESSION['class']!="Admin")
    {
    	if(!mysqli_query($conn,"INSERT INTO log(rno,name,class,task,remark,time) VALUES($rrr,'$nnn','$ccc','Faculty Logout','-','$t')"))
	    	echo "FAILED TO INS".mysqli_error($conn);
    }
    session_destroy();
	header('LOCATION:../Loginpage.php');
}
?>
