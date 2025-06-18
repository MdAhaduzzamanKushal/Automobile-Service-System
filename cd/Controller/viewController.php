<?php
session_start(); 
require_once('../Model/alldb.php');
$res=getAll();
if($res)
{
	header('location:../View/user.php');
}
else
{
	$_SESSION['error']="No User";
       header('location:../View/homeView.php');
}


?>