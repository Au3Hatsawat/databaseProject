<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <script src="jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="views/bookingPages/script/changeTablePage.js"></script>
    <link rel="stylesheet" href="views/customerBookingPages/css/customerbookingpage-style.css">
    <link rel="stylesheet" href="views/customerBookingPages/css/create-customerbooking-style.css">
    <script src="https://kit.fontawesome.com/ef0f251530.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
</head>

<body>

    <div class="main--content">

        <div class="table--wrapper">   
            <div class="table--container">
                <div class = "card-container">
                    <div class = "card-img">
                        <!-- image here -->
                    </div>
                <div class="popup-box">
                    <h2 style="color: cornflowerblue; margin-bottom: 20px;">BOOKING FORM</h2>
                    <form method="GET" class="form-container">
                        <label class="form-label"
                            for="name">
                            Name :
                        </label>
                        <div>
                            <input class="form-input form-input-name" type="text"
                                placeholder="Enter Your First Name"
                                id="fame" name="fname" required>

                            </label>
                            <input class="form-input form-input-name" type="text"
                                placeholder="Enter Your Last Name"
                                id="lname" name="lname" required>
                        </div>

                        <label class="form-label"
                            for="email">
                            Email :
                        </label>
                        <input class="form-input" type="email"
                            placeholder="Enter Your Email"
                            id="email" name="email" required>

                        <label class="form-label"
                            for="phone">
                            Phone No. :
                        </label>
                        <input class="form-input" type="text"
                            placeholder="Enter Your Phone No."
                            id="phone" name="phone" required>

                        <label class="form-label"
                            for="amount">
                            Amount of Room :
                        </label>
                        <select class="form-input" name="amount">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>

                        <label class="form-label"
                            for="type">
                            Room Type :
                        </label>
                        <select class="form-input" name="type" id="roomType">
                            <?php
                            foreach ($typeList as $type) {
                                echo "<option value='$type->typeId $type->price'>$type->typeName</option>";
                            }
                            ?>
                        </select>

                        <div>
                            <div>
                                <label class="form-label" for="arrival">Arrival Date & Time :</label>
                                <input class="form-input" type="text" id="arrivalDate" name="arrival">
                            </div>

                            <div>
                                <label class="form-label" for="departune">Departune Date :</label>
                                <input class="form-input" type="text" id="departuneDate" name="departune">
                            </div>
                        </div>
                        <label class="form-label"
                            for="service">
                            Service :
                        </label>
                        <select class="form-input" name="service[]" multiple>
                            <?php
                            foreach ($serviceList as $service) {
                                echo "<option value='$service->serviceId $service->servicePrice'>$service->serviceName</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" name="controller" value="customerbooking" />
                        <input type="hidden" name="buttonId" value="customerbooking" />
                        <button class="btn-submit"
                            type="submit" name="action" value="addBooking">
                            Book Now
                        </button>
                    </form>
                

                </div>
            </div>
        </div>
    </div>

    <script>

        $(function() {

            $("#arrivalDate").datepicker({
                beforeShowDay: function(d) {
                    // a and b are set to today ± 5 days for demonstration
                    var a = new Date();
                    var b = new Date();
                    // a.setDate(a.getDate() - 5);
                    // b.setDate(b.getDate() + 5);
                    return [true, a <= d && d <= b ? "my-class" : ""];
                }
            });

            $("#departuneDate").datepicker({
                beforeShowDay: function(d) {
                    // a and b are set to today ± 5 days for demonstration
                    var a = new Date();
                    var b = new Date();
                    // a.setDate(a.getDate() - 5);
                    // b.setDate(b.getDate() + 5);
                    return [true, a <= d && d <= b ? "my-class" : ""];
                }
            });
        });
    </script>

</body>

</html>