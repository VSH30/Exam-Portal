<?php
interface A
{
	public function area();
	public function volume();
}

Class Cylinder implements A
{
	private $Pii,$rr,$hh,$ar,$vo;
	public function accept($rc,$hc)
	{
		$this->rr = $rc;
		$this->hh = $hc;
		$this->Pii = 22/7;
	}
	
	public function area()
	{
		$ar = 2*$this->Pii*($this->rr)*(($this->rr) + ($this->hh)); 
		echo "<br><h2 align=center>Area = $ar </h2>";
	}
	
	public function volume()
	{
		$vo = $this->Pii * pow(($this->rr),2) * ($this->hh);
		echo "<br><h2 align=center>Volume = $vo </h2>";
	}
}
echo "<h1 align=center>Slip9</h1>";
$rad = $_GET['rad'];
$hig = $_GET['hig'];
$op = $_GET['op'];
$cyll = new Cylinder;
$cyll->accept($rad,$hig);
switch($op)
{
	case 1:
		$cyll->area();
		break;
	case 2:
		$cyll->volume();
		break;
	default:
		echo "Please choose an Operation!!!";
		break;
}

?>