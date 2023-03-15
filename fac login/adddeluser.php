<?php session_start();
date_default_timezone_set('Asia/Kolkata');
?>
<html>
<a href='facpage.php'>Return to Faculty Page</a>
<form method=POST action=#>
<h3><font color=Red>[NOTE: IF YOU WANT TO DELETE AN USER THEN JUST TYPE THE ROLL_NO OF THE USER]</font></h3>
Roll No : <input type=number name=rno><br>
Enter Name : <input type=text name=name><br>
Class :<select name=class><option value="SYBBA(CA)">SYBBA(CA)</option><option value="TYBBA(CA)">TYBBA(CA)</option><option value=Faculty>Faculty</option></select><br>
Enter Password : <input type=password name=pass><br>
<br>
<input type=submit value=Insert name=Insert>
<input type=submit value=Delete name=Delete>
<input type=reset value=reset name=reset>
</form>
</html>
<?php
echo "LOGGED IN AS ".$_SESSION['name']."<br>";
$conn = mysqli_connect("");
if(!$conn)
	die("FAILED TO CONNECT!!!".mysqli_connect_error($conn));
$rrr=$_SESSION['rno'];
$nnn=$_SESSION['name'];
$ccc=$_SESSION['class'];
if(isset($_POST['Insert']))
{
	$n = strval($_POST['name']);
	$r = intval($_POST['rno']);
	$c = strval($_POST['class']);
	$pass = $_POST['pass'];
	
	$insert="INSERT INTO studlist VALUES($r,'$n','$c','$pass');";
	if(mysqli_query($conn,$insert))
	{
		echo "<br>INSERTED User $n";
		$t = date('d-m-y h:i:s');
		if(!mysqli_query($conn,"INSERT INTO log(rno,name,class,task,remark,time) VALUES($rrr,'$nnn','$ccc','Added User $n','Rno = $r','$t')"))
			echo "FAILED TO INS".mysqli_error($conn);
	}
	 else
		echo "failed to insert".mysqli_error($conn);
}
if(isset($_POST['Delete']))
{
	$r = intval($_POST['rno']);
    $resss=mysqli_query($conn,"SELECT class FROM studlist WHERE rno=$r");
    $arrr=mysqli_fetch_array($resss);
    if($arrr['class']!="Admin")
    {
        $delq = "DELETE FROM studlist WHERE rno=$r";
    	if(mysqli_query($conn,$delq))
	    {
		    echo "DELETED USER WITH ROLL_NO $r";
		    $t = date('d-m-y h:i:s');
		    if(!mysqli_query($conn,"INSERT INTO log(rno,name,class,task,remark,time) VALUES($rrr,'$nnn','$ccc','Deleted User','Rno = $r','$t')"))
			    echo "FAILED TO INS".mysqli_error($conn);
    	}
    	else
	    	echo "FAILED TO DELETE USER!!!<br>(MAKE SURE THAT YOU HAVE ENTERED RIGHT ROLL_NO)".mysqli_error($conn);
    }else{
        echo "<br>CANNOT DELETE AN ADMIN!!";
    }
}
echo "<br><a href='facpage.php'>Return to Faculty Page</a>";
	$h="SELECT * FROM studlist";
	$result=mysqli_query($conn,$h);
	if(!$result){
		die("Failed to fetch".mysqli_error($conn));
	}
	echo "<table border='2' cellspacing ='0' cellpadding ='5px'>";
	echo "<tr><th>Roll_No</th><th>Name</th><th>Class</th>";
    //echo "<th>Password</th>";
    echo "</tr>";
	while($y=mysqli_fetch_array($result)){
		echo "<tr align=center>";
		echo "<td>".$y['rno']."</td>";
		echo "<td>".$y['name']."</td>";
		echo "<td>".$y['class']."</td>";
		//echo "<td>".$y['pass']."</td>";
		echo "</tr>";
	}
	echo "</table>";
?>
