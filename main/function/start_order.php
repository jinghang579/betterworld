<?php

function get_user_by_uid($conn,$uid){
	$select=mysqli_query($conn,"SELECT Name,Mail,Cell FROM vt_users WHERE uid='$uid'");
	$row=mysqli_fetch_array($select);
	if(mysqli_num_rows($select)==1){
		$user=array("name"=>$row["Name"],"mail"=>$row["Mail"],"cell"=>$row["Cell"]);
		return $user;
	}else{
		return null;
	}
}
function get_order_by_oid($conn,$oid,$uid){
	$result=array();
	$select=mysqli_query($conn,"SELECT * FROM vt_orders WHERE oid='$oid'");
	$row=mysqli_fetch_array($select);
	if(mysqli_num_rows($select)==1){
		$result=array("oid"=>$row["oid"],"uid"=>$row["uid"],"aid"=>$row["aid"],"rcid"=>$row["rcid"],"quantity"=>$row["Quantity"],
			"usedyear"=>$row["Usedyear"],"useable"=>$row["Useable"],"gettime"=>$row["Gettime"],"sid"=>$row["sid"],
			"adid"=>$row["adid"],"create_time"=>$row["Createtime"]);
	}
	return $result;
}
function get_recom_by_rcid($conn,$rcid){
	$result=array();
	$select=mysqli_query($conn,"SELECT * FROM vt_recom WHERE rcid='$rcid'");
	$row=mysqli_fetch_array($select);
	if(mysqli_num_rows($select)==1){
		$result=array("rcid"=>$row["rcid"],"brand"=>$row["Brand"],"cpu"=>$row["Cpu"],"ram"=>$row["Ram"],
			"disk"=>$row["Harddisk"],"graphic"=>$row["Graphic"],"monitor"=>$row["Monitorsize"]);
	}
	return $result;
}
function get_address_by_aid($conn,$aid){
	$result=array();
	$select=mysqli_query($conn,"SELECT * FROM vt_addresses WHERE aid='$aid'");
	$row=mysqli_fetch_array($select);
	if(mysqli_num_rows($select)==1){
		$address=$row["Address"];
		$cid=$row["cid"];
		$pid=$row["pid"];
		$select_p=mysqli_query($conn,"SELECT Province FROM vt_provinces WHERE pid='$pid'");
		$row_p=mysqli_fetch_array($select_p);
		if(mysqli_num_rows($select_p)==1){
			$province=$row_p["Province"];
		}
		$select_c=mysqli_query($conn,"SELECT City FROM vt_cities WHERE cid='$cid'");
		$row_c=mysqli_fetch_array($select_c);
		if(mysqli_num_rows($select_c)==1){
			$city=$row_c["City"];
		}
		$result=array("aid"=>$this_aid,"address"=>$address,"cid"=>$cid,"city"=>$city,"pid"=>$pid,"province"=>$province);
	}
	return $result;
}
function create_rc_by_uid($conn,$uid,$com_info){
	$brand=$com_info["brand"];
	$cpu=$com_info["cpu"];
	$ram=$com_info["ram"];
	$disk=$com_info["disk"];
	$graphic=$com_info["graphic"];
	$monitor=$com_info["monitor"];
	$select=mysqli_query($conn,"SELECT rcid FROM vt_recom WHERE Brand='$brand' && Cpu='$cpu' && Ram='$ram'
		&& Harddisk='$disk' && Graphic='$graphic' && Monitorsize='$monitor'");
	$row=mysqli_fetch_array($select);
	if(mysqli_num_rows($select)==1){
		$rcid=$row["rcid"];
	}else{
		$insert=mysqli_query($conn,"INSERT INTO vt_recom (Brand,Cpu,Ram,Harddisk,Graphic,Monitorsize)
			VALUES('$brand','$cpu','$ram','$disk','$graphic','$monitor')");
		$rcid=mysqli_insert_id($conn);
	}
	return $rcid;
}
function create_order_no_evaluate($conn,$uid,$aid,$rcid,$addition_info,$get_time,$adid){
	$q=$addition_info["quantity"];
	$u=$addition_info["usedyear"];
	$a=$addition_info["useable"];
	$insert=mysqli_query($conn,"INSERT INTO vt_orders (uid,aid,rcid,Quantity,Usedyear,Useable,Gettime,sid,adid) 
		VALUES('$uid','$aid','$rcid','$q','$u','$a','$get_time','1','$adid')");
	$oid=mysqli_insert_id($conn);
	return $oid;
}
function get_address_by_uid($conn,$uid){
	$result=array();
	$aid=array();
	$select_aid=mysqli_query($conn,"SELECT aid FROM vt_uid_aid WHERE uid='$uid'");
	while($row_aid=mysqli_fetch_array($select_aid)){
		array_push($aid, $row_aid["aid"]);
	}
	for($i=0;$i<sizeof($aid);$i++){
		$this_aid=$aid[$i];
		$select=mysqli_query($conn,"SELECT * FROM vt_addresses WHERE aid='$this_aid'");
		$row=mysqli_fetch_array($select);
		if(mysqli_num_rows($select)==1){
			$address=$row["Address"];
			$cid=$row["cid"];
			$pid=$row["pid"];
			$select_p=mysqli_query($conn,"SELECT Province FROM vt_provinces WHERE pid='$pid'");
			$row_p=mysqli_fetch_array($select_p);
			if(mysqli_num_rows($select_p)==1){
				$province=$row_p["Province"];
			}
			$select_c=mysqli_query($conn,"SELECT City FROM vt_cities WHERE cid='$cid'");
			$row_c=mysqli_fetch_array($select_c);
			if(mysqli_num_rows($select_c)==1){
				$city=$row_c["City"];
			}
			$temp=array("aid"=>$this_aid,"address"=>$address,"cid"=>$cid,"city"=>$city,"pid"=>$pid,"province"=>$province);
            array_push($result, $temp);
		}
	}
	return $result;
}
function create_address($conn,$uid,$address,$cid,$pid){
	$select_addr=mysqli_query($conn,"SELECT aid FROM vt_addresses WHERE Address='$address' && cid='$cid' && pid='$pid'");
	$row_addr=mysqli_fetch_array($select_addr);
	if(mysqli_num_rows($select_addr)==1){
		$aid=$row_addr["aid"];
		$select_re=mysqli_query($conn,"SELECT * FROM vt_uid_aid WHERE uid='$uid' && aid='$aid'");
		$row_re=mysqli_fetch_array($select_re);
		if(mysqli_num_rows($select_re)==0){
			$insert_re=mysqli_query($conn,"INSERT INTO vt_uid_aid (uid,aid) VALUES('$uid','$aid')");
		}
		return $aid;
	}else if(mysqli_num_rows($select_addr)==0){
		$insert=mysqli_query($conn,"INSERT INTO vt_addresses(Address,cid,pid) VALUES('$address','$cid','$pid')");
		$aid=mysqli_insert_id($conn);
		$insert_re=mysqli_query($conn,"INSERT INTO vt_uid_aid (uid,aid) VALUES('$uid','$aid')");
		return $aid;
	}else{
		return null;
	}
}
function update_zhifubao($conn,$uid,$zhifubao){
	$update=mysqli_query($conn,"UPDATE vt_users SET Zhifubao='$zhifubao'");
}
function get_advertise($conn){
	$result=array();
	$select=mysqli_query($conn,"SELECT adid,Product,Price FROM vt_advertises");
	while($row=mysqli_fetch_array($select)){
		$temp=array("adid"=>$row["adid"],"product"=>$row["Product"],"price"=>$row["Price"]);
		array_push($result, $temp);
	}
	return $result;
}
?>