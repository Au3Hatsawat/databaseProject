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
    }
?>