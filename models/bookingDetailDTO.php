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
        $sql = "select booking.* , customers.* , staffs.* , types.* , count(distinct bookingdetail.bookingDetailId) as amountRooms from booking
                inner join bookingdetail on bookingdetail.booking_bookingId = booking.bookingId
                inner join rooms on rooms.roomId = bookingdetail.rooms_roomId
                INNER JOIN types on types.typeId = rooms.types_typeId
                inner join customers on customers.customerId = booking.customers_customerId
                inner join registstaff on registstaff.staffs_staffId = booking.registStaff_registStaffId
                inner join staffs on staffs.staffId = registstaff.staffs_staffId
                group by booking.bookingId , types.typeId
                order by booking.bookingId DESC";
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
            $staffName = $my_row["staffFirstName"] . " " . $my_row["staffLastName"];
            $amountRoom = $my_row["amountRooms"];
            $typeName = $my_row["typeName"];
            $customerEmail = $my_row["customerEmail"];
            $customerPhoneNum = $my_row["phoneNo"];
            $typePrice = $my_row["price"];
            $typeId = $my_row["typeId"];
            $sql2 = "select bookingDetailId from bookingdetail
                    inner join booking on booking.bookingId = bookingdetail.booking_bookingId
                    where booking.bookingId = '$bookingId'";
            $result2 = $conn->query($sql2);
            $bookingDetailIdList = array();
            while ($my_row2 = $result2->fetch_assoc()) {
                $bookingDetailIdList[] = $my_row2["bookingDetailId"];
            }
            $sql3 = "select bookingdetail.booking_bookingId , services.serviceName , services.serviceId , services.servicePrice from bookingdetail
                    inner join optional on optional.bookingDetail_bookingDetailId = bookingdetail.bookingDetailId
                    inner join services on services.serviceId = optional.services_serviceId
                    where bookingdetail.booking_bookingId = '$bookingId'
                    group by bookingdetail.booking_bookingId , services.serviceId";
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
