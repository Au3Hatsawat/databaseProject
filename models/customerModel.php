<?php
    class Customer{
        public $customerId , $firstName , $lastName , $customerIdCard ,
            $phoneNo , $customerEmail;

        public function __construct($customerId , $firstName , $lastName , $customerIdCard ,
        $phoneNo , $customerEmail)
        {
            $this->customerId = $customerId;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->customerIdCard = $customerIdCard;
            $this->phoneNo = $phoneNo;
            $this->customerEmail = $customerEmail;
        }

        public static function add($firstName , $lastName , $customerIdCard ,
        $phoneNo , $customerEmail){
            require("connection_connect.php");
            $sql = "insert into customers (firstName,lastName,customerIdCard,phoneNo,customerEmail)
                    values('$firstName' , '$lastName' , '$customerIdCard' , '$phoneNo' , '$customerEmail')";
            $conn->query($sql);
            $lastId = $conn->insert_id;
            require("connection_close.php");
            return $lastId;
        }

        public static function get($firstName , $lastName){
            require("connection_connect.php");
            $sql = "select * from customers where firstName like '%$firstName%' and lastName like '%$lastName%'";
            $result = $conn->query($sql);
            $my_row = $result->fetch_assoc();
            $customerId = $my_row["customerId"];
            require("connection_close.php");
            return $customerId;
        }

        public static function update($customerId , $firstName , $lastName , $phoneNo , $customerEmail){
            require("connection_connect.php");
            $sql = "UPDATE customers
                    SET firstName = '$firstName', lastName = '$lastName', phoneNo = '$phoneNo', customerEmail='$customerEmail'
                    WHERE customerId = '$customerId'";
            $result = $conn->query($sql);
            require("connection_close.php");
            return $result;
        }
    }
?>