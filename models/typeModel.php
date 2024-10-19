<?php
    class Type{
        public $typeId , $typeName , $price;

        public function __construct($typeId , $typeName , $price)
        {
            $this->typeId = $typeId;
            $this->typeName = $typeName;
            $this->price = $price;
        }

        public static function getAll(){
            $typeList = [];
            require("connection_connect.php");
            $sql = "select * from types";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc()){
                $typeId = $my_row["typeId"];
                $typeName = $my_row["typeName"];
                $price = $my_row["price"];
                $typeList[] = new Type($typeId , $typeName , $price);
            }
            require("connection_close.php");

            return $typeList;
        }
    }
?>