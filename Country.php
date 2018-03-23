<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of County
 *
 * @author mohamed
 */
class Country {

    private $id;
    private $name;
    private $flag;
    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getFlag() {
        return $this->flag;
    }
    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setFlag($flag) {
        $this->flag = $flag;
    }




}
