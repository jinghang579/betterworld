<?php
session_start();
include("config/conn.php");
include("main/function/order_status.php");
include("main/function/start_order.php");
include("main/function/show_blog.php");
?>
<link type="text/css" href="main/css/index.css" rel="stylesheet" />
<div id="main_index">
	<?php
	if(isset($_SESSION["uid"])&&$_SESSION["uid"]!=""){
		$uid=$_SESSION["uid"];
		$orders=get_order_by_uid($conn,$uid);
		//var_dump($orders[1]);
		if(sizeof($orders)>0){
			?>
		    <div id="order_container" class="w center">
		    	<?php
		    	for($i=0;$i<sizeof($orders);$i++){
		    		$recom=get_recom_by_rcid($conn,$orders[$i]["rcid"]);
		    		//var_dump($recom);
		    	?>
		        <div class="show_order">
		        	<div class="order_head"></div>
		        	<a href="#">
		        		<div class="w4">
		        			<div class="order_title" >
		        				<p>品牌及型号</p>
		        			</div>
		        			<div class="order_detail" >
		        				<h5><?php echo $recom["brand"];?></h5>
		        			</div>
		        		</div>
		        		<div class="w4">
		        			<div class="order_title" >
		        				<p>数量</p>
		        			</div>
		        			<div class="order_detail" >
		        				<h5><?php echo $orders[$i]["quantity"];?></h5>
		        			</div>
		        		</div>
		        		<div class="w4">
		        			<div class="order_title" >
		        				<p>下单时间</p>
		        			</div>
		        			<div class="order_detail" >
		        				<h5><?php echo $orders[$i]["create_time"];?></h5>
		        			</div>
		        		</div>
		        		<div class="w4">
		        			<div class="order_title" >
		        				<p>状态</p>
		        			</div>
		        			<div class="order_detail" style="color:#14C200;">
		        				<?php $order_state=get_status_by_sid($conn,$orders[$i]["sid"]);?>
		        				<h5><?php echo $order_state;?></h5>
		        			</div>
		        		</div>
		        	</a>
		        </div>
		        <?php
		        }
		        ?>
	        </div>
		<?
		}else{
			?>
		    <div id="index_container" class="w center">
		    	<?php
		    	$blogs=get_all_blogs($conn);
		    	for($i=0;$i<sizeof($blogs);$i++){
		    		?>
		    		<div class="blog" id="blog_<?php echo $blogs[$i]["id"];?>">
		    			<div class="blog_left">
		    				<img src="<?php echo $blogs[$i]["image"];?>.jpg"></img>
		    			</div>
		    			<div class="blog_right">
		    				<div class="blog_title">
		    					<?php echo $blogs[$i]["title"];?>
		    				</div>
		    				<div class="blog_content">
		    					<p><?php echo $blogs[$i]["content"];?></p>
		    				</div>
		    			</div>
		    		</div>
		    		<?php
		    	}
		    	?>
	        </div>
		<?
		}
	}else{
		exit;
	}
	?>
</div>

