<html>
<body>
<h1 align=center><span>LOGIN PAGE</span></h1>
<form method=POST action=# align=center>
Enter Roll No. : <input type=number name=rno value="<?php echo $_POST['rno'];?>"><br>
Enter Password : <input type=password name=pass "<?php echo $_POST['pass'];?>"><br><br>

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
session_start();
date_default_timezone_set('Asia/Kolkata');
$conn = mysqli_connect("");
if(!$conn)
	die("FAILED TO CONNECT".mysqli_connect_error($conn));

if(isset($_POST['login']))
{
	if(!empty($_POST['rno']) && !empty($_POST['pass']))
	{
		$q = "SELECT * FROM studlist WHERE rno=".$_POST['rno']	;
		$r=mysqli_query($conn,$q);
		if(!$r)
			echo "WRONG USERNAME";
		$arr=mysqli_fetch_array($r);
		if($arr['pass']==$_POST['pass'] && ($arr['class']==$_POST['usertype'] || $arr['class']=="Admin")  && $_POST['usertype']=="Faculty")
		{
			$rrr=$_SESSION['rno'] = $_POST['rno'];
			$nnn=$_SESSION['name'] = $arr['name'];
			$ccc=$_SESSION['class'] = $arr['class'];
			$t = date('d-m-y h:i:s');
            if($ccc!="Admin")
            {
			    if(!mysqli_query($conn,"INSERT INTO log(rno,name,class,task,remark,time) VALUES($rrr,'$nnn','$ccc','Faculty Login','-','$t')"))
			    	echo "FAILED TO INS".mysqli_error($conn);
            }
            header('LOCATION:fac login/facpage.php');
        }elseif($arr['pass'] == $_POST['pass'] && $_POST['usertype']!="Faculty"){
			$rrr=$_SESSION['rno'] = $_POST['rno'];
			$nnn=$_SESSION['name'] = $arr['name'];
			$ccc=$_SESSION['class'] = $arr['class'];
			$t = date('d-m-y h:i:s');
            if($ccc!="Admin")
            {
			    if(!mysqli_query($conn,"INSERT INTO log(rno,name,class,task,remark,time) VALUES($rrr,'$nnn','$ccc','Student Login','-','$t')"))
			    	echo "FAILED TO INS".mysqli_error($conn);
            }
            header('LOCATION:stud login/studpage.php');
        }elseif($arr['pass']==$_POST['pass']){
			echo "WRONG USER TYPE";
		}else{
			echo "WRONG PASSWORD!!!";
		}
	}else{
		echo "ALL FIELDS MANDATORY!!!";
	}
}
?>
