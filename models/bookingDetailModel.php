<?php
class BookingDetail
{
    public $bookingDetailId, $bookingId, $roomId, $typeName, $checkInDate, $checkOutDate;

    public function __construct($bookingDetailId, $bookingId, $roomId, $typeName, $checkInDate, $checkOutDate)
    {
        $this->bookingDetailId = $bookingDetailId;
        $this->bookingId = $bookingId;
        $this->roomId = $roomId;
        $this->typeName = $typeName;
        $this->checkInDate = $checkInDate;
        $this->checkOutDate = $checkOutDate;
    }

    public static function add($bookingId, $roomId)
    {
        require("connection_connect.php");
        $sql = "insert into bookingdetail (booking_bookingId,rooms_roomId)
            values ($bookingId , $roomId)";
        $conn->query($sql);
        $lastId = $conn->insert_id;
        require("connection_close.php");
        return $lastId;
    }

    public static function update($bookingDetailId , $roomId){
        require("connection_connect.php");
        $sql = "UPDATE bookingdetail
                SET rooms_roomId = '$roomId'
                WHERE bookingdetail.bookingDetailId = '$bookingDetailId'";
        $result = $conn->query($sql);
        require("connection_close.php");
        return $result;
    }

    public static function delete($id){
        require("connection_connect.php");
        $sql = "DELETE FROM bookingdetail WHERE bookingDetailId = '$id'";
        $result = $conn->query($sql);
        require("connection_close.php");
        return $result;
    }
}
