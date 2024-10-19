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

        public static function add($customerId , $firstName , $lastName , $customerIdCard ,
        $phoneNo , $customerEmail){
            require("connection_connect.php");
            $sql = "insert into customers (customerId,firstName,lastName,customerIdCard,phoneNo,customerEmail)
                    values($customerId , '$firstName' , '$lastName' , '$customerIdCard' , '$phoneNo' , '$customerEmail')";
            $result = $conn->query($sql);
            require("connection_close.php");
            return "add success $result rows";
        }
    }
?>