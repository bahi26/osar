<?php
include_once './Database.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdvertisementController
 *
 * @author mohamed
 */
class AdvertisementController {
    public static function addAdvertisement($name, $link, $photo, $id, $position)
    {
        Database::insertAdvertisement($name, $link, $photo, $id, $position);
    }
    //put your code here
}
