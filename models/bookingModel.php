<?php

class Booking{
    public $bookingId , $bookingDate , $checkInStatus , $checkOutStatus ,
    $checkInDate , $checkOutDate , $customerId , $registStaffId , $totalPrice;

    public function __construct($bookingId , $bookingDate , $checkInStatus , $checkOutStatus ,
    $checkInDate , $checkOutDate , $customerId , $registStaffId , $totalPrice)
    {
        $this->bookingId = $bookingId;
        $this->bookingDate = $bookingDate;
        $this->checkInStatus = $checkInStatus;
        $this->checkOutStatus = $checkOutStatus;
        $this->checkInDate = $checkInDate;
        $this->checkOutDate = $checkOutDate;
        $this->customerId = $customerId;
        $this->registStaffId =  $registStaffId;
        $this->totalPrice = $totalPrice;
    }

    public static function getAll(){
        $bookingList = [];
        require("connection_connect.php");
        $sql = "select * from booking";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc()){
            $bookingId = $my_row["bookingId"];
            $bookingDate = $my_row["bookingDate"];
            $checkInStatus = $my_row["checkInStatus"];
            $checkOutStatus = $my_row["checkOutStatus"];
            $checkInDate = $my_row["checkInDate"];
            $checkOutDate = $my_row["checkOutDate"];
            $customerId = $my_row["customers_customerId"];
            $registStaffId = $my_row["registStaff_registStaffId"]; 
            $totalPrice = $my_row["totalPrice"];
            $bookingList[] = new Booking($bookingId , $bookingDate , $checkInStatus , $checkOutStatus ,
                                        $checkInDate , $checkOutDate , $customerId , $registStaffId , $totalPrice);
        }
        require("connection_close.php");

        return $bookingList;
    }

}

?>