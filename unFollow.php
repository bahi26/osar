<?php
session_start();
include './UserController.php';
 $id =$_GET['id'];
$country_id =$_GET['country'];
$lang =$_GET['lang'];
//echo $_SESSION['id'];
echo $country_id;

UserController::unFollow($id, $_SESSION['id']);

if($lang==2)
header("Location: favourite.php?id=".$country_id);
else
header("Location: favourite-ar.php?id=".$country_id);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

