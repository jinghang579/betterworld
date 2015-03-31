<?php
function get_order_by_uid($conn,$uid){
	$result=array();
	$select=mysqli_query($conn,"SELECT * FROM vt_orders WHERE uid='$uid'");
	while($row=mysqli_fetch_array($select)){
		$temp=array("oid"=>$row["oid"],"aid"=>$row["aid"],"rcid"=>$row["rcid"],
			"quantity"=>$row["Quantity"],"usedyear"=>$row["Usedyear"],"useable"=>$row["Useable"],
			"evaluate"=>$row["Evaluate"],"get_time"=>$row["Gettime"],"sid"=>$row["sid"],
			"adid"=>$row["adid"],"create_time"=>$row["Createtime"]);
		array_push($result, $temp);
	}
	return $result;
}
function get_status_by_sid($conn,$sid){
	$select=mysqli_query($conn,"SELECT Status FROM vt_status WHERE sid='$sid'");
	$row=mysqli_fetch_array($select);
	if(mysqli_num_rows($select)==1){
		$result=$row["Status"];
		return $result;
	}else{
		return null;
	}
}
?>