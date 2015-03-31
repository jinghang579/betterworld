<?php
session_start();
include("function/start_order.php");
include("../welcome/function/register.php");
include("../config/conn.php");
if(!isset($_SESSION["uid"]) || $_SESSION["uid"]==""){
	exit;
}
if(!isset($_SESSION["oid"]) || $_SESSION["oid"]==""){
	if(isset($_POST["brand"])&&isset($_POST["cpu"])&&isset($_POST["ram"])&&isset($_POST["disk"])&&isset($_POST["graphic"])){
	    $brand=$_POST["brand"];
	    $cpu=$_POST["cpu"];
	    $ram=$_POST["ram"];
	    $disk=$_POST["disk"];
	    $graphic=$_POST["graphic"];
	    $monitor=$_POST["monitor"];
	    $com_info=array("brand"=>$brand,"cpu"=>$cpu,"ram"=>$ram,"disk"=>$disk,"graphic"=>$graphic,"monitor"=>$monitor);
	    $_SESSION["recom"]=$com_info;
	    $recom=$_SESSION["recom"];
	    $quantity=$_POST["quantity"];
	    $usedyear=$_POST["used"];
	    $useable=$_POST["able"];
	    $addition_info=array("quantity"=>$quantity,"usedyear"=>$usedyear,"useable"=>$useable);
	    $_SESSION["addition_info"]=$addition_info;
	    $_SESSION["oid"]=1;
    }else{
    	exit;
    }
}else{
	if(isset($_POST["brand"])&&isset($_POST["cpu"])&&isset($_POST["ram"])&&isset($_POST["disk"])&&isset($_POST["graphic"])){
	    $brand=$_POST["brand"];
	    $cpu=$_POST["cpu"];
	    $ram=$_POST["ram"];
	    $disk=$_POST["disk"];
	    $graphic=$_POST["graphic"];
	    $monitor=$_POST["monitor"];
	    $com_info=array("brand"=>$brand,"cpu"=>$cpu,"ram"=>$ram,"disk"=>$disk,"graphic"=>$graphic,"monitor"=>$monitor);
	    $_SESSION["recom"]=$com_info;
	    $recom=$_SESSION["recom"];
	    $quantity=$_POST["quantity"];
	    $usedyear=$_POST["used"];
	    $useable=$_POST["able"];
	    $addition_info=array("quantity"=>$quantity,"usedyear"=>$usedyear,"useable"=>$useable);
	    $_SESSION["addition_info"]=$addition_info;
    }else{
    	$recom=$_SESSION["recom"];
    	$addition_info=$_SESSION["addition_info"];
    }	
}
$uid=$_SESSION["uid"];
//echo "order=".$_SESSION["oid"]."uid=".$uid;
$address=get_address_by_uid($conn,$uid);
//var_dump($recom);
//var_dump($addition_info);
//var_dump($address);
?>
<link type="text/css" href="main/css/start.css" rel="stylesheet" />
<div id="recom_info">
<div id="error_info" style="visibility:hidden;margin-bottom:15px;">
</div>
<p style="font-size: 14px;color: #868686;">我们会为您联系快递公司上门取您的电脑，并且支付快递费用</p>
<p style="float:left;margin-top: 26px;">请确定上门取件的时间：</p>
<input type="text" name="date_time" value="" id="date_time" onclick="ini_time()">
<div style="width:100%;height:1px;border-top:1px solid #ddd;margin-top:20px;"></div>
<p style="font-size: 14px;color: #868686;">从已有地址中选取作为取件地址：</p>
<?php
for($i=0;$i<sizeof($address);$i++){
	?>
	<div id="exist_addr">
	<p><?php echo $address[$i]["address"];?></p>
	<p><?php echo $address[$i]["city"];?> , <?php echo $address[$i]["province"]?></p>
	<button onclick="get_addr_time(<?php echo $address[$i]["aid"];?>)">确定此地址为取件地址</button>
</div>
	<?php
}
?>
<div style="width:100%;height:1px;border-top:1px solid #ddd;margin-top:20px;"></div>
<p style="font-size: 14px;color: #868686;">新建一个地址作为取件地址：</p>
<div id="new_addr">
<form id="newaddress_form">
	<?php
	$Provinces=select_all_provinces($conn); 
	?>
	<div class="user_address">
	<text>省份：</text>
	<select style="width:80px;"name="user_province" id="user_province" onchange="choose_city()">
		<?php 
		for ($i=0;$i<sizeof($Provinces);$i++){
		?>
		  	<option id="province_id" value="<?php echo $i+1?>">
		  		<?php echo $Provinces[$i];?>
		    </option>
		<?php
	    }
	    ?>		
	</select>
    </div>
	<div class="user_address" style="height:48px;">
	<text style="position: relative;top: 18px;">城市：</text>
	<div id="city_area" style="position: relative;margin-left: 53px;bottom: 23px;">
		<?php include("../welcome/city_area.php");?>
	</div>
    </div>
    <div class="user_address">
	<text>地址：</text>
	<input id="user_address" name="user_address" placeholder="地址">
	</div>	
</form>
<button onclick="post_addr_time()">确定此地址为取件地址</button>
</div>
</div>
