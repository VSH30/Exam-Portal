<?php
class required{
    private $conn, $time;
    public function __construct(){
        session_start();
        date_default_timezone_set('Asia/Kolkata');
        $this->conn = mysqli_connect("localhost","root","","mcqtest");
    }
    public function conn(){
        if(!$this->conn)
            die("FAILED TO CONNECT DB".mysqli_connect_error());
        return $this->conn;
    }
    public function query($query){
        return(mysqli_query($this->conn,$query));
    }
    public function enterlog($r,$n,$c,$t,$re="-"){
        $this->time = date('d-m-y h:i:s');
        return(mysqli_query($this->conn,"INSERT INTO log(rno,name,class,task,remark,time) VALUES($r,'$n','$c','$t','$re','$this->time')"));
    }
}
class User{
    public $rno, $name, $class;
    private $pass;
    public function __construct($arr){
        $this->rno = $arr['rno'];
        $this->name = $arr['name'];
        $this->class = $arr['class'];
        $this->pass = $arr['pass'];
    }
    public function getpass(){
        return $this->pass;
    }
}
?>