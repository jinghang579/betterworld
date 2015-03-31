<?php
function get_all_blogs($conn){
	$result=array();
	$select=mysqli_query($conn,"SELECT * FROM vt_blog");
	while($row=mysqli_fetch_array($select)){
		$temp=array("id"=>$row["id"],"title"=>$row["BlogTile"],"image"=>$row["BlogImage"],"content"=>$row["BlogContent"]);
		array_push($result,$temp);
	}
	return $result;
}
?>