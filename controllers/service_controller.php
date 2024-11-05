<?php 
    class ServiceController{
        public function index(){
            $serviceList = Service::getAll();
            require("views/servicePages/servicePage.php");
        }

        public function addService(){
            $serviceName = $_GET["serviceName"];
            $servicePrice = $_GET["servicePrice"];
            Service::add($serviceName,$servicePrice);
            ServiceController::index();
        }

        public function update(){
            $serviceId = $_GET["serviceId"];
            $serviceName = $_GET["serviceName"];
            $servicePrice = $_GET["servicePrice"];
            Service::update($serviceId,$serviceName,$servicePrice);
            ServiceController::index();
        }

        public function delete(){
            $serviceId = $_GET["serviceId"];
            Service::delete($serviceId);
            ServiceController::index();
        }
    }
?>