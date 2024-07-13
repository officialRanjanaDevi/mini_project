<?php
session_start();
if(!isset($_SESSION['login_status'])){
    echo"Login Skipped,Please login first!!";
    die;
}
if($_SESSION['login_status']==false){
  echo"Forbidden Access, Login first";
  die;
}
?>