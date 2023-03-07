<html>
	<head>
		<title>ADMIN Page</title>
        <style>
            .pad{
                padding:1%;
                font-size: 40px;
            }
            input,button{
                font-size:40px;
            }
        </style>
	</head>
<body>
    <div class=pad>
    <h1 align=center>ADMIN LOGIN</h1>
	<form align=center method=POST action=#>
		Enter ID:<input type=text name="na"><br>
		Enter Password:<input type=password name="p"><br><br>
		<input type=submit value=submit name=submit>
		<input type=reset value=clear name=reset>
	</form>
    </div>
</body>
</html>
<?php
if(isset($_POST['na']))
$id = $_POST['na'];
if(isset($_POST['p']))
$pass = $_POST['p'];

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

        $sql = "SELECT * FROM login_data WHERE login_data.type='ADMIN';";
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
            $lsql="INSERT INTO logs VALUES('$id','$nnn','ADMIN LOGIN','$date')";
            $lr=mysqli_query($conn,$lsql);
			echo "<h1 align=center>ADMIN PAGE<br>Logged in as $names[$pos]<h1>";
			echo "<br><br><h1 align=center><a href='/ADMIN/userlist.php'>USER LIST</a><br><a href='/ADMIN/passreset.php'>PASS REQUESTS</a><br><a href='/ADMIN/logs.php'>LOGS</a></h1><br>";
		}else{
			echo "<h1 align=center><font color=Red>INVALID ID or PASSWORD!!!</font></h1>";
		}
	}else{
		echo "<body align=center><font color=Red size=30px align=cente><b>Enter all details!!!</b></font></body>";
	}
}
?>

