<?php 
    class Room{
        public $id; //roomId
        public $type; 
        public $price;
        public $detail; //detail
        public $roomStatus; //status

        public function __construct($id, $type, $detail,$roomStatus,$price) {
            $this->id = $id;
            $this->type = $type;
            $this->detail = $detail;
            $this->roomStatus = $roomStatus;
            $this->price = $price;

    }
        public static function getAll(){
            {
                $roomList = [];
                require("connection_connect.php");
                $sql = "SELECT r.roomId, t.typeName, t.price, r.roomStatus, GROUP_CONCAT(d.detailName SEPARATOR ', ') AS roomDetails FROM rooms r 
                        LEFT JOIN types t ON r.types_typeId = t.typeId 
                        LEFT JOIN roomDetail rd ON r.roomId = rd.rooms_roomId 
                        LEFT JOIN details d ON rd.details_detailId = d.detailId 
                        GROUP BY r.roomId;"; //เก็บเทเบิ้ลที่โชว์
                $result = $conn->query($sql);
                while ($my_row = $result->fetch_assoc()){
                    $id = $my_row['roomId'];
                    $type = $my_row['typeName'];
                    $detail = $my_row['roomDetails'];
                    $roomStatus = $my_row['roomStatus'];
                    $price = $my_row['price'];
                    $roomList[] = new Room($id, $type, $detail, $roomStatus, $price);
                }
                require("connection_close.php");
                return $roomList;
            }

        }
    }
?>