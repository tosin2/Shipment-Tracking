<?php


/**
 * Description of Employee
 *
 * @author ARTLIB
 */
class Employee {
    
    private $id;
    private $firstname;
    private $lastname;
    private $middlename;
    private $gender;
    private $phone;
    private $email;
    private $username;
    private $password;
    
    public function __construct() {
        
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

    public function getGender() {
        return $this->gender;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
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

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

}
