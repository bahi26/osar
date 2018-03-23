<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author mohamed
 */
class Person {

    protected $id;
    protected $email;
    protected $password;
    protected $photo;
    protected $phone;
    function __construct() {
        
    }
    function setPhone($phone) {
        $this->phone = $phone;
    }

         function getPhone() {
        return $this->phone;
    }
    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    

        function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getPhoto() {
        return $this->photo;
    }

    


}
