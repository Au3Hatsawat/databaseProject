<?php
    class BookingController{
        public function index(){
            $bookingList = BookingDetailDTO::getAll();
            $typeList = Type::getAll();
            $serviceList = Service::getAll();
            require('views/bookingPages/bookingPage.php');
        }

        public function addBooking(){
            $fName = $_GET["fname"];
            $lName = $_GET["lname"];
            $email = $_GET["email"];
            $phone = $_GET["phone"];
            $getCustomerId = Customer::get($fName,$lName);
            if(isset($getCustomerId)){
                $customerId = $getCustomerId;
            }else{
                $customerId = Customer::add($fName,$lName,'-',$phone,$email);
            }
            $amount = $_GET["amount"];
            $staffid = 1;
            $arrival = strtotime($_GET['arrival'] . "14:00:00");
            $departune = strtotime($_GET['departune'] . "12:00:00");
            $x = date("Y-m-d H:i:s", $arrival);
            $y = date("Y-m-d H:i:s", $departune);
            $total = 0;
            $typeAndPrice = $_GET["type"];
            $typeId = explode(' ', $typeAndPrice)[0];
            $typePrice =explode(' ', $typeAndPrice)[1];
            $service = $_GET['service'];
            foreach($service as $s){
                $servicePrice = explode(' ', $s)[1];
                $total += $servicePrice;
            }
            $total += $typePrice;
            $total *= $amount;
            $bookingId = Booking::add($x,$y,$customerId,$staffid,$total);
            for($i = 0;$i < $amount;$i++){
                $getRoomId = Room::getAvailableRoom($x,$y,$typeId);
                if($getRoomId != null){
                    $roomId = $getRoomId;
                }else{
                    $roomId = Room::get($typeId);
                }
                $bookingDetailId = BookingDetail::add($bookingId,$roomId);
                foreach($service as $s){
                    $serviceId = explode(' ', $s)[0];
                    Optional::add($bookingDetailId,$serviceId);
                }
            }
            BookingController::index();
        }

        public function delete(){
            $bookingId = $_GET['bookingId'];
            Booking::delete($bookingId);
            BookingController::index();
        }

        public function update(){
            $fName = $_GET["fname"];
            $lName = $_GET["lname"];
            $email = $_GET["email"];
            $phone = $_GET["phone"];
            $customerId = $_GET["customerId"];
            $bookingId = $_GET["bookingId"];
            BookingDetail::get($bookingId);
            $arrival = strtotime($_GET['arrival'] . "14:00:00");
            $departune = strtotime($_GET['departune'] . "12:00:00");
            $x = date("Y-m-d H:i:s", $arrival);
            $y = date("Y-m-d H:i:s", $departune);
            $amount = $_GET["amount"];
            $staffid = 1;
            $total = 0;
            $typeAndPrice = $_GET["type"];
            $typeId = explode(' ', $typeAndPrice)[0];
            $typePrice =explode(' ', $typeAndPrice)[1];
            $service = $_GET['service'];
            foreach($service as $s){
                $servicePrice = explode(' ', $s)[1];
                $total += $servicePrice;
            }
            $total += $typePrice;
            $total *= $amount;
            Customer::update($customerId,$fName,$lName,$phone,$email);
            Booking::update($bookingId,$x,$y,$customerId,$staffid,$total);
            for($i = 0;$i < $amount;$i++){
                $getRoomId = Room::getAvailableRoom(date('Y-m-d h:i:sa',$arrival),date('Y-m-d h:i:sa',$departune),$typeId);
                if($getRoomId != null){
                    $roomId = $getRoomId;
                }else{
                    $roomId = Room::get($typeId);
                }
                $bookingDetailId = BookingDetail::add($bookingId,$roomId);
                foreach($service as $s){
                    $serviceId = explode(' ', $s)[0];
                    Optional::add($bookingDetailId,$serviceId);
                }
            }
            BookingController::index();
        }
        
        public function statusUpdate(){
            $bookingId = $_GET["bookingId"];
            $checkInStatus = $_GET["checkInStatus"];
            $checkOutStatus = $_GET["checkOutStatus"];
            if($checkInStatus == 0){
                Booking::updateStatus($bookingId,1,$checkOutStatus);
            }else if($checkOutStatus == 0){
                Booking::updateStatus($bookingId,$checkInStatus,1);
            }
            BookingController::index();
        }

    }
?>