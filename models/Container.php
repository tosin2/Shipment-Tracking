<?php

/**
 * Description of Container
 *
 * @author ARTLIB
 */
class Container {
    
    private $id;
    private $item1;
    private $item2;
    private $item3;
    private $item4;
    private $item5;
    
    public function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getItem1() {
        return $this->item1;
    }

    public function getItem2() {
        return $this->item2;
    }

    public function getItem3() {
        return $this->item3;
    }

    public function getItem4() {
        return $this->item4;
    }

    public function getItem5() {
        return $this->item5;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setItem1($item1) {
        $this->item1 = $item1;
    }

    public function setItem2($item2) {
        $this->item2 = $item2;
    }

    public function setItem3($item3) {
        $this->item3 = $item3;
    }

    public function setItem4($item4) {
        $this->item4 = $item4;
    }

    public function setItem5($item5) {
        $this->item5 = $item5;
    }

}
