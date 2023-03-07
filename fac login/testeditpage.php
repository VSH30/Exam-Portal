<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$conn = mysqli_connect("sql208.hyperphp.com","hp_32984812","2f3fccd3b1d","hp_32984812_mcqtest");
if(!$conn)
	die(mysqli_connect_error($conn));
?>
<html>
<body>
<form method=POST action=#>
<?php
$t = $_SESSION['test'];
$selq="SELECT * FROM $t;";
$selr=mysqli_query($conn,$selq);
if(!$selr)
    die("FAILED TO GET TEST DATA!!!");

echo "<br><b>Select Qno : </b>";
echo "<select name=qno>";
while($a=mysqli_fetch_array($selr))
{
    echo "<option value=$a[0]>$a[0]</option>";
}
echo "</select>";
echo "<br><b>Select what to EDIT : </b><select name=op>";
echo "<option value=Qno>Question Number</option>";
echo "<option value=Question>Question</option>";
echo "<option value=A>Option A</option>";
echo "<option value=B>Option B</option>";
echo "<option value=C>Option C</option>";
echo "<option value=D>Option D</option>";
echo "<option value=Ans>Answer</option>";
echo "</select>";

echo "<br><b>Enter New Data : </b><textarea name='new' rows=1 cols=70></textarea>";
echo "<br><input type=submit name=update value=update></form>";
echo "<h2 style='color:Red'>[Note: Blue color numbers are the indexe of the Options, So if you want to change and Answer then just type the index of the Right answer.]</h2>";

echo "<table border=2 align=center cellpadding=5 width=100%>";
echo "<tr align=center>
        <th width=5%>Qno</th>
        <th width=46%>Question</th>
        <th width=11%>Option A</th>
        <th width=11%>Option B</th>
        <th width=11%>Option C</th>
        <th width=11%>Option D</th>
        <th width=5%>Answer</th>
    </tr>";
$sel2r=mysqli_query($conn,$selq);
$j=0;
while($x=mysqli_fetch_row($sel2r))
{
    echo "<tr align=center>
            <td>$x[0]</td>
            <td>$x[1]</td>
            <td>$x[2]<br><b><font style='font-size:20px;color:Blue;'>[".$j++."]</font></b></td>
            <td>$x[3]<br><b><font style='font-size:20px;color:Blue;'>[".$j++."]</font></b></td>
            <td>$x[4]<br><b><font style='font-size:20px;color:Blue;'>[".$j++."]</font></b></td>
            <td>$x[5]<br><b><font style='font-size:20px;color:Blue;'>[".$j++."]</font></b></td>
            <td><b><font style='font-size:30px;color:Blue;'>$x[6]</font></b></td>
            </tr>";
}
echo "</table>";
if(isset($_POST['update']))
{
    
        $qno = $_POST['qno'];
        $up = $_POST['op'];
        $new = $_POST['new'];
        if(!is_numeric($new))
            $upquery = "UPDATE $t SET $up='$new' WHERE Qno=$qno";
        else
            $upquery = "UPDATE $t SET $up=$new WHERE Qno=$qno";
        
        $upres=mysqli_query($conn,$upquery);
        if($upres)
        {
            echo "<meta http-equiv='refresh' content='0'>";
        }else{
            echo "Failed to Update".mysqli_error($conn);
        }

}
?>
<br><br><a href='facpage.php'>Return to Faculty Page</a><br><br>
</body>
</html>