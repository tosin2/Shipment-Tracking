<?php

require_once 'CrudOperations.php';
require_once 'GenerateId.php';

$data = new CrudOperations();
$admin = new Administrator();
$generateId = new GenerateId();
$login = new Login();

$id = $generateId->generateAdminId();
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$middlename = filter_input(INPUT_POST, 'middlename');
$gender = filter_input(INPUT_POST, 'gender');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

$admin->setId($id);
$admin->setFirstname($firstname);
$admin->setLastname($lastname);
$admin->setMiddlename($middlename);
$admin->setGender($gender);
$admin->setPhone($phone);
$admin->setEmail($email);
$admin->setUsername($username);
$admin->setPassword(sha1($password));

$login->setUserid($id);
$login->setStatus("1");

if ($data->insertAdmin($admin)) {
    $data->insertLogin($login);
    echo 'Admin account has been successfully created. You will be redireced to the home page. Please standby...';
    header("refresh:4; url = ../index.php");
}
