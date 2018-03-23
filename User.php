<?php
include 'Person.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author mohamed
 */
class User extends Person {
    private $first;
    private $last;
    private $address;
    private $birthDate;
           
    
    

            function getFirst() {
        return $this->first;
    }

    function getLast() {
        return $this->last;
    }

    function getAddress() {
        return $this->address;
    }

    function getBirthDate() {
        return $this->birthDate;
    }
    function setFirst($first) {
        $this->first = $first;
    }

    function setLast($last) {
        $this->last = $last;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;
    }



}
