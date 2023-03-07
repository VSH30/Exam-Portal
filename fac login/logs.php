<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Logs</title>

</head>
<body>
<h1 align=center>Activity Logs</h1>
<br><br><a href='facpage.php'>Return to Faculty Page</a><br><br>
<table border=1 cellpadding=5 align=center>
<tr align=center><th>Sr No.</th><th>Rno</th><th>Name</th><th>Class</th><th>Task</th><th>Remark</th><th>Time</th></tr>
<?php
$conn = mysqli_connect("sql208.hyperphp.com","hp_32984812","2f3fccd3b1d","hp_32984812_mcqtest");
if(!$conn)
    die("FAILED TO CONNECT".mysqli_connect_error($conn));

$q = "SELECT * FROM log ORDER BY no DESC;";
$r = mysqli_query($conn,$q);

if(!$r)
    die("FAILED TO GET LOGS".mysqli_error($conn));

while($arr=mysqli_fetch_array($r))
{
    echo "<tr align=center>
            <td>".$arr['no']."</td>
            <td>".$arr['rno']."</td>
            <td>".$arr['name']."</td>
            <td>".$arr['class']."</td>
            <td>".$arr['task']."</td>
            <td>".$arr['remark']."</td>
            <td>".$arr['time']."</td>
        </tr>";
}
?>
</table>
<br><br><a href='facpage.php'>Return to Faculty Page</a><br><br>
</body>
</html>