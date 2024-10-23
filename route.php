<?php
    $controllers = array('pages'=>['dashboard','error'] , 'booking'=>['index','addBooking']);

    function call($controller,$action){
        require("controllers/".$controller."_controller.php");
        switch($controller){
            case "pages": require("models/bookingModel.php");
                        $controller_obj = new PageController();
                        break;
            case "booking": require("models/bookingModel.php");
                            require("models/typeModel.php");
                            require("models/serviceModel.php");
                            require("models/bookingDetailModel.php");
                            require("models/customerModel.php");
                            require("models/optionalModel.php");
                            require("models/roomModel.php");
                            $controller_obj = new BookingController();
                            break;
        }
        $controller_obj->{$action}();
    }

    if(array_key_exists($controller,$controllers)){
        if(in_array($action,$controllers[$controller])){
            call($controller,$action);
        }else{
            call('pages','error');
        }
    }else{
        call('pages','error');
    }
?>