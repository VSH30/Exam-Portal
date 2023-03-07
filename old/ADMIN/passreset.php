<?php
$conn = mysqli_connect("sql208.hyperphp.com","hp_32984812","2f3fccd3b1d","hp_32984812_maindb");

if (!$conn) {
die("Connection failed");
}

$sql = "SELECT * FROM forgotpass";
$r = mysqli_query($conn,$sql);

?>
<html>
<title>USERS LIST</title>
<style>
    tr,td,th{
        font-size: 25px;
        padding: 15px;
    }
</style>
</html>
<body align=center>
<h1 align=center>Password Requests</h1>
<table border=2 align=center>
<tr align=center><th>No.</th><th>Name</th><th>UserId</th><th>Time</th></tr>
<?php
for($i=1;($row=mysqli_fetch_array($r));$i++)
{
	echo "<tr align=center><td>$i</td><td>".$row['name']."</td><td>".$row['userid']."</td><td>".$row['time']."</td></tr>";
}
?>
</table>
</body>
</html>