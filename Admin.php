<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author mohamed
 */
class Admin extends Person {

     private $first;
    private $last;
    private $priority;
    private $countryId;
    function __construct() {
        
    }

    function getFirst() {
        return $this->first;
    }

    function getLast() {
        return $this->last;
    }

    function getPriority() {
        return $this->priority;
    }
    function setFirst($first) {
        $this->first = $first;
    }

    function setLast($last) {
        $this->last = $last;
    }

    function setPriority($priority) {
        $this->priority = $priority;
    }
function setCountryId($id)
{
    $this->countryId=$id;

}
    function getCountryId()
{
    return $this->countryId;

}

}
