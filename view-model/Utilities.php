<?php

require_once 'DB_Connection.php';
/**
 * Description of Utilities
 *
 * @author ARTLIB
 */
class Utilities {
    
    public function isAdminAvailable() {
        $connect = new DB_Connection();
        $connection = $connect->DB_Connect();
        $query = $connection->prepare("SELECT * FROM admin");
        $query->execute();
        if ($query->rowCount() == 0){
            return false;
        }else {
           return true; 
        }
    }
}
