<?php
    class Optional{
        public $optionalId , $bookingDetailId , $serviceId;

        public function __construct($optionalId , $bookingDetailId , $serviceId)
        {
            $this->optionalId = $optionalId;
            $this->bookingDetailId = $bookingDetailId;
            $this->serviceId = $serviceId;
        }

        public static function add(){
            require("connection_connect.php");
            $sql = "insert into optional (optionalId,bookingDetail_bookingDetailId,services_serviceId)
            values ($optionalId , $bookingDetailId , $serviceId)";
            $result = $conn->query($sql);
            require("connection_close.php");
            return $result;
        }
    }
?>