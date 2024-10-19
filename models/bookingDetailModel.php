<?php
    class BookingDetail{
        public $bookingDetailId , $bookingId , $roomId;
        
        public function __construct($bookingDetailId , $bookingId , $roomId)
        {
            $this->bookingDetailId = $bookingDetailId;
            $this->bookingId = $bookingId;
            $this->roomId = $roomId;
        }

        public static function add($bookingDetailId , $bookingId , $roomId){
            require("connection_connect.php");
            $sql = "insert into bookingdetail (bookingDetailId,booking_bookingId,rooms_roomId)
            values ($bookingDetailId , $bookingId , $roomId)";
            $result = $conn->query($sql);
            require("connection_close.php");
            return "add success $result rows";
        }


    }
?>