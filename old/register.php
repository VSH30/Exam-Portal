<?php
if(isset($_POST['submit']))
{
	if(empty($_POST['name']) || empty($_POST['uid']) || empty($_POST['pass1']) || empty($_POST['pass2']))
	{
		echo "ALL FIELDS are MANDATORY!!!";
	}else if(($_POST['pass1']) != ($_POST['pass2'])){
		echo "Passwords do not match!!!";
	}else{
		$name=$_POST['name'];
		$uid=$_POST['uid'];
		$pass=$_POST['pass1'];
		
		$conn = mysqli_connect("sql208.hyperphp.com","hp_32984812","2f3fccd3b1d","hp_32984812_maindb");
		if (!$conn) {
			die("Connection failed");
		}
        
		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-y h:i:s');
        $ddd=$date;
		$sql="INSERT INTO login_data VALUES('$name','$uid','$pass','$ddd','USER')";
		$result=mysqli_query($conn,$sql);
		if(!$result)
		{
			die("Unable to Register!!!");
		}else{
			echo "<h1 align=center>Your account has been registered<br><br><a href='userlogin.html'>click here to login</a></h1>";

            $lsql="INSERT INTO logs VALUES('$uid','$name','REGISTER','$ddd')";
            $re=mysqli_query($conn,$lsql);
		}
		
	}
}
?>