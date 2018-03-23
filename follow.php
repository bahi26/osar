<?php
session_start();
include './UserController.php';
 $id =$_GET['id'];
echo $_SESSION['id'];
echo $id;
UserController::addFllow($id, $_SESSION['id']);

header("Location: ./HSecondEnglish-Home.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

