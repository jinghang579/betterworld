<?php
session_start();
include("function/start_order.php");
include("../config/conn.php");
if(isset($_SESSION["uid"]) && $_SESSION["uid"]!=""){
	$uid=$_SESSION["uid"];
	//echo "uid:".$uid;
}else{
	exit;
}
if(isset($_POST["address"])){
	$address=array("address"=>$_POST["address"],"pid"=>$_POST["province"],"cid"=>$_POST["city"]);
	$get_time=$_POST["time"];
	$_SESSION["get_time"]=$get_time;
	$_SESSION["address"]=$address;
}else if(isset($_GET["aid"])){
	$address=$_GET["aid"];
	$_SESSION["address"]=$address;
	$get_time=$_GET["time"];
	$_SESSION["get_time"]=$get_time;
}else if(isset($_SESSION["address"]) && $_SESSION["address"]!="" && isset($_SESSION["get_time"]) && $_SESSION["get_time"]!=""){
	$address=$_SESSION["address"];
	$get_time=$_SESSION["get_time"];
}else{
	exit;
}
$recom=$_SESSION["recom"];
$addition_info=$_SESSION["addition_info"];
?>
<link type="text/css" href="main/css/start.css" rel="stylesheet" />
<input style="display:none;" name="order_brand" id="order_brand" value="<?php echo $recom["brand"];?>">
<input style="display:none;" name="order_cpu" id="order_cpu" value="<?php echo $recom["cpu"];?>">
<input style="display:none;" name="order_ram" id="order_ram" value="<?php echo $recom["ram"];?>">
<input style="display:none;" name="order_disk" id="order_disk" value="<?php echo $recom["disk"];?>">
<input style="display:none;" name="order_graphic" id="order_graphic" value="<?php echo $recom["graphic"];?>">
<input style="display:none;" name="order_monitor" id="order_monitor" value="<?php echo $recom["monitor"];?>">
<input style="display:none;" name="order_quantity" id="order_quantity" value="<?php echo $addition_info["quantity"];?>">
<input style="display:none;" name="order_usedyear" id="order_usedyear" value="<?php echo $addition_info["usedyear"];?>">
<input style="display:none;" name="order_useable" id="order_useable" value="<?php echo $addition_info["useable"];?>">
<input style="display:none;" name="order_get_time" id="order_get_time" value="<?php echo $get_time;?>">
<?php
//var_dump($address);
//var_dump($get_time);
if(sizeof($address)==1){
	$aid=$address;
	?>
	<input style="display:none;" name="order_aid" id="order_aid" value="<?php echo $aid;?>">
	<?php
}else if(sizeof($address)>1){
	?>
	<input style="display:none;" name="order_aid" id="order_aid" value="">
	<input style="display:none;" name="order_address" id="order_address" value="<?php echo $address["address"];?>">
	<input style="display:none;" name="order_pid" id="order_pid" value="<?php echo $address["pid"];?>">
	<input style="display:none;" name="order_cid" id="order_cid" value="<?php echo $address["cid"];?>">
	<?php
}else{
	exit;
}
?>
<div id="recom_info">
<div id="error_info" style="visibility:hidden;margin-bottom:8px;">
</div>
<p>支付宝账号:</p>
<p style="font-size: 14px;color: #868686;">请输入您的支付宝账号，我们会将回收电脑的金额打入您的支付宝中</p>
<input id="user_zhifubao" name="user_zhifubao" value="" placeholder="支付宝账号">
<div style="width:100%;height:1px;border-top:1px solid #ddd;margin-top:20px;"></div>
<div class="no_ad"> 
<p>我想要回收电脑的全部金额</p>
<p style="font-size: 14px;color: #868686;">选择此项，我们将会在收到电脑和估价后，把回收电脑所得的全部金额打入您的支付宝中。</p>
<button onclick="post_order('0')">确认订单并获取全部金额</button>
</div>
<div style="width:100%;height:1px;border-top:1px solid #ddd;margin-top:20px;"></div>
<div class="has_ad">
<p>我想先将回收电脑的金额兑换一个商品再返还</p>
<p style="font-size: 14px;color: #868686;">选择此项，我们将会在收到电脑和估价后，将回收电脑所得的金额先兑换您喜欢的商品，再将剩余的金额打入您的支付宝中并为您免费邮寄商品。</p>
<a href="#" class="a_button">我们的一些话
<p style="font-size: 12px;color: #25adec;">
2010年我们曾经去天水的一个乡村小学支教，</p>
</a>
	<?php 
	$advertise=get_advertise($conn);
	for($i=0;$i<sizeof($advertise);$i++){
		?>
		<article >
			<a href="#" onmouseover="has_ad_style(<?php echo $advertise[$i]["adid"];?>,1)" onmouseout="has_ad_style(<?php echo $advertise[$i]["adid"];?>,0)" onclick="choose_product(<?php echo $advertise[$i]["adid"];?>)">
			<img id="product_img_<?php echo $advertise[$i]["adid"];?>" src="images/advertise/<?php echo $advertise[$i]["adid"];?>.jpg"></img>
			<h6 id="product_title_<?php echo $advertise[$i]["adid"];?>" ><?php echo $advertise[$i]["product"];?></h6>
			</a>
			<text id="product_price_<?php echo $advertise[$i]["adid"];?>" >￥<?php echo $advertise[$i]["price"];?>.00元</text>
		</article>
		<?php
	}
	?>
<p style="font-size: 14px;color: #868686;">您选择的商品为：</p>
<div id="choosed_ad" >
	<input id="choosed_product" value="" style="display:none;">
</div>
<button onclick="post_order('1')">确认订单并获取商品和金额</button>
</div>
</div>