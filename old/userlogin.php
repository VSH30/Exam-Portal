<?php
session_start();

if(isset($_POST['na']))
$id = $_POST['na'];
if(isset($_POST['p']))
$pass = $_POST['p'];
$l="/SLIPS/slipss.php";

if(isset($_POST['submit']))
{
	if( (!empty($id)) && (!empty($pass)) )
	{
        $servername = "sql208.hyperphp.com";
        $username = "hp_32984812";
        $password = "2f3fccd3b1d";
        $db="hp_32984812_maindb";

        $conn = mysqli_connect($servername, $username, $password,$db);

        if (!$conn) {
            die("Connection failed");
        }

        $sql = "SELECT * FROM login_data;";
        $r = mysqli_query($conn,$sql);

        for($x=0;($roo=mysqli_fetch_array($r));$x++)
        {
            $ids[$x]=$roo['userid'];
            $passes[$x]=$roo['password'];
            $names[$x]=$roo['name'];
        }
        //-------------------//
        $pos=99;
		for($i=0;$i<(count($ids));$i++)
		{
			if($id == $ids[$i])
			{
				$pos=$i;
			}
		}
		
		if(($pos!=99) && ($id=$ids[$pos]) && ($pass == $passes[$pos]))
		{
            date_default_timezone_set('Asia/Kolkata');
            $date = date('d-m-y h:i:s');
            $nnn=$names[$pos];

            $_SESSION["user"] = $id;
            $_SESSION["name"] = $nnn;

            $lsql="INSERT INTO logs VALUES('$id','$nnn','LOGIN','$date')";
            $result=mysqli_query($conn,$lsql);
			echo "<h1 align=center>Logged in as $names[$pos]<h1>";
            echo "<body style='padding:15%'><table align=center><tr><th style='border:2px solid black; border-radius: 10px;padding:20px;'><a href=$l><font size=100%>PHP SLIPS</font></a></th><th style='border:2px solid black; border-radius: 10px;padding:20px;'><a href='DS.php'><font size=100%>Data Structure</font></a></th></tr></table></body>";
		}else{
            header("Location: userlogin.html");
			die("<h1 align=center><font color=Red>INVALID ID or PASSWORD!!!</font></h1>");
		}
	}else{
		echo "<body align=center><font color=Red size=30px align=cente><b>Enter all details!!!</b></font></body>";
	}
}
?>