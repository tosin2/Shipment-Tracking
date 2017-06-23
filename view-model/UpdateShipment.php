<?php

require_once 'CrudOperations.php';

// Create objects
$data = new CrudOperations();
$shipment = new Shipment();

$shipmentDate = filter_input(INPUT_POST, 'shipmentdate');
$arrivalDate = filter_input(INPUT_POST, 'arrivaldate');
$shipmentid = filter_input(INPUT_POST, 'shipmentid');

$shipment->setShippingDate($shipmentDate);
$shipment->setArrivalDate($arrivalDate);
$shipment->setId($shipmentid);

$data->updateShipment($shipment);


