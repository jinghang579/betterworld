<?php
session_start();
include("function/start_order.php");
include("../config/conn.php");
if(isset($_SESSION["uid"]) && $_SESSION["uid"]!=""){
	$uid=$_SESSION["uid"];
	//echo "uid:".$uid;
}else{
	return;
}
if(isset($_SESSION["recom"]) && isset($_SESSION["addition_info"])){
	$recom=$_SESSION["recom"];
	$addition_info=$_SESSION["addition_info"];
}
if(isset($_POST["get_time"]) && isset($_POST["ad"]) &&isset($_POST["zhifubao"])){
	$ad=$_POST["ad"];
	$get_time=$_POST["get_time"];
	$zhifubao=$_POST["zhifubao"];
}
if(isset($_POST["aid"])){
	$aid=$_POST["aid"];
	//echo $aid;
}else if(isset($_POST["address"])){
	$address=$_POST["address"];
	$pid=$_POST["pid"];
	$cid=$_POST["cid"];
	//echo $address.$pid.$cid;
	$aid=create_address($conn,$uid,$address,$cid,$pid);
}
//var_dump($recom);
//var_dump($addition_info);
//echo "ad:".$ad."time:".$get_time."zhifubao:".$zhifubao;
$rcid=create_rc_by_uid($conn,$uid,$recom);
$update_zhifubao=update_zhifubao($conn,$uid,$zhifubao);
$address=get_address_by_aid($conn,$aid);
$adid=1;
$oid=create_order_no_evaluate($conn,$uid,$aid,$rcid,$addition_info,$get_time,$adid);
unset($_SESSION["recom"]);
unset($_SESSION["addition_info"]);
unset($_SESSION["oid"]);
unset($_SESSION["address"]);
unset($_SESSION["get_time"]);
?>
<link type="text/css" href="main/css/index.css" rel="stylesheet" />
<link type="text/css" href="main/css/start.css" rel="stylesheet" />
<div class="w center">
	<h5 style="font-size:18px;color:#25adec;">恭喜您！已经成功下单，感谢您对环保及公益事业的支持！</h5>
<form id="form_container" action="main/agreement.php" method="post" target="_blank">
<input style="display:none;" name="order_oid" id="order_oid" value="<?php echo $oid;?>">
<input type="submit" value="保存或打印订单确认页">
</form>
<a href="index.php">返回主页</a>
</div>