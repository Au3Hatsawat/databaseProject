<?php
    class BookingDetail{
        public $bookingDetailId , $bookingId , $roomId , $typeName , $checkInDate , $checkOutDate;
        
        public function __construct($bookingDetailId , $bookingId , $roomId , $typeName , $checkInDate , $checkOutDate)
        {
            $this->bookingDetailId = $bookingDetailId;
            $this->bookingId = $bookingId;
            $this->roomId = $roomId;
            $this->typeName = $typeName;
            $this->checkInDate = $checkInDate;
            $this->checkOutDate = $checkOutDate;
        }

        public static function add($bookingDetailId , $bookingId , $tpyeName , $checkInDate , $checkOutDate){
            require("connection_connect.php");
            $sql = "insert into bookingdetail (bookingDetailId,booking_bookingId,rooms_roomId)
            values ($bookingDetailId , $bookingId , $roomId)";
            $result = $conn->query($sql);
            require("connection_close.php");
            return "add success $result rows";
        }

        public static function getAll(){
                $bookingDetailList = [];
                require("connection_connect.php");
                $sql = "SELECT booking.bookingId , bookingdetail.bookingDetailId , rooms.roomId , types.typeName , booking.checkInDate ,booking.checkOutDate from `booking` 
        INNER JOIN bookingdetail ON bookingdetail.booking_bookingId = booking.bookingId
        INNER JOIN rooms ON bookingdetail.rooms_roomId = rooms.roomId
        INNER JOIN types ON types.typeId = rooms.types_typeId
GROUP BY booking.bookingId";
                $result = $conn->query($sql);

        }
    }
?>