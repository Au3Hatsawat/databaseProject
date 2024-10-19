<?php
    class Room{
        public $roomId , $typeId , $roomStatus;

        public function __construct($roomId , $typeId , $roomStatus)
        {
            $this->roomId = $roomId;
            $this->typeId = $typeId;
            $this->roomStatus = $roomStatus;
        }

        public static function getAll(){
            
        }
    }
?>