<?php

    require_once 'CrudOperations.php';
    
    $data = new CrudOperations();
    $employee = new Employee();
    
    $id = filter_input(INPUT_POST, 'employeeid');
    $firstname = filter_input(INPUT_POST, 'firstname');
    $lastname = filter_input(INPUT_POST, 'lastname');
    $middlename = filter_input(INPUT_POST, 'middlename');
    $gender = filter_input(INPUT_POST, 'gender');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    

    $employee->setId($id);
    $employee->setFirstname($firstname);
    $employee->setLastname($lastname);
    $employee->setMiddlename($middlename);
    $employee->setGender($gender);
    $employee->setPhone($phone);
    $employee->setEmail($email);
    

    if ($data->updateEmployee($employee)) {
        echo "<script type = 'text/javascript'>alert('Employee data successfully updated!')</script>";
        header("refresh:0; url = ../views/Backend.php");
    } else {
        echo "<script type = 'text/javascript'>alert('Employee data cannot be updated! Please try again')</script>";
        header("refresh:0; url = ../views/Backend.php");
    }

