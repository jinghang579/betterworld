<?php
function select_all_provinces($conn){ //vt_provinces_manager
	$result=array();
	$select=mysqli_query($conn,"SELECT * FROM vt_provinces");
	while($row=mysqli_fetch_array($select)){
        array_push($result,$row["Province"]);
	}
	return $result;
}
function get_cities_by_pid($conn,$pid){ //vt_cities_manager
    $result=array();
    $select=mysqli_query($conn,"SELECT * FROM vt_cities WHERE pid='$pid'");
	while($row=mysqli_fetch_array($select)){
		$temp=array("cid"=>$row["cid"],"city"=>$row["City"]);
        array_push($result,$temp);
	}
	return $result;
}
function insert_register($conn,$name,$cell,$email,$province,$city,$address,$pass){
	$pass=MD5($pass);
	$select_user=mysqli_query($conn,"SELECT uid FROM vt_users WHERE Name='$name' && Cell='$cell'");
	if(mysqli_num_rows($select_user)>=1){
		$row_user=mysqli_fetch_array($select_user);
		$user_id=$row_user["uid"];
	}else{
		$insert_user=mysqli_query($conn,"INSERT INTO vt_users (Name,Pass,Mail,Cell) VALUES ('$name','$pass','$email','$cell')");
		$user_id=mysqli_insert_id($conn);
	}
	$select_addr=mysqli_query($conn,"SELECT aid FROM vt_addresses WHERE Address='$address' && pid='$province' && cid='$city'");
	if(mysqli_num_rows($select_addr)>=1){
		$row_addr=mysqli_fetch_array($select_addr);
		$aid=$row_addr["aid"];
	}else{
		$insert_addr=mysqli_query($conn,"INSERT INTO vt_addresses (Address,cid,pid) VALUES('$address','$city','$province')");
		$aid=mysqli_insert_id($conn);
	}
	$result=array("uid"=>$user_id,"aid"=>$aid);
	if(sizeof($result)==2){
		$insert=mysqli_query($conn,"INSERT INTO vt_uid_aid (uid,aid) VALUES ('$user_id','$aid')");
	}
	return $result;
}
?>
