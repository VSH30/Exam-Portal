<html>
	<head>
		<title>Slip1</title>
	</head>
	<body><h1 align=center>SLIP 1</h1>
	<form name="fm1" method=POST action="#" align=center>
		<h2>
			Enter a string: <input type="text" name="t1" value=""><br><br>
			Choose from following:<br>
			<input type="radio" name="r1" value="vowel">Occurences of Vowel<br>
			<input type="radio" name="r1" value="palindrome">Check Palindrom<br><br>
				<input type="submit" name="submit" value="submit">
		</h2>
	</form>
    <a href="../slipss.html"><h2 align=center>SLIPS LIST</h2></a>
	</body>
</html>
<?php
include("strfunc.php");
if(isset($_POST['submit']))
{
$ch = $_POST['r1'];
$str = $_POST['t1'];

switch($ch)
{
	case "vowel":
		totalvowel($str);
		break;
		
	case "palindrome":
		checkpalindrome($str);
		break;
	
	default:
		echo "Invalid Choice";
}
}
?>