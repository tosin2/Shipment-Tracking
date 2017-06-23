<?php

/**
 * Description of DB_Connection
 *
 * @author ARTLIB
 */
class DB_Connection {
    
    public function DB_Connect() {
        try {
            $connection = new PDO("mysql:host=localhost;dbname=mtrackers", "root", "");
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (Exception $e) {
            die("Error: ".$e->getMessage());
        }
    }
}
