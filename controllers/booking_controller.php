<?php
    class BookingController{
        public function index(){
            $bookingList = Booking::getAll();
            $typeList = Type::getAll();
            require('views/bookingPages/bookingPage.php');
        }
    }
?>