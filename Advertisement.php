<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Advertisement
 *
 * @author mohamed
 */
class Advertisement {

    private $id;
    private $name;
    private $link;
    private $position;
    private $photo;
    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getLink() {
        return $this->link;
    }

    function getPosition() {
        return $this->position;
    }

    function getPhoto() {
        return $this->photo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setPosition($position) {
        $this->position = $position;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

        //put your code here
}
