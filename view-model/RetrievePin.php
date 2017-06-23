<?php

    // Imports
    require_once 'CrudOperations.php';
    
    // Create objects
    $connect = new DB_Connection();
    $connection = $connect->DB_Connect();
    
    $name = '';
    $pin = '';
    
    if (!empty(filter_input(INPUT_POST, 'email'))){
        $query = $connection->prepare("SELECT * FROM agent WHERE email = :email");
        $query->execute([
            'email' => filter_input(INPUT_POST, 'email')
        ]);

        if ($query->rowCount() != 0) {
            $result = $query->fetch();
            $name = 'Agent name: '.$result['firstname'].' '.$result['middlename'].' '.$result['lastname'];
            $pin = 'PIN: '.$result['pin'];
        } else {
            $query = $connection->prepare("SELECT recipient.firstname as fname, recipient.middlename as mname, recipient.lastname as lname, "
                    . "agent.pin as apin, recipient.email FROM agent, recipient WHERE agent.id = recipient.agentid AND recipient.email = :email");
            $query->execute([
                'email' => filter_input(INPUT_POST, 'email')
            ]);
            if ($query->rowCount() != 0) {
                $result = $query->fetch();
                $name = 'Recipient name: '.$result['fname'].' '.$result['mname'].' '.$result['lname'];
                $pin = 'PIN: '.$result['apin'];
            } else {
                $name = 'Recipient name: Your details cannot be found';
                $pin = 'PIN: Not available';
            }
        }
         echo json_encode(array("agent_name" => $name, "agent_pin" => $pin));
    }

