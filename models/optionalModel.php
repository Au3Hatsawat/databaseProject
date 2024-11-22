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

        public static function update($bookingDetailId , $serviceId){
            require("connection_connect.php");
            $sql = "update optional
                    set services_serviceId = '$serviceId'
                    where bookingDetail_bookingDetailId = '$bookingDetailId'";
            $result = $conn->query($sql);
            require("connection_close.php");
            return $result;
        }
    }
?>