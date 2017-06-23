<?php

require_once 'CrudOperations.php';

// Create objects of various classes
$data = new CrudOperations();
$admin = new Administrator();

$id = filter_input(INPUT_POST, 'admin_id');
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$middlename = filter_input(INPUT_POST, 'middlename');
$gender = filter_input(INPUT_POST, 'gender');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');


$admin->setId($id);
$admin->setFirstname($firstname);
$admin->setLastname($lastname);
$admin->setMiddlename($middlename);
$admin->setGender($gender);
$admin->setPhone($phone);
$admin->setEmail($email);

if ($data->updateAdmin($admin)) {
    echo "<script type = 'text/javascript'>alert('Admin data successfully updated!')</script>";
    header("refresh:0; url = ../views/Backend.php");
}else{
    echo "<script type = 'text/javascript'>alert('Admin data cannot be updated! Please try again')</script>";
    header("refresh:0; url = ../views/Backend.php");
}

