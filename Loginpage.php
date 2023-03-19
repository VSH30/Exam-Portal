<html>
<body>
<h1 align=center>LOGIN PAGE</h1>
<form method=POST action=# align=center>
Enter Roll No. : <input type=number name=rno value=""><br>
Enter Password : <input type=password name=pass><br><br>

User Type : <select name=usertype>
<option value=1>Student</option>
<option value="Faculty">Faculty</option>
</select>
<input type=submit name=login value=login>
<input type=reset name=reset value=reset>
</form>
</body>
</html>

<?php
include('function.php');
$fun = new required;
$conn = $fun->conn();

if(isset($_POST['login']))
{
	if(!empty($_POST['rno']) && !empty($_POST['pass']))
	{
		$q = "SELECT * FROM studlist WHERE rno=".$_POST['rno']	;
		$r = $fun->query($q);
		if(!$r)
			echo "WRONG USERNAME";

		$user = new User(mysqli_fetch_array($r));
		$_SESSION['stud'] = $user;
		if($user->getpass()==$_POST['pass'] && ($user->class==$_POST['usertype'] || $user->class=="Admin")  && $_POST['usertype']=="Faculty")
		{
            if($user->class!="Admin")
            {
				$r=$fun->enterlog($user->rno,$user->name,$user->class,"Faculty Login");
			    if(!$r)
			    	echo "FAILED TO INS".mysqli_error($conn);
            }
            header('LOCATION:fac login/facpage.php');
        }elseif($user->getpass() == $_POST['pass'] && $_POST['usertype']!="Faculty"){

            if($ccc!="Admin")
            {
				$r = $fun->enterlog($user->rno,$user->name,$user->class,"Student Login");
			    if(!$r)
			    	echo "FAILED TO INS".mysqli_error($conn);
            }
            header('LOCATION:stud login/studpage.php');
        }elseif($user->getpass() == $_POST['pass']){
			echo "WRONG USER TYPE";
		}else{
			echo "WRONG PASSWORD!!!";
		}
	}else{
		echo "ALL FIELDS MANDATORY!!!";
	}
}
?>
