<?php
if(isset($_POST['submit']))
{
	if(!empty($_POST['dd']) && ($_POST['dd'])==(date('l')))
	{
		if(!empty($_POST['useridd']))
			$id=$_POST['useridd'];
		
		$tconn = mysqli_connect("sql208.hyperphp.com","hp_32984812","2f3fccd3b1d","hp_32984812_maindb");
		if (!$tconn) {
			die("Connection failed");
		}

		$tsql = "SELECT * FROM login_data;";
		$tr = mysqli_query($tconn,$tsql);
		for($tx=0;($troo=mysqli_fetch_array($tr));$tx++)
		{
			$ids[$tx]=$troo['userid'];
			$names[$tx]=$troo['name'];
		}
	//-------------------//
		$pos=-1;
		for($i=0;$i<(count($ids));$i++)
		{
			if($id == $ids[$i])
			{
				$pos=$i;
			}
		}
		
		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-y h:i:s');
		
		if($pos!=-1)
		{
            $iidd="$id";
            $ddd=$date;
            $naa=$names[$pos];
			$sq= "INSERT INTO forgotpass(userid,name,time) VALUES('$iidd','$naa','$ddd')";
			$result=mysqli_query($tconn,$sq);
			
			if(!$result)
			{
				die("SORRY your request could not be processed, Please try after some time.");
			}else{
				echo "Your REQUEST has been sent to Vishal Hanchnoli, he will be contacting you in next 12hours.";
			}
		}else{
			echo "INVALID USERID!!!";
		}
	}else{
		echo "Security check has been failed!!!";
	}
}

?>