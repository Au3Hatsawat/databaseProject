<?php
class BookingDetailDTO
{
    public $bookingId, $bookingDate, $checkInStatus, $checkOutStatus,
        $checkInDate, $checkOutDate, $customerId, $registStaffId, $totalPrice,
        $customerName, $staffName;
    public $bookingDetailId, $amountRoom, $typeName;
    public $servicesList , $serviceIdList , $servicePriceList;
    public $customerEmail , $customerPhoneNum;
    public $typePrice , $typeId;

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
        $staffName,
        $amountRoom,
        $typeName,
        $customerEmail , 
        $customerPhoneNum,
        $typePrice, 
        $typeId,
        array $bookingDetailIdList,
        array $servicesList,
        array $serviceIdList , 
        array $servicePriceList
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
        $this->bookingDetailId = $bookingDetailIdList; // array
        $this->amountRoom = $amountRoom;
        $this->typeName = $typeName;
        $this->servicesList = $servicesList; // 
        $this->customerEmail = $customerEmail;
        $this->customerPhoneNum = $customerPhoneNum;
        $this->typePrice = $typePrice;
        $this->typeId = $typeId;
        $this->serviceIdList = $serviceIdList ; //array
        $this->servicePriceList = $servicePriceList; //array
    }

    public static function getAll()
    {
        $servicesList = [];
        require("connection_connect.php");
        $sql = "SELECT booking.* , customers.* , staffs.* , types.* , COUNT(DISTINCT bookingdetail.bookingDetailId) as amountRooms FROM booking
                INNER JOIN bookingdetail ON bookingdetail.booking_bookingId = booking.bookingId
                INNER JOIN rooms ON rooms.roomId = bookingdetail.rooms_roomId
                INNER JOIN types ON types.typeId = rooms.types_typeId
                INNER JOIN customers ON customers.customerId = booking.customers_customerId
                INNER JOIN registstaff ON registstaff.staffs_staffId = booking.registStaff_registStaffId
                INNER JOIN staffs ON staffs.staffId = registstaff.staffs_staffId
                GROUP BY booking.bookingId
                ORDER BY booking.bookingId DESC";
        $result = $conn->query($sql);
        while ($my_row = $result->fetch_assoc()) {
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
            $amountRoom = $my_row["amountRooms"];
            $typeName = $my_row["typeName"];
            $customerEmail = $my_row["customerEmail"];
            $customerPhoneNum = $my_row["phoneNo"];
            $typePrice = $my_row["price"];
            $typeId = $my_row["typeId"];
            $sql2 = "SELECT bookingDetailId FROM bookingdetail
                    INNER JOIN booking ON booking.bookingId = bookingdetail.booking_bookingId
                    WHERE booking.bookingId = '$bookingId'";
            $result2 = $conn->query($sql2);
            $bookingDetailIdList = array();
            while ($my_row2 = $result2->fetch_assoc()) {
                $bookingDetailIdList[] = $my_row2["bookingDetailId"];
            }
            $sql3 = "SELECT bookingDetail.booking_bookingId , services.serviceName , services.serviceId , services.servicePrice FROM bookingdetail
                    INNER JOIN optional ON optional.bookingDetail_bookingDetailId = bookingdetail.bookingDetailId
                    INNER JOIN services ON services.serviceId = optional.services_serviceId
                    WHERE bookingdetail.booking_bookingId = '$bookingId'
                    GROUP BY bookingdetail.booking_bookingId , services.serviceId";
            $result3 = $conn->query($sql3);
            $servicesList = array();
            $serviceIdList = array();
            $servicePriceList = array();
            while ($my_row3 = $result3->fetch_assoc()) {
                $servicesList[] = $my_row3["serviceName"];
                $serviceIdList[] = $my_row3["serviceId"];
                $servicePriceList[] = $my_row3["servicePrice"];
            }
            $bookingDetailDTOList[] = new BookingDetailDTO(
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
                $staffName,
                $amountRoom,
                $typeName,
                $customerEmail, 
                $customerPhoneNum,
                $typePrice, 
                $typeId,
                $bookingDetailIdList,
                $servicesList,
                $serviceIdList, 
                $servicePriceList
            );
        }
        require("connection_close.php");
        return $bookingDetailDTOList;
    }
}
