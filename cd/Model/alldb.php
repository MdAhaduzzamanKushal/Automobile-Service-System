<?php
require_once('db.php');

function getAll(){
	$con=getConnection();
	$sql='select * from auth';
	$res=mysqli_query($con,$sql);
	return $res;
	
}

function auth($id,$pass)
{
	$con=getConnection();
	$sql="select * from auth where Id='$id' and Pass='$pass'";
	$res=mysqli_query($con,$sql);
	return $res;
}

?>