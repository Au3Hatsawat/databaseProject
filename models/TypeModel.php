<?php
    class Type{
        public $id, $name,$price;

        public function __construct($id,$name,$price){  
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
        }

        public static function getAll(){
            $typeList = [];
            require("connection_connect.php");
            $sql = "SELECT * FROM types";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc()){
                $id = $my_row['typeId'];
                $name = $my_row['typeName'];
                $price = $my_row['price'];
                $typeList[] = new Type($id,$name,$price);
            }
            require("connection_close.php");
            return $typeList;
        }
    }
?>