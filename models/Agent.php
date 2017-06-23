<?php

/**
 * Description of Agent
 *
 * @author ARTLIB
 */
class Agent {
    
    private $id;
    private $firstname;
    private $lastname;
    private $middlename;
    private $pin;
    private $country;
    private $phone;
    private $email;
    
    function __construct() {
        
    }
    public function getPin() {
        return $this->pin;
    }

    public function setPin($pin) {
        $this->pin = $pin;
    }

    public function getId() {
        return $this->id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getMiddlename() {
        return $this->middlename;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setMiddlename($middlename) {
        $this->middlename = $middlename;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

}
