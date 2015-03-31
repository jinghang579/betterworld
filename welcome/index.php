<?php
session_start();
if(isset($_POST["user_name"]) && isset($_POST["user_passwd"])){
	$temp_uid=$_POST["user_name"];
	$temp_passwd=$_POST["user_passwd"];
	$uid=check_login($conn,$temp_uid,$temp_passwd);
}
if(isset($uid) && $uid!=""){
	$aid=get_aid_by_uid($conn,$uid);
	$_SESSION["uid"]=$uid;
	$_SESSION["aid"]=$aid;
	$url="index.php"; 
echo "<script language=\"javascript\">"; 
echo "location.href=\"$url\""; 
echo "</script>";
}
?>
<html>
<link type="text/css" href="welcome/css/welcome.css" rel="stylesheet" />
<body>
<?php
if(!isset($_POST["user_name"])){
?>

<div id="login_container" class="center mid">
    <div id="login_show" style="visibility:hidden;">
    </div>
    <form id="login_form" method="post" action="">
        <input id="login_name" type="text" name="user_name"placeholder="用户名：" />
        <input id="login_passwd" type="password" name="user_passwd" placeholder="密码："/></br>
        <input type="submit" value="确定">
</form> 
</div>
<?php
}
if(isset($_POST["user_name"])&& $uid==""){
?>
<div id="login_container" class="center mid">
<div id="login_show" >
	<p>对不起，用户名或密码错误了</p>
</div>
<form id="login_form" method="post" action="">
    <input id="login_name" type="text" name="user_name"placeholder="用户名：" />
    <input id="login_passwd" type="password" name="user_passwd" placeholder="密码："/>
    <input type="submit" value="确定">
</form> 
<?php
}
?>
</div>
</body>
</html>
