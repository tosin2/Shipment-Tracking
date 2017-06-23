<?php

require_once 'DB_Connection.php';

$connect = new DB_Connection();
$connection = $connect->DB_Connect();
date_default_timezone_set("GMT");
$output = '';
if (!empty(filter_input(INPUT_POST, 'transaction_date'))){
    $query = $connection->prepare("SELECT * FROM shipment WHERE transaction_date = :transaction_date AND year = :year");
    $query->execute([
        'transaction_date' => filter_input(INPUT_POST, 'transaction_date'),
        'year' => date("Y")
    ]);
    
    if ($query->rowCount() > 0){
        $output .= '<h3 align = "center">Edit the fields to be updated</h3>';
        $output .= '<div class = "table-responsive">'
                . '<table class = "table table bordered"> ' 
                . '<tr>'
                . '<th style = "text-align: left">Transaction Date</th>'
                . '<th style = "text-align: left">Container ID</th>'
                . '<th style = "text-align: left">Shipping Date</th>'
                . '<th style = "text-align: left">Arrival Date</th>'
                . '</tr>'
                . '</table>';
        $counter = 1;
        while ($result = $query->fetch()){
            $output .= ''
                    . '<form class = "form-horizontal shippingForm" role = "form" name = "shippingUpdate'.$counter.'" id = "shippingUpdate'.$counter.'" action="../view-model/UpdateShipment.php" method="POST">'
                    . '<table class = "table table bordered">'
                    . '<tr>'
                    . '<input type = "hidden" name = "shipmentid" value = "'.$result['id'].'"/>'
                    . '<td><input type = "text" class = "form-control" name = "transaction" value = "'.$result['transaction_date'].'" readonly/></td>'
                    . '<td><input type = "text" class = "form-control" name = "containerid" value = "'.$result['containerid'].'" readonly/></td>'
                    . '<td><input type = "text" class = "form-control" name = "shipmentdate" value = "'.$result['shippingdate'].'"/></td>'
                    . '<td><input type = "text" class = "form-control" name = "arrivaldate" value = "'.$result['arrivaldate'].'"/></td>'
                    . '<td><button type = "submit" class = "btn btn-success updateButton" name = "update'.$counter.'" onclick = "updateRows();">Update</button></td>'
                    . '</tr>'
                    . '</table>'
                    . '</form>';
            $counter += 1;
        }
        
        $output .='</div>';
        
        echo $output;
    }
    
}

