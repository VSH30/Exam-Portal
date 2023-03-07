<?php
include("opfun.php");

$a = $_GET['a'];
$b = $_GET['b'];
$op = $_GET['op'];

switch($op)
{
	case 'add':
		add($a,$b);
		break;
	case 'sub':
		sub($a,$b);
		break;
	case 'mul':
		mul($a,$b);
		break;
	case 'div':
		div($a,$b);
		break;
	default:
		echo "Please select an Operation!!!";
		break;
}
?>