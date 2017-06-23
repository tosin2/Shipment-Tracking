<?php

require_once '../view-model/DB_Connection.php';

$connect = new DB_Connection();
$connection = $connect->DB_Connect();

$shipping_status = '';
$arrival_status = '';

    $query = $connection->prepare("SELECT shipment.shippingdate AS ship_date, shipment.arrivaldate AS arrival_date FROM shipment, agent "
            . "WHERE agent.id = shipment.agentid AND agent.pin = :pin");
    $query->execute([
        'pin' => 'OBIO0704'
    ]);
    
    $result = $query->fetch();
    
    if (!empty($result['ship_date']) && !empty($result['arrival_date'])){
     $shipping_status = "Shipping status: Your container was shipped on ".$result['ship_date'];
     $arrival_status = "Arrival Status: Your container has arrived at your port on ".$result['arrival_date'];
     }

     if (!empty($result['ship_date']) && empty($result['arrival_date'])){
         $shipping_status = "Your container was shipped on ".$result['ship_date'];
         $arrival_status = "Your container has not reached your port yet";
     }

     if (empty($result['ship_date'])) {
         $shipping_status = "Your container is yet to be shipped. Thank you";
         $arrival_status = "Not available";
     } 
     
     echo $shipping_status."<br>";
     echo $arrival_status;


