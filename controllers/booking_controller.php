<?php
    class BookingController{
        public function index(){
            $bookingList = Booking::getAll();
            $typeList = Type::getAll();
            $serviceList = Service::getAll();
            require('views/bookingPages/bookingPage.php');
        }
    }
?>