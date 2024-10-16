<?php
    class RoomController{
        public function index(){
            $roomList = Room::getAll();
            require_once('views/room/index_room.php');
    }
        public function detail(){
            $detailList =  Detail::getAll();
            require_once('views/room/detail_room.php');
        }

        public function type(){
            $typeList =  Type::getAll();
            require_once('views/room/Type_room.php');
        }
}
?>