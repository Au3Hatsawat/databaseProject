<?php

class Booking
{
    public $bookingId, $bookingDate, $checkInStatus, $checkOutStatus,
        $checkInDate, $checkOutDate, $customerId, $registStaffId, $totalPrice,
        $customerName, $staffName;

    public function __construct(
        $bookingId,
        $bookingDate,
        $checkInStatus,
        $checkOutStatus,
        $checkInDate,
        $checkOutDate,
        $customerId,
        $registStaffId,
        $totalPrice,
        $customerName,
        $staffName
    ) {
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


    public static function add($checkInDate, $checkOutDate, $customerId, $registStaffId, $totalPrice)
    {
        require("connection_connect.php");
        $todaydate = date("Y-m-d H:i:s");
        $sql = "insert into booking (bookingDate,checkInDate,checkOutDate,customers_customerId,registStaff_registStaffId,totalPrice)
        values ('$todaydate','$checkInDate','$checkOutDate',$customerId,$registStaffId,$totalPrice)";
        $conn->query($sql);
        $lastId = $conn->insert_id;
        require("connection_close.php");
        return $lastId;
    }

    public static function delete($id){
        require("connection_connect.php");
        $sql = "delete from booking where booking.bookingId = $id";
        $result = $conn->query($sql);
        require("connection_close.php");
        return $result;
    }

    public static function update($bookingId,$checkInDate , $checkOutDate , $customerId , $registStaffId , $totalPrice){
        require("connection_connect.php");
        $sql = "update booking
                set checkInDate = '$checkInDate', checkOutDate = '$checkOutDate' , customers_customerId = $customerId ,
                    registStaff_registStaffId = $registStaffId , totalPrice = $totalPrice
                where booking.bookingId = $bookingId";
        $result = $conn->query($sql);
        require("connection_close.php");
        return $result;
    }

    public static function updateStatus($bookingId,$checkInStatus,$checkOutStatus){
        require("connection_connect.php");
        $sql = "update booking
                set checkInStatus = '$checkInStatus' , checkOutStatus = '$checkOutStatus'
                where bookingId = '$bookingId'";
        $result = $conn->query($sql);
        require("connection_close.php");
        return $result;
    }
}
