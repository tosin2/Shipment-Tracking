<?php
session_start();
require_once 'Imports.php';

/**
 * Description of CrudOperations
 *
 * @author ARTLIB
 */
class CrudOperations {
    
    public function insertAgent(Agent $agent) {
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("INSERT INTO agent(id, firstname, lastname, middlename, pin, country, phone, email) VALUES "
                . "(:id, :firstname, :lastname, :middlename, :pin, :country, :phone, :email)");
        $query->execute([
            'id' => $agent->getId(),
            'firstname' => $agent->getFirstname(),
            'lastname' => $agent->getLastname(),
            'middlename' => $agent->getMiddlename(),
            'pin' => $agent->getPin(),
            'country' => $agent->getCountry(),
            'phone' => $agent->getPhone(),
            'email' => $agent->getEmail()
        ]);
        return true;
    }
    
    public function insertContainer(Container $container){
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("INSERT INTO container(id, item1, item2, item3, item4, item5) VALUES "
                . "(:id, :item1, :item2, :item3, :item4, :item5)"); 
        $query->execute([
            'id' => $container->getId(),
            'item1' => $container->getItem1(),
            'item2' => $container->getItem2(),
            'item3' => $container->getItem3(),
            'item4' => $container->getItem4(),
            'item5' => $container->getItem5()
        ]);
        return true;
    }
    
    public function insertRecipient(Recipient $recipient) {
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("INSERT INTO recipient(id, firstname, lastname, middlename, country, phone, email, company, harbour, agentid) VALUES "
                . "(:id, :firstname, :lastname, :middlename, :country, :phone, :email, :company, :harbour, :agentid)");
        $query->execute([
            'id' => $recipient->getId(),
            'firstname' => $recipient->getFirstname(),
            'lastname' => $recipient->getLastname(),
            'middlename' => $recipient->getMiddlename(),
            'country' => $recipient->getCountry(),
            'phone' => $recipient->getPhone(),
            'email' => $recipient->getEmail(),
            'company' => $recipient->getCompany(),
            'harbour' => $recipient->getShippingHabour(),
            'agentid' => $recipient->getAgentId()
        ]);
        return true;
    }
    
    public function insertShipment(Shipment $shipment) {
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("INSERT INTO shipment(agentid, containerid, recipientid, transaction_date, year, shippingdate, arrivaldate) VALUES "
                . "(:agentid, :containerid, :recipientid, :transaction_date, :year, :shippingdate, :arrivaldate)");
        $query->execute([
            'agentid' => $shipment->getAgentId(),
            'containerid' => $shipment->getContainerId(),
            'recipientid' => $shipment->getRecipientId(),
            'shippingdate' => $shipment->getShippingDate(),
            'arrivaldate' => $shipment->getArrivalDate(),
            'transaction_date' => $shipment->getTransaction_date(),
            'year' => $shipment->getYear()
        ]);
        return true;
    }
    
    public function insertAdmin(Administrator $admin){
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("INSERT INTO admin(id, firstname, lastname, middlename, gender, phone, email, username, password) "
                . "VALUES(:id, :firstname, :lastname, :middlename, :gender, :phone, :email, :username, :password)");
        $query->execute([
            'id' => $admin->getId(),
            'firstname' => $admin->getFirstname(),
            'lastname' => $admin->getLastname(),
            'middlename' => $admin->getMiddlename(),
            'gender' => $admin->getGender(),
            'phone' => $admin->getPhone(),
            'email' => $admin->getEmail(),
            'username' => $admin->getUsername(),
            'password' => $admin->getPassword()
        ]);
        return true;
    }
    
    public function insertEmployee(Employee $employee){
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("INSERT INTO employee(id, firstname, lastname, middlename, gender, phone, email, username, password) "
                . "VALUES(:id, :firstname, :lastname, :middlename, :gender, :phone, :email, :username, :password)");
        $query->execute([
            'id' => $employee->getId(),
            'firstname' => $employee->getFirstname(),
            'lastname' => $employee->getLastname(),
            'middlename' => $employee->getMiddlename(),
            'gender' => $employee->getGender(),
            'phone' => $employee->getPhone(),
            'email' => $employee->getEmail(),
            'username' => $employee->getUsername(),
            'password' => $employee->getPassword()
        ]);
        return true;
    }
    
    public function insertLogin(Login $login) {
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("INSERT INTO login(userid, status) VALUES(:userid, :userid)");
        $query->execute([
            'userid' => $login->getUserid(),
            'status' => intval($login->getStatus())
        ]);
        return true;
    }
    
    public function loginUser($username, $password){
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
        $query->execute([
            'username' => $username,
            'password' => $password
        ]);
        if ($query->rowCount() != 0){
            while($result = $query->fetch()){
                $_SESSION['firstname'] = $result['firstname'];
                $_SESSION['status'] = 1;
            }
            header("Location:../views/Backend.php");
        } else {
            $query = $connection->prepare("SELECT * FROM employee WHERE username = :username AND password = :password");
            $query->execute([
                'username' => $username,
                'password' => $password
            ]);
            if ($query->rowCount() != 0){
                while($result = $query->fetch()){
                    $_SESSION['firstname'] = $result['firstname'];
                    $_SESSION['status'] = 0;
                }
                header("Location:../views/Backend.php");
            }  else {
                header("Location: ../index.php?login_error=1");
            }
        }
    }
    public function updateAdmin(Administrator $admin) {
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("UPDATE admin SET firstname = :firstname, lastname = :lastname, middlename = :middlename, gender = :gender, phone = :phone, email = :email "
                . "WHERE id = :id");
        $query->execute([
            'id' => $admin->getId(),
            'firstname' => $admin->getFirstname(),
            'lastname' => $admin->getLastname(),
            'middlename' => $admin->getMiddlename(),
            'gender' => $admin->getGender(),
            'phone' => $admin->getPhone(),
            'email' => $admin->getEmail()
        ]);
        return true;
    }
    
    public function updateEmployee(Employee $employee){
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("UPDATE employee SET firstname = :firstname, lastname = :lastname, middlename = :middlename, gender = :gender, phone = :phone, email = :email "
                . "WHERE id = :id");
        $query->execute([
            'id' => $employee->getId(),
            'firstname' => $employee->getFirstname(),
            'lastname' => $employee->getLastname(),
            'middlename' => $employee->getMiddlename(),
            'gender' => $employee->getGender(),
            'phone' => $employee->getPhone(),
            'email' => $employee->getEmail()
        ]);
        return true;
    }

    public function updateShipment(Shipment $shipment){
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("UPDATE shipment SET shippingdate = :shippingdate, arrivaldate = :arrivaldate "
                . "WHERE id = :id");
        $query->execute([
            'id' => $shipment->getId(),
            'shippingdate' => $shipment->getShippingDate(),
            'arrivaldate' => $shipment->getArrivalDate(),
            
        ]);
    }
}
