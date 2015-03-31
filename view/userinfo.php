<?php
if(isset($_SESSION["uid"]) && isset($_SESSION["aid"])){
	$uid=$_SESSION["uid"];
    $aid=$_SESSION["aid"];
}else{
	$uid="";
    $aid="";
}
?>