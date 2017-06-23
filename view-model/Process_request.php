<?php

require_once 'DB_Connection.php';

$connect = new DB_Connection();
$connection = $connect->DB_Connect();

if (!empty(filter_input(INPUT_POST, 'username'))){
    $query = $connection->prepare("SELECT * FROM admin WHERE username = :username");
    $query->execute([
        'username' => filter_input(INPUT_POST, 'username')
    ]);
    $result = $query->fetch();
    
    echo json_encode(array("id" => $result['id'], "firstname" => $result['firstname'], "lastname" => $result['lastname'], "middlename" => $result['middlename'], "gender" => $result['gender'], "phone" => $result['phone'], "email" => $result['email']));
}

