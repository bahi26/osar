<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author mohamed
 */
class Product {
    private $id;
    private $name;
    private $price;
    private $date;
    private $information;
    private $photo;
    private $video;
    private $familyId;
    private $state;
    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getPrice() {
        return $this->price;
    }

    function getDate() {
        return $this->date;
    }

    function getInformation() {
        return $this->information;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getVideo() {
        return $this->video;
    }

    function getFamilyId() {
        return $this->familyId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setInformation($information) {
        $this->information = $information;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setVideo($video) {
        $this->video = $video;
    }

    function setFamilyId($familyId) {
        $this->familyId = $familyId;
    }


    function setState($state) {
        $this->state = $state;
    }


    
}
