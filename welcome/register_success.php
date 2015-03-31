<?php
header("Location:../index.php");
session_start();
include("../config/conn.php");
include("function/register.php");
if(isset($_POST["user_name"]) && isset($_POST["user_cell"]) && isset($_POST["user_address"])){
    $user_name=$_POST["user_name"];
    $user_cell=$_POST["user_cell"];
    $user_email=$_POST["user_email"];
    $user_province=$_POST["user_province"];
    $user_city=$_POST["user_city"];
    $user_address=$_POST["user_address"];
    $user_pass=$_POST["user_pass"];
    //echo "|".$user_name."|".$user_cell."|".$user_email."|".$user_province."|".$user_city."|".$user_address."|".$user_pass;
}else{
	exit();
}
$uid_aid=insert_register($conn,$user_name,$user_cell,$user_email,$user_province,$user_city,$user_address,$user_pass);
$_SESSION["uid"]=$uid_aid["uid"];
$_SESSION["aid"]=$uid_aid["aid"];
?>
