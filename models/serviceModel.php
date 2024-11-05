<?php
    class Service{
        public $serviceId , $serviceName , $servicePrice;

        public function __construct($serviceId , $serviceName , $servicePrice)
        {
            $this->serviceId = $serviceId;
            $this->serviceName = $serviceName;
            $this->servicePrice = $servicePrice;
        }

        public static function getAll(){
            $serviceList = [];
            require("connection_connect.php");
            $sql = "select * from services";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc()){
                $serviceId  = $my_row["serviceId"];
                $serviceName = $my_row["serviceName"];
                $servicePrice= $my_row["servicePrice"];
                $serviceList[] = new Service($serviceId , $serviceName , $servicePrice);
            }
            require("connection_close.php");

            return $serviceList;
        }

        public static function add($serviceName,$servicePrice){
            require("connection_connect.php");
            $sql = "INSERT INTO services(serviceName,servicePrice)
                    VALUES ('$serviceName','$servicePrice')";
            $result = $conn->query($sql);
            require("connection_close.php");
            return $result;
        }

        public static function update($serviceId,$serviceName,$servicePrice){
            require("connection_connect.php");
            $sql = "UPDATE services
                    SET serviceName = '$serviceName' , servicePrice = '$servicePrice'
                    WHERE serviceId = '$serviceId'";
            $result = $conn->query($sql);
            require("connection_close.php");
            return $result;
        }

        public static function delete($id){
            require("connection_connect.php");
            $sql = "DELETE FROM services WHERE serviceId = '$id'";
            $result = $conn->query($sql);
            require("connection_close.php");
            return $result;
        }
    }
?>