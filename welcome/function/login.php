<?php
function check_login($conn,$user,$pass){
	$pass=MD5($pass);
	$select=mysqli_query($conn,"SELECT uid FROM vt_users WHERE Name='$user' && Pass='$pass'");
	$row=mysqli_fetch_array($select);
	if(mysqli_num_rows($select)==1){
		$uid=$row["uid"];
		return $uid;
	}else{
		return "";
	}
}
function get_aid_by_uid($conn,$uid){
	$result=array();
	$select=mysqli_query($conn,"SELECT aid FROM vt_uid_aid WHERE uid='$uid'");
	while($row=mysqli_fetch_array($select)){
		array_push($result, $row["aid"]);
	}
	return $result;
}
?>