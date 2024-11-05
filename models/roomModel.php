<?php
    class Room{
        public $roomId , $typeId , $roomStatus , $checkInDate , $checkOutDate;

        public function __construct($roomId , $typeId , $roomStatus)
        {
            $this->roomId = $roomId;
            $this->typeId = $typeId;
            $this->roomStatus = $roomStatus;
        }

        public static function get($typeId){
            require("connection_connect.php");
            $sql = "SELECT * FROM rooms WHERE types_typeId = $typeId";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc()){
                $roomId = $my_row["roomId"];
                break;
            }
            require("connection_close.php");
            return $roomId;
        }


        public static function getAvailableRoom($arrival , $departune , $typeId){
            require("connection_connect.php");
            $sql = "SELECT DISTINCT booking.checkInDate , booking.checkOutDate , rooms.roomId FROM booking
INNER JOIN bookingdetail ON bookingdetail.booking_bookingId = booking.bookingId
INNER JOIN rooms ON bookingdetail.rooms_roomId != rooms.roomId
WHERE rooms.roomId NOT IN (SELECT bookingdetail.rooms_roomId FROM bookingdetail) AND
	booking.checkInDate >= '$arrival' AND
    booking.checkOutDate <= '$departune' AND
    rooms.types_typeId = $typeId";
            $result = $conn->query($sql);
            $roomId = null;
            while($my_row = $result->fetch_assoc()){
                $roomId = $my_row["roomId"];
                break;
            }
            require("connection_close.php");
            return $roomId;
        }

        public static function getNoVacancies($typeId){
            require("connection_connect.php");
            $sql = "SELECT DATE(booking.checkInDate) , DATE(booking.checkOutDate) , 
COUNT(rooms.roomId)
FROM booking
INNER JOIN bookingdetail ON bookingdetail.booking_bookingId = booking.bookingId
INNER JOIN rooms ON bookingdetail.rooms_roomId = rooms.roomId
WHERE rooms.types_typeId = 2
GROUP BY DATE(booking.checkInDate)";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc()){
            }
        }
    }
?>