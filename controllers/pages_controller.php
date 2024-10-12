<?php
    class PageController{
        public function dashboard(){
            $bookingList = Booking::getAll();
            require('views/pages/dashboard.php');
        }
        public function error(){
            require("views/pages/error.php");
        }
    }
?>