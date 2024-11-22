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
            $sql = "select * from rooms where types_typeId = $typeId";
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
            $sql = "select distinct booking.checkInDate , booking.checkOutDate , rooms.roomId from booking
inner join bookingdetail on bookingdetail.booking_bookingId = booking.bookingId
inner join rooms on bookingdetail.rooms_roomId != rooms.roomId
where rooms.roomId not in (select bookingdetail.rooms_roomId from bookingdetail) and
	booking.checkInDate between '$arrival' and '$departune' and
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

        
    }
?>