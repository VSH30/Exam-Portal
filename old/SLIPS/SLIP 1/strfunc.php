<?php

function totalvowel($s)
{
	$ca=0;
	$ce=0;
	$ci=0;
	$co=0;
	$cu=0;
	$len=strlen($s);
	
	for($i=0;$i<$len;$i++)
	{
		switch($s[$i])
		{
			case 'a':
			case 'A':
				echo "<br> $s[$i] found at position $i";
				$ca++;
				break;
			case 'e':
			case 'E':
				echo "<br> $s[$i] found at position $i";
				$ce++;
				break;
			case 'i':
			case 'I':
				echo "<br> $s[$i] found at position $i";
				$ci++;
				break;
			case 'o':
			case 'O':
				echo "<br> $s[$i] found at position $i";
				$co++;
				break;
			case 'u':
			case 'U':
				echo "<br> $s[$i] found at position $i";
				$cu++;
				break;
		}
	}
	echo "<br><br>Occurences of a:$ca<br>";
	echo "Occurences of e:$ce<br>";
	echo "Occurences of i:$ci<br>";
	echo "Occurences of o:$co<br>";
	echo "Occurences of u:$cu<br>";
}

function checkpalindrome($str)
{
	$len=strlen($str);
	
	for($i=0,$j=$len-1 ; $i<$len/2 && $j>=0 ; $i++,$j--)
	{
		if($str[$i]!=$str[$j])
		{
			echo "$str is not palindrome";
			return;
		}
	}
	echo "$str is Palindrome";
}

?>