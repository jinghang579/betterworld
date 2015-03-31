<?php
session_start();
include("function/start_order.php");
include("../config/conn.php");
if(isset($_SESSION["uid"])){
	$uid=$_SESSION["uid"];
}else{
	exit();
}
if(isset($_SESSION["oid"])){
	$oid=$_SESSION["oid"];
}else{
	$oid="";
}
?>
<link type="text/css" href="main/css/start.css" rel="stylesheet" />

<?php
if($oid!=""){
	$recom=$_SESSION["recom"];
	$addition_info=$_SESSION["addition_info"];
?>
<div id="form_container">
<div id="error_info" style="visibility:hidden;"></div>
<form id="recom_info">
    <div class="form_style">
    <p>品牌及型号：</p><input name="com_brand" id="com_brand" placeholder="品牌及型号" value="<?php echo $recom["brand"]?>" onclick="show_inst_brand()"></br>
    <p>处理器(CPU)：</p><input name="com_cpu" id="com_cpu" placeholder="处理器(CPU)" value="<?php echo $recom["cpu"]?>" onclick="show_inst_cpu()"></br>
    <p>内存：</p><input name="com_ram" id="com_ram" placeholder="内存" value="<?php echo $recom["ram"]?>" onclick="show_inst_ram()"></br>
    <p>硬盘：</p><input name="com_harddisk" id="com_harddisk" placeholder="硬盘" value="<?php echo $recom["disk"]?>" onclick="show_inst_harddisk()"></br>
    <p>显卡：</p><input name="com_graphic" id="com_graphic" placeholder="显卡" value="<?php echo $recom["graphic"]?>" onclick="show_inst_graphic()"></br>
    <p>显示器大小：</p><input name="com_monitorsize" id="com_monitorsize" value="<?php echo $recom["monitor"]?>" placeholder="显示器大小">吋  </br>
    <p>数量：</p><input name="com_quantity" id="com_quantity" value="1" value="<?php echo $addition_info["quantity"]?>" placeholder="数量"></br>
    <p>使用时间：</p><input name="com_usedyear" id="com_usedyear" value="1" value="<?php echo $addition_info["usedyear"]?>" placeholder="使用时间">年</br>
    <p>现在是否可用：</p>
    <?php 
    if($addition_info["useable"]==1){
    ?>
    <select name="com_useable" id="com_useable">
    	<option value="1" selected="selected">可用</option>
    	<option value="0">不可用</option>
    </select></br>
    <?php
    }else{
    ?>
    现在是否可用：
    <select name="com_useable" id="com_useable">
    	<option value="1" >可用</option>
    	<option value="0" selected="selected">不可用</option>
    </select></br>
    <?php
    }
    ?>
    </div>
<div id="inst">
    <div id="inst_brand">
        <p>在哪里找到品牌和型号？</p>
        <p>1.在外观上寻找</p>
        <p>2.通过检测软件查看</p>
        <p>常用的软件有鲁大师、驱动精灵等。在硬件检测功能中能查看到电脑的型号和品牌</p>
        <a href="#" onclick="show_big_img('inst_brand')"><img src="main/images/inst_brand.jpg"></img></a>
    </div>
    <div id="inst_cpu" style="display:none;">
        <p>在哪里找到CPU信息？</p>
        <p>1.右键我的电脑->属性</p>
        <p>在系统菜单中可以看到CPU信息</p>
        <a href="#" onclick="show_big_img('inst_cpu')"><img src="main/images/inst_cpu.jpg"></img></a>
    </div>
    <div id="inst_ram" style="display:none;">
        <p>在哪里找到内存信息？</p>
        <p>1.右键我的电脑->属性</p>
        <p>在系统菜单中可以看到内存信息</p>
        <a href="#" onclick="show_big_img('inst_ram')"><img src="main/images/inst_ram.jpg"></img></a>
    </div>
    <div id="inst_harddisk" style="display:none;">
        <p>在哪里找到硬盘信息？</p>
        <p>1.右键我的电脑->管理->存储->磁盘管理</p>
        <p>界面中将显示所有分区的大小，将他们加和就可以</p>
        <a href="#" onclick="show_big_img('inst_harddisk')"><img src="main/images/inst_harddisk.jpg"></img></a>
    </div>
    <div id="inst_graphic" style="display:none;">
        <p>在哪里找到硬盘信息？</p>
        <p>1.右键我的电脑->管理->设备管理器->显示适配器</p>
        <p>显示适配器下拉菜单中将直接显示显卡型号</p>
        <a href="#" onclick="show_big_img('inst_graphic')"><img src="main/images/inst_graphic.jpg"></img></a>
    </div>
</div>   

</form>
<button onclick="sub_com_info(<?php echo $uid;?>)">保存并下一步</button> 
</div>
<div id="big_img" style="display:none">
</div> 
<?php
}else{
?>
<div id="form_container">
<div id="error_info" style="visibility:hidden;"></div>
<form id="recom_info">
    <div class="form_style">
    <p>品牌及型号：</p><input name="com_brand" id="com_brand" placeholder="品牌及型号" onclick="show_inst_brand()"></br>
    <p>处理器(CPU)：</p><input name="com_cpu" id="com_cpu" placeholder="处理器(CPU)" onclick="show_inst_cpu()"></br>
    <p>内存：</p><input name="com_ram" id="com_ram" placeholder="内存" onclick="show_inst_ram()"></br>
    <p>硬盘：</p><input name="com_harddisk" id="com_harddisk" placeholder="硬盘" onclick="show_inst_harddisk()"></br>
    <p>显卡：</p><input name="com_graphic" id="com_graphic" placeholder="显卡" onclick="show_inst_graphic()"></br>
    <p>显示器大小：</p><input name="com_monitorsize" id="com_monitorsize" placeholder="显示器大小">吋  </br>
    <p>数量：</p><input name="com_quantity" id="com_quantity" value="1" placeholder="数量"></br>
    <p>使用时间：</p><input name="com_usedyear" id="com_usedyear" value="1" placeholder="使用时间">年</br>
    <p>现在是否可用：</p>
    <select name="com_useable" id="com_useable">
    	<option value="1" selected="selected">可用</option>
    	<option value="0">不可用</option>
    </select></br>
</div>

<div id="inst">
    <div id="inst_brand">
        <p>在哪里找到品牌和型号？</p>
        <p>1.在外观上寻找</p>
        <p>2.通过检测软件查看</p>
        <p>常用的软件有鲁大师、驱动精灵等。在硬件检测功能中能查看到电脑的型号和品牌</p>
        <a href="#" onclick="show_big_img('inst_brand')"><img src="main/images/inst_brand.jpg"></img></a>
    </div>
    <div id="inst_cpu" style="display:none;">
        <p>在哪里找到CPU信息？</p>
        <p>1.右键我的电脑->属性</p>
        <p>在系统菜单中可以看到CPU信息</p>
        <a href="#" onclick="show_big_img('inst_cpu')"><img src="main/images/inst_cpu.jpg"></img></a>
    </div>
    <div id="inst_ram" style="display:none;">
        <p>在哪里找到内存信息？</p>
        <p>1.右键我的电脑->属性</p>
        <p>在系统菜单中可以看到内存信息</p>
        <a href="#" onclick="show_big_img('inst_ram')"><img src="main/images/inst_ram.jpg"></img></a>
    </div>
    <div id="inst_harddisk" style="display:none;">
        <p>在哪里找到硬盘信息？</p>
        <p>1.右键我的电脑->管理->存储->磁盘管理</p>
        <p>界面中将显示所有分区的大小，将他们加和就可以</p>
        <a href="#" onclick="show_big_img('inst_harddisk')"><img src="main/images/inst_harddisk.jpg"></img></a>
    </div>
    <div id="inst_graphic" style="display:none;">
        <p>在哪里找到硬盘信息？</p>
        <p>1.右键我的电脑->管理->设备管理器->显示适配器</p>
        <p>显示适配器下拉菜单中将直接显示显卡型号</p>
        <a href="#" onclick="show_big_img('inst_graphic')"><img src="main/images/inst_graphic.jpg"></img></a>
    </div>
</div>

</form>
<button onclick="sub_com_info(<?php echo $uid;?>)">保存并下一步</button>
</div>
<div id="big_img" style="display:none">
</div> 
<?php
}
?>