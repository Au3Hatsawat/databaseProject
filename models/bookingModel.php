<?php

class Booking{
    public $bookingId , $bookingDate , $checkInStatus , $checkOutStatus ,
    $checkInDate , $checkOutDate , $customerId , $registStaffId , $totalPrice , 
    $customerName , $staffName;

    public function __construct($bookingId , $bookingDate , $checkInStatus , $checkOutStatus ,
    $checkInDate , $checkOutDate , $customerId , $registStaffId , $totalPrice , $customerName , $staffName)
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
        $this->customerName = $customerName;
        $this->staffName = $staffName;
    }

    public static function getAll(){
        $bookingList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM booking INNER JOIN customers ON customers.customerId = booking.customers_customerId INNER JOIN registstaff ON registstaff.registStaffId = booking.registStaff_registStaffId INNER JOIN staffs ON staffs.staffId = registstaff.staffs_staffId";
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
            $customerName = $my_row["firstName"] . " " . $my_row["lastName"];
            $staffName = $my_row["staffFristName"] . " " . $my_row["staffLastName"];
            $bookingList[] = new Booking($bookingId , $bookingDate , $checkInStatus , $checkOutStatus ,
                                        $checkInDate , $checkOutDate , $customerId , $registStaffId , $totalPrice ,
                                         $customerName ,$staffName);
        }
        require("connection_close.php");

        return $bookingList;
    }

    public static function add($checkInDate,$checkOutDate,$customerId,$registStaffId,$totalPrice){
        require("connection_connect.php");
        $todaydate = date("Y-m-d h:i:sa");
        $sql = "insert into booking (bookingDate,checkInDate,checkOutDate,customers_customerId,registStaff_registStaffId,totalPrice)
        values ('$todaydate','$checkInDate','$checkOutDate','$customerId','$registStaffId','$totalPrice')";
        $conn->query($sql);
        $lastId = $conn->insert_id;
        require("connection_close.php");
        return $lastId;
    }

}

?>