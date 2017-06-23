<?php

/**
 * Description of Login
 *
 * @author ARTLIB
 */
class Login {
    
    private $loginid;
    private $userid;
    private $status;
    
    public function __construct() {
        
    }
    
    public function getLoginid() {
        return $this->loginid;
    }

    public function getUserid() {
        return $this->userid;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setLoginid($loginid) {
        $this->loginid = $loginid;
    }

    public function setUserid($userid) {
        $this->userid = $userid;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
