<?php
include_once './Database.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FamilyController
 *
 * @author mohamed
 */
class UserController {
    public static function addFllow($idf,$idu)
    {
       Database::insertFollow($idu,$idf);
        
}
public static function checkFollow($idUs, $idFam)
{
    return Database::selectFollow($idUs, $idFam)>0;
}
public static function unFollow($idf,$idu)
{
    Database::deletefollow($idu, $idf);
}
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

