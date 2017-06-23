<?php

require_once 'DB_Connection.php';

$connect = new DB_Connection();
$connection = $connect->DB_Connect();

$shipping_status = '';
$arrival_status = '';

if (!empty(filter_input(INPUT_POST, 'pin'))){
    $query = $connection->prepare("SELECT shipment.shippingdate AS ship_date, shipment.arrivaldate AS arrival_date FROM shipment, agent "
            . "WHERE agent.id = shipment.agentid AND agent.pin = :pin");
    $query->execute([
        'pin' => filter_input(INPUT_POST, 'pin')
    ]);
    
    $result = $query->fetch();
    
    if (!empty($result['ship_date']) && !empty($result['arrival_date'])){
     $shipping_status = "Shipping status: Your container was shipped on ".$result['ship_date'];
     $arrival_status = "Arrival Status: It has arrived at your port on ".$result['arrival_date'];
     }

     if (!empty($result['ship_date']) && empty($result['arrival_date'])){
         $shipping_status = "Shipping status: Your container was shipped on ".$result['ship_date'];
         $arrival_status = "Arrival Status: It has not reached your port yet";
     }

     if (empty($result['ship_date'])) {
         $shipping_status = "Shipping status: Your container is yet to be shipped. Thank you";
         $arrival_status = "Arrival Status: Not available";
     } 
     
    echo json_encode(array("shipping_status" => $shipping_status, "arrival_status" => $arrival_status));
}

