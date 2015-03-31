<?php
include("../config/conn.php");
include("function/register.php");
?>
<link type="text/css" href="welcome/css/welcome.css" rel="stylesheet" />
<div id="login_container" style="height:440px;" class="center mid">
<div id="login_show" style="visibility:hidden;">
</div>
<form id="register_form" method="POST" action="welcome/register_success.php" onSubmit="return check_register(this)">
	邮箱：
	<input style="margin-top: 8px;" id="user_email" name="user_email" placeholder="邮箱用于将您与其他同名用户区分"></br><text>邮箱地址将作为登陆的用户名</text></br>
	姓名：
	<input  id="user_name" name="user_name" placeholder="请输入真实姓名，方便邮寄和收取快递"></br>
	电话：
	<input id="user_cell" name="user_cell" placeholder="电话将用于快递公司与您联系,上门取件"></br>
	<text>电话号码将作为登陆的默认密码，您也可以在下方设定其他密码</text></br>
	密码：
	<input type="password" name="user_pass"></br><text>设定后，将作为登陆的密码</text></br>
	地址：
	<input id="user_address" name="user_address" placeholder="地址">
	<?php
	$Provinces=select_all_provinces($conn); 
	?>
	<select style="width:80px;position: relative;top: 2px;left: 4px;" name="user_province" id="user_province" onchange="choose_city()">
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
	<div style="width:80px;position: relative;top: -50px;left: 420px;" id="city_area">
		<?php include("city_area.php");?>
	</div>
	
	<input type="submit" value="确定">	
</form>
</div>