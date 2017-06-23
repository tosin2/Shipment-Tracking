<?php
    //Class impports
    require_once 'CrudOperations.php';
    require_once '../fpdf17/fpdf.php';
    
    // Create objects of classes
    date_default_timezone_set("GMT");
    $connect = new DB_Connection();
    $connection = $connect->DB_Connect();
    $query = $connection->prepare("SELECT DISTINCT(CONCAT(agent.firstname,' ',agent.middlename,' ',agent.lastname)) AS agent_name, "
            . "CONCAT(recipient.firstname,' ',recipient.middlename,' ',recipient.lastname) AS recipient_name, "
            . "shipment.transaction_date AS tdate, shipment.containerid AS containerid, agent.country AS agent_country, recipient.country AS recipient_country "
            . "FROM agent, recipient, shipment, container WHERE agent.id = shipment.agentid AND container.id = shipment.containerid "
            . "AND recipient.id = shipment.recipientid AND shipment.year = :year AND shipment.transaction_date = :transaction_date GROUP BY shipment.id");
    $query->execute([
        'year' => date("Y"),
        'transaction_date' => filter_input(INPUT_POST, 'transaction_date')
    ]);
    
    $pdf = new FPDF();
    $pdf->AddPage("L");
    $pdf->SetFont("Arial", "", 14);
    date_default_timezone_set("GMT");
    $image = "../images/Mriver2.jpg";
    $pdf->Cell(40, 40, $pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false);
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(195, 10, "Mtrackers", 0, 1, "C");
    $pdf->Cell(0, 10, "AGENT DETAILS", 0, 1, "C");
    $pdf->Cell(0, 10, "".date("d/m/Y") . '  ' . date("h:i:sa"), 0, 1, "R");
    $pdf->Cell(0, 5, "", 0, 1);
    $pdf->Cell(55, 8, "AGENT", 1, 0, "C");
    $pdf->Cell(55, 8, "AGENT COUNTRY", 1, 0, "C");
    $pdf->Cell(55, 8, "RECIPIENT", 1, 0, "C");
    $pdf->Cell(55, 8, "RECIPIENT COUNTRY", 1, 0, "C");
    $pdf->Cell(28, 8, "CONTAINER", 1, 0, "C");
    $pdf->Cell(28, 8, "DATE", 1, 1, "C");
    
    if ($query->rowCount() > 0){
        while ($result = $query->fetch()){
            $pdf->Cell(55, 8, $result['agent_name'], 1, 0, "C");
            $pdf->Cell(55, 8, $result['agent_country'], 1, 0, "C");
            $pdf->Cell(55, 8, $result['recipient_name'], 1, 0, "C");
            $pdf->Cell(55, 8, $result['recipient_country'], 1, 0, "C");
            $pdf->Cell(28, 8, $result['containerid'], 1, 0, "C");
            $pdf->Cell(28, 8, $result['tdate'], 1, 1, "C");
        }
    }
    $pdf->Output();
    