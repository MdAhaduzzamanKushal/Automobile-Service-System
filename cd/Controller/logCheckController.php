<?php
session_start();
require_once('../Model/alldb.php');
  if(isset($_POST['login']))
  {
    $id=$_POST['id'];
    $pass=$_POST['pass'];

    if(empty($id||$pass))
    {
       $_SESSION['error']="Id Or Pass empty";
       header('location:../View/homeView.php');
    }
    else
    {
       $a=auth($id,$pass);
      if(mysqli_num_rows($a)==1)
      {
        $_SESSION['user']=$id;
         header('location:../View/user.php');
      }
      else
      {
        $_SESSION['error']="Invalid Id or Pass";
       header('location:../View/homeView.php');

      }
      
    }
  }
?>