<?php

require_once 'CrudOperations.php';
require_once 'GenerateId.php';

$data = new CrudOperations();
$admin = new Administrator();
$generateId = new GenerateId();
$login = new Login();
$employee = new Employee();


$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$middlename = filter_input(INPUT_POST, 'middlename');
$gender = filter_input(INPUT_POST, 'gender');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$status = filter_input(INPUT_POST, 'status');
    
switch ($status) {
    case "Admin":
        $id = $generateId->generateAdminId();
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
            header("Location: ../views/Backend.php?admin_saved=1");
        }  else {
           echo "cannot save admin"; 
        }
        break;
    case "Employee":
        $id = $generateId->generateEmployeeId();
        $employee->setId($id);
        $employee->setFirstname($firstname);
        $employee->setLastname($lastname);
        $employee->setMiddlename($middlename);
        $employee->setGender($gender);
        $employee->setPhone($phone);
        $employee->setEmail($email);
        $employee->setUsername($username);
        $employee->setPassword(sha1($password));

        $login->setUserid($id);
        $login->setStatus("0");

        if ($data->insertEmployee($employee)) {
            $data->insertLogin($login);
            header("Location: ../views/Backend.php?employee_saved=1");
        }  else {
            echo "Cannot save employee";
        }
        break;

    default:
        echo "Invalid option";
        break;
}




