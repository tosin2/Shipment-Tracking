<?php

    require_once 'CrudOperations.php';
    require_once 'GenerateId.php';
    
    // Create objects
    $data = new CrudOperations();
    $generateId = new GenerateId();
    $shipment = new Shipment();
    $agent = new Agent();
    $recipient = new Recipient();
    $container = new Container();
    
    date_default_timezone_set("GMT");
    $year = date("Y");
    
    // Get posted values from html form
    $agentId = trim($generateId->generateAgentId());
    $agentFirstname = filter_input(INPUT_POST, 'firstname');
    $agentLastname = filter_input(INPUT_POST, 'lastname');
    $agentMiddlename = filter_input(INPUT_POST,'middlename');
    $agentCountry = filter_input(INPUT_POST, 'agent_country');
    $agentPhone = filter_input(INPUT_POST, 'phone');
    $agentEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $PIN = strtoupper(substr($agentFirstname, 1, 1)) . strtoupper(substr($agentLastname, -3)) . date("hm");
    
    $containerId = filter_input(INPUT_POST, 'containerid');
    $shippingDate = filter_input(INPUT_POST, 'shipping_date');
    $item1 = filter_input(INPUT_POST, 'item_one');
    $item2 = filter_input(INPUT_POST, 'item_two');
    $item3 = filter_input(INPUT_POST, 'item_three');
    $item4 = filter_input(INPUT_POST, 'item_four');
    $item5 = filter_input(INPUT_POST, 'item_five');
    
    $recipientId = trim($generateId->generateRecipientId());
    $recipientFirstname = filter_input(INPUT_POST, 'recipientFirstname');
    $recipientLastname = filter_input(INPUT_POST, 'recipientLastname');
    $recipientMiddlename = filter_input(INPUT_POST, 'recipientMiddlename');
    $recipientCountry = filter_input(INPUT_POST, 'recipient_country');
    $recipientPhone = filter_input(INPUT_POST, 'recipientPhone');
    $recipientEmail = filter_input(INPUT_POST, 'recipientEmail', FILTER_VALIDATE_EMAIL);
    $recipientCompany = filter_input(INPUT_POST, 'company');
    $recipientHarbour = filter_input(INPUT_POST, 'shippingharbour');
    
    // Set agent variables
    $agent->setId($agentId);
    $agent->setFirstname($agentFirstname);
    $agent->setLastname($agentLastname);
    $agent->setMiddlename($agentMiddlename);
    $agent->setCountry($agentCountry);
    $agent->setPhone($agentPhone);
    $agent->setEmail($agentEmail);
    $agent->setPin($PIN);
    
    // Set shipment variables
    $shipment->setAgentId($agentId);
    $shipment->setContainerId($containerId);
    $shipment->setRecipientId($recipientId);
    $shipment->setTransaction_date($shippingDate);
    $shipment->setYear($year);
    $shipment->setShippingDate("");
    $shipment->setArrivalDate("");
    
    // Set recipient variables
    $recipient->setId($recipientId);
    $recipient->setAgentId($agentId);
    $recipient->setFirstname($recipientFirstname);
    $recipient->setLastname($recipientLastname);
    $recipient->setMiddlename($recipientMiddlename);
    $recipient->setCompany($recipientCompany);
    $recipient->setCountry($recipientCountry);
    $recipient->setEmail($recipientEmail);
    $recipient->setPhone($recipientPhone);
    $recipient->setShippingHabour($recipientHarbour);
    
    // Set container vvariables
    $container->setId($containerId);
    $container->setItem1($item1);
    $container->setItem2($item2);
    $container->setItem3($item3);
    $container->setItem4($item4);
    $container->setItem5($item5);
    
    // Save data to various
    if (!$data->insertAgent($agent)) {
        header("Location: ../views/ShippingForm.php?cannot_save_agent=1");
    }
    if (!$data->insertContainer($container)) {
        header("Location: ../views/ShippingForm.php?cannot_save_container=1");
    }
    if (!$data->insertRecipient($recipient)) {
        header("Location: ../views/ShippingForm.php?cannot_save_recipient=1");
    }
    if (!$data->insertShipment($shipment)) {
        header("Location: ../views/ShippingForm.php?cannot_save_shipment=1");
    }
    
    echo 'Your PIN is '.$PIN."<br>";
    echo 'Please share it with the recipient of this container'."<br>".'This page will redirect to home in 15 seconds';
    
    header("refresh:15; url = ../index.php?shipment_success=1");
    