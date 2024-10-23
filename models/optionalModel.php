<?php
    class Optional{
        public $optionalId , $bookingDetailId , $serviceId;

        public function __construct($optionalId , $bookingDetailId , $serviceId)
        {
            $this->optionalId = $optionalId;
            $this->bookingDetailId = $bookingDetailId;
            $this->serviceId = $serviceId;
        }

        public static function add($bookingDetailId , $serviceId){
            require("connection_connect.php");
            $sql = "insert into optional (bookingDetail_bookingDetailId,services_serviceId)
            values ($bookingDetailId , $serviceId)";
            $result = $conn->query($sql);
            require("connection_close.php");
            return $result;
        }
    }
?>