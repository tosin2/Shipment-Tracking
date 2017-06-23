<?php

require_once 'DB_Connection.php';
/**
 * Description of GenerateId
 *
 * @author ARTLIB
 */
class GenerateId {
    
    public function generateAgentId() {
        $prefix = "0000";
        $id = 1;
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("SELECT id FROM agent");
        $query->execute();
        $counter = 1;
        if ($query->rowCount() != 0) {
            while ($result = $query->fetch()) {
                $counter += 1;
            }
            return $prefix.$counter;
        } else {
            return $prefix.$id;
        }
        
    }
    
    public function generateRecipientId() {
        $prefix = "0000";
        $id = 1;
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("SELECT id FROM recipient");
        $query->execute();
        $counter = 1;
        if ($query->rowCount() != 0) {
            while ($result = $query->fetch()) {
                $counter += 1;
            }
            return $prefix.$counter;
        } else {
            return $prefix.$id;
        }
    }
    
    public function generateAdminId() {
        $prefix = "A0000";
        $id = 1;
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("SELECT id FROM admin");
        $query->execute();
        $counter = 1;
        if ($query->rowCount() != 0) {
            while ($result = $query->fetch()) {
                $counter += 1;
            }
            return $prefix.$counter;
        } else {
            return $prefix.$id;
        }
    }
    
    public function generateEmployeeId() {
        $prefix = "E0000";
        $id = 1;
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("SELECT id FROM employee");
        $query->execute();
        $counter = 1;
        if ($query->rowCount() != 0) {
            while ($result = $query->fetch()) {
                $counter += 1;
            }
            return $prefix.$counter;
        } else {
            return $prefix.$id;
        }
    }
}
