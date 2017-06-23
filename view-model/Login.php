<?php

require_once 'CrudOperations.php';

$data = new CrudOperations();

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

$data->loginUser($username, sha1($password));
