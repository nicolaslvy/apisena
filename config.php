<?php
class Database{
    private $db_host = 'baxnw3ht0jk80jzawysa-mysql.services.clever-cloud.com';
    private $db_name = 'baxnw3ht0jk80jzawysa';
    private $db_username = 'uomnoeatzpan83cb';
    private $db_password = 'VWoXk8AYY2VOQn2BhjtP';

    public function dbConnection(){
        try{
            $conn = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name,$this->db_username,$this->db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e){
            echo "Connection error ".$e->getMessage();
        }
            
    }
}
?>
