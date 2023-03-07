<?php
session_start();
?>

<html>

  <head>
	<style>
        body{
            padding: 5%;
        }
		td,th{
			font-size: 20px;
			font-weight: bold;
			font-family: Consolas;
			letter-spacing: 0px;
			color: Green;
			padding:10px;
			border: 1px solid black;
			border-radius: 10px;
			background-color: FFFC8C;
		}
		a:link,a:visited{
			font-size: 20px;
			font-weight: bold;
			font-family: Consolas;
			letter-spacing: 0px;
			color: FF0000;
		}
		a:hover,a:active{
			font-weight: thicker;
			font-size: 22px;
			text-decoration: underline;
			color: Black;
		}
		
	</style>
    <title>PHP SLIPS LIST</title>
  </head>
  <body bgcolor=7FFFF7>
		<h2 align=center><?php echo $_SESSION["name"]."[".$_SESSION["user"]."]";?></h2>
    <h1 align=center>PHP SLIPS LIST</h1>
		
    <table align=center><tr><th colspan=6><font color=Black>Slip Numbers</font></th></tr>
		
		<tr align=center>
		<td><a href="/SLIPS/SLIP 1/slip1.php">SLIP 1</a></td>
		<td><a href="/SLIPS/SLIP 2/slip2.html">SLIP 2</a></td>
		<td><a href="/SLIPS/SLIP 3/slip3.html">SLIP 3</a></td>
		<td><a href="/SLIPS/SLIP 4/slip4.html">SLIP 4</a></td>
		<td><a href="/SLIPS/SLIP 5/slip5.html">SLIP 5</a></td>
		<td><a href="/SLIPS/SLIP 6/slip6.html">SLIP 6</a></td>
		</tr>
		
		<tr align=center>
		<td><a href="/SLIPS/SLIP 7/slip7.html">SLIP 7</a></td>
		<td><a href="/SLIPS/SLIP 8/slip8.html">SLIP 8</a></td>
		<td><a href="/SLIPS/SLIP 9/slip9.html">SLIP 9</a></td>
		<td>SLIP 10</td>
		<td><a href="/SLIPS/SLIP 11/slip11.html">SLIP 11</a></td>
		<td>SLIP 12</td>
		</tr>
		
		<tr align=center>
		<td><a href="/SLIPS/SLIP 13/slip13.html">SLIP 13</a></td>
		<td>SLIP 14</td>
		<td><a href="/SLIPS/SLIP 15/slip15.html">SLIP 15</a></td>
		<td><a href="/SLIPS/SLIP 16/slip16.html">SLIP 16</a></td>
		<td>SLIP 17</td>
		<td>SLIP 18</td>
		</tr>
	
		<tr align=center>
		<td>SLIP 19</a></td>
		<td>SLIP 20</td>
		<td>SLIP 21</a></td>
		<td>SLIP 22</a></td>
		<td>SLIP 23</td>
		<td>SLIP 24</td>
		</tr>
		
		<tr align=center>
		<td>SLIP 25</a></td>
		<td>SLIP 26</td>
		<td>SLIP 27</a></td>
		<td>SLIP 28</a></td>
		<td>SLIP 29</td>
		<td>SLIP 30</td>
		</tr>

        <tr align=center>
            <td colspan=6><a href="../DS.php">DATA STRUCTURE</a></td></td>
		</tr>
	</table>
	</body>
</html>