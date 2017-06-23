<?php

/**
 * Description of Shipment
 *
 * @author ARTLIB
 */

class Shipment {
    
    private $id;
    private $agentId;
    private $containerId;
    private $recipientId;
    private $shippingDate;
    private $arrivalDate;
    private $transaction_date;
    private $year;
    
    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getAgentId() {
        return $this->agentId;
    }

    public function getContainerId() {
        return $this->containerId;
    }

    public function getRecipientId() {
        return $this->recipientId;
    }

    public function getShippingDate() {
        return $this->shippingDate;
    }

    public function getArrivalDate() {
        return $this->arrivalDate;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setAgentId($agentId) {
        $this->agentId = $agentId;
    }

    public function setContainerId($containerId) {
        $this->containerId = $containerId;
    }

    public function setRecipientId($recipientId) {
        $this->recipientId = $recipientId;
    }

    public function setShippingDate($shippingDate) {
        $this->shippingDate = $shippingDate;
    }

    public function setArrivalDate($arrivalDate) {
        $this->arrivalDate = $arrivalDate;
    }
    
    public function getTransaction_date() {
        return $this->transaction_date;
    }

    public function getYear() {
        return $this->year;
    }

    public function setTransaction_date($transaction_date) {
        $this->transaction_date = $transaction_date;
    }

    public function setYear($year) {
        $this->year = $year;
    }

}
