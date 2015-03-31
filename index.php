<?php
session_start();
include("view/header.php");
include("view/userinfo.php");
include("welcome/function/login.php");
include("config/conn.php");
if(isset($_SESSION["uid"]) && isset($_SESSION["aid"])){
	$uid=$_SESSION["uid"];
    $aid=$_SESSION["aid"];
}else{
	$uid="";
    $aid="";
}
//var_dump($uid);
?>
<head>
<script type="text/javascript" src="js/post.js"></script>
<script type="text/javascript" src="js/start_re.js"></script>
<script type="text/javascript" src="js/register.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/show_inst.js"></script>
	<!--Requirement jQuery-->
	<script type="text/javascript" src="js/jquery.core.js"></script>
	<!--Load Script and Stylesheet -->
	<script type="text/javascript" src="js/jquery.simple-dtpicker.js"></script>
	<link type="text/css" href="css/jquery.simple-dtpicker.css" rel="stylesheet" />
	<link type="text/css" href="css/index.css" rel="stylesheet" />
</head>
<body>
<div id="container">
<div id="intro" class="full">
	<div id="intro_main" class="center">
			<div id="intro_vetro">
			<h2>回收电脑</h2>
			<p>大连维特罗网络服务有限责任公司</p>
		    </div>
		    <div id="intro_mask">
    		<div id="intro_scroll">
	  		<div class="movingTarget" style="color:#F05050">让地球变得更好</div>
			<div class="movingTarget" style="color:#AFDCC9">帮助贫困地区的学生</div>
			<div class="movingTarget" style="color:#48C0b5">让你的生活更加便捷</div>
			<div class="movingTarget" style="color:#A2DADE">换取超值的礼品</div>
		    </div>
	        </div>		
	</div>
</div>
<div id="gap">
<?php
if($uid=="" && $aid==""){
	include("gap/index.php");
}else{
	include("gap/logout.php");
}
?>	
</div>
<div id="welcome">
<?php
if($uid=="" && $aid==""){
	include("welcome/index.php");
}else{
	include("main/index.php");
}
?>
</div>

</div>
<?php
include("view/footer.php");
?>
</body>
