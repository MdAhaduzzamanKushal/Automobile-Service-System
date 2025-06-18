<?php

function getConnection()
{
  $serverName="localhost";
  $userName="root";
  $password="";
  $dbName="demoDb";
  $con=new mysqli( $serverName,$userName,$password,$dbName);
  return $con;
}
  


?>