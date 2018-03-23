<?php
include_once './Person.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Familiy
 *
 * @author mohamed
 */
class Familiy extends Person {
    private $name;
    //put your code here
    private $address;
    private $registerationDate;
    private $startDate;
        private $countryId;


    
    function getName() {
        return $this->name;
    }
    function setName($name) {
        $this->name = $name;
    }

            function getAddress() {
        return $this->address;
    }

    function getStartDate() {
        return $this->startDate;
    }

   

    function setAddress($address) {
        $this->address = $address;
    }

    function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }
    function getRegisterationDate() {
        return $this->registerationDate;
    }

    function setRegisterationDate($registerationDate) {
        $this->registerationDate = $registerationDate;
    }
     function getCountryId() {
        return $this->countryId;
    }
    function setCountryId($countryId) {
        $this->countryId = $countryId;
    }


}
