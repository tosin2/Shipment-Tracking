<?php

/**
 * Description of Recipient
 *
 * @author ARTLIB
 */
class Recipient {
    
    private $id;
    private $firstname;
    private $lastname;
    private $middlename;
    private $country;
    private $phone;
    private $email;
    private $company;
    private $shippingHabour;
    private $agentId;
    
    public function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getAgentId() {
        return $this->agentId;
    }

    public function setAgentId($agentId) {
        $this->agentId = $agentId;
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

    public function getCompany() {
        return $this->company;
    }

    public function getShippingHabour() {
        return $this->shippingHabour;
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

    public function setCompany($company) {
        $this->company = $company;
    }

    public function setShippingHabour($shippingHabour) {
        $this->shippingHabour = $shippingHabour;
    }

}
