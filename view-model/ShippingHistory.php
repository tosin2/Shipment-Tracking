<?php

    //Class impports
    require_once 'CrudOperations.php';
    require_once '../fpdf17/fpdf.php';
    
    // Create objects of classes
    date_default_timezone_set("GMT");
    $connect = new DB_Connection();
    $connection = $connect->DB_Connect();
    $query = $connection->prepare("SELECT agent.id AS agent_id, container.id AS  containerid, shipment.transaction_date AS tdate, "
            . "shipment.shippingdate AS shipdate, shipment.arrivaldate AS arrival_date, shipment.id AS shipment_id FROM agent, shipment, container "
            . "WHERE agent.id = shipment.agentid AND container.id = shipment.containerid AND "
            . "shipment.transaction_date = :transaction_date AND shipment.year = :year GROUP BY shipment.id");
    $query->execute([
        'year' => date("Y"),
        'transaction_date' => filter_input(INPUT_POST, 'transaction_date')
    ]);
    
    $pdf = new FPDF();
    $pdf->AddPage("P");
    $pdf->SetFont("Arial", "", 14);
    date_default_timezone_set("GMT");
    $image = "../images/Mriver2.jpg";
    $pdf->Cell(40, 40, $pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false);
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(110, 10, "Mtrackers", 0, 1, "C");
    $pdf->Cell(0, 10, "SIPPING HISTORY", 0, 1, "C");
    $pdf->Cell(0, 10, "".date("d/m/Y") . '  ' . date("h:i:sa"), 0, 1, "R");
    $pdf->Cell(0, 5, "", 0, 1);
    $pdf->Cell(15, 8, "NO.", 1, 0, "C");
    $pdf->Cell(35, 8, "AGENT ID", 1, 0, "C");
    $pdf->Cell(35, 8, "CONTAINER ID", 1, 0, "C");
    $pdf->Cell(35, 8, "TRANS. DATE", 1, 0, "C");
    $pdf->Cell(35, 8, "SHIPPING DATE", 1, 0, "C");
    $pdf->Cell(35, 8, "ARRIVAL DATE", 1, 1, "C");
    
    
    if ($query->rowCount() > 0){
        while ($result = $query->fetch()){
            $pdf->Cell(15, 8, $result['shipment_id'], 1, 0, "C");
            $pdf->Cell(35, 8, $result['agent_id'], 1, 0, "C");
            $pdf->Cell(35, 8, $result['containerid'], 1, 0, "C");
            $pdf->Cell(35, 8, $result['tdate'], 1, 0, "C");
            $pdf->Cell(35, 8, $result['shipdate'], 1, 0, "C");
            $pdf->Cell(35, 8, $result['arrival_date'], 1, 1, "C");
            
        }
    }
    $pdf->Output();

