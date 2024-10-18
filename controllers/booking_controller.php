<?php
    class BookingController{
        public function index(){
            $bookingList = Booking::getAll();
            $roomlist = Room::getAll();
            require('views/bookingPages/bookingPage.php');
        }
    }
?>