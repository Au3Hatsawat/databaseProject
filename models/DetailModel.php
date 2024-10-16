<?php
    class Detail{
        public $id, $name;

        public function __construct($id, $name){
            $this->id = $id;
            $this->name = $name;
        }

        public static function getAll(){
            $detailList = [];
            require("connection_connect.php");
            $sql = "select * from details";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc()){
                $id = $my_row['detailId'];
                $name = $my_row['detailName'];
                $detailList[] = new Detail($id, $name);
            }
            require("connection_close.php");
            return $detailList;
    }

}
?>