<?php
    class BookingController{
        public function index(){
            $bookingList = Booking::getAll();
            require('views/bookingPages/bookingPage.php');
        }
    }
?>