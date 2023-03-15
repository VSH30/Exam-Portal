<?php session_start(); date_default_timezone_set('Asia/Kolkata');?>
<html>
<form method=POST action=#>
Enter Current Password : <input type=password name=pass><br><br>
Enter New password : <input type=password name=npass><br>
Confirm New password : <input type=password name=cnpass><br>
<input type=submit name=submit value=submit>
<input type=reset name=reset value=reset>
</form>

<?php
if(isset($_POST['submit']))
{
	$conn = mysqli_connect("");
	if(!$conn)
		die("FAILED TO CONNECT".mysqli_connect_error($conn));
	$rno = $_SESSION['rno'];
	$sel = "SELECT pass FROM studlist WHERE rno=$rno";
	$res = mysqli_query($conn,$sel);
	$arr=mysqli_fetch_array($res);
	
	if($_POST['pass']==$arr['pass'])
	{
		if($_POST['npass']==$_POST['cnpass'])
		{
			$np = $_POST['cnpass'];
			$up = "UPDATE studlist
						SET pass=$np
						WHERE rno=$rno";
			if(mysqli_query($conn,$up))
			{
				echo "PASSWORD UPDATED SUCCESSFULLY!!!";
				$nnn=$_SESSION['name'];
				$ccc=$_SESSION['class'];
				$t= date('d-m-y h:i:s');
				if(!mysqli_query($conn,"INSERT INTO log(rno,name,class,task,remark,time) VALUES($rno,'$nnn','$ccc','Pass Change','-','$t')"))
				echo "FAILED TO INS".mysqli_error($conn);
			}else
				echo "FAILED TO UPDATE PASSWORD!!!";
		}else{
			echo "NEW PASSWORD AND CONFIRMATION PASSWORD DO NOT MATCH!!!";
		}
	}else{
		echo "WRONG CURRENT PASSWORD!!!";
	}
}

?>
<a href="studpage.php">Return to Student Page</a>
</html>
