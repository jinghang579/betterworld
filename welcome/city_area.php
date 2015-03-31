<?php
include("../config/conn.php");
if(isset($_GET["pid"]) && isset($_GET["pid"])!=null){
   	$pid=$_GET["pid"];
   	include("function/register.php");
}else{
   	$pid=1;
}
$cities=get_cities_by_pid($conn,$pid);
if($pid<=4){
?>
  	<select style="width:80px;" id="user_city" name="user_city">
        <option value="<?php echo $cities[0]["cid"];?>"><?php echo $cities[0]["city"];?></option>
    </select>
<?php
}else{
?>
	<select style="width:80px;" id="user_city" name="user_city">
		<?php
		for ($i=0;$i<sizeof($cities);$i++){
		?>
		    <option value="<?php echo $cities[$i]["cid"];?>"><?php echo $cities[$i]["city"];?></option>
		<?php
		}
        ?>
    </select>

<?php
}
?>
