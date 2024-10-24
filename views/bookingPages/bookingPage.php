<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <script src="jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="views/bookingPages/script/changeTablePage.js"></script>
    <link rel="stylesheet" href="views/bookingPages/css/booking-Style.css">
    <link rel="stylesheet" href="views/bookingPages/css/createBooking-Style.css">
    <link rel="stylesheet" href="views/bookingPages/css/bookingtable-Style.css">
    <script src="https://kit.fontawesome.com/ef0f251530.js" crossorigin="anonymous"></script>
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
        rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
    </script>
</head>

<body>
    <!-- header container -->
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <h2>Bookings</h2>
            </div>
            <div class="header2--container">
                <div class="search--box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input tpye="text" placeholder="Search" />
                </div>
                <div class="add--button">
                    <a href="#" onclick="togglePopup()">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>

        </div>


        <!-- table container -->
        <div class="table--wrapper">
            <div class="table--container">
                <table class="paginated">
                    <thead>
                        <tr>
                            <th>BOOKING ID</th>
                            <th>DATE</th>
                            <th>CUSTOMER</th>
                            <th>STAFF</th>
                            <th>STATUS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($bookingList as $booking) {
                            echo "<tr class='picked'>
                                            <td>$booking->bookingId</td>
                                            <td>$booking->bookingDate</td>
                                            <td>$booking->customerName</td>
                                            <td>$booking->staffName</td>";
                            if ($booking->checkInStatus == 0) {
                                echo '<td><div class="status">
                                    <span class="point">•</span>
                                    <span>check in</span>
                                    </div></td>';
                                echo '<td class="detail"><a><i class="fa-solid fa-chevron-down"></i></a></td>';
                            } else if ($booking->checkOutStatus == 0) {
                                echo '<td><div class="status">
                                    <span class="point">•</span>
                                    <span>check out</span>
                                    </div></td>';
                                echo '<td class="detail"><a id="show_detail"><i class="fa-solid fa-chevron-down"></a></td>';
                            }
                            echo "</tr>";
                            echo '<tr><td colspan="6" class="info"><div></div></td></tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- create new booking form -->
    <div id="popupOverlay"
        class="overlay-container">
        <div class="popup-box">
            <h2 style="color: cornflowerblue;">CREATE NEW BOOKING</h2>
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
                <input type="hidden" name="controller" value="booking" />
                <input type="hidden" name="buttonId" value="booking" />
                <button class="btn-submit"
                    type="submit" name="action" value="addBooking">
                    Create Booking
                </button>
            </form>

            <button class="btn-close-popup"
                onclick="togglePopup()">
                Close
            </button>
        </div>
    </div>


    <script>
        function togglePopup() {
            const overlay = document.getElementById('popupOverlay');
            overlay.classList.toggle('show');
        }

        $(document).ready(
            function() {
                $("tr").find(".info").hide();
                $("tr").on("click", function() {
                    if ($(this).closest("tr").next("tr").find(".info").css('display') == 'none') {
                        $(this).closest("tr").next("tr").find(".info").show();
                    } else {
                        $(this).closest("tr").next("tr").find(".info").hide();
                    }
                })
            }
        );

        $(function() {
            $("#arrivalDate").datepicker({
                beforeShowDay: function(d) {
                    // a and b are set to today ± 5 days for demonstration
                    var a = new Date();
                    var b = new Date();
                    a.setDate(a.getDate() - 5);
                    b.setDate(b.getDate() + 5);
                    return [true, a <= d && d <= b ? "my-class" : ""];
                }
            });

            $("#departuneDate").datepicker({
                beforeShowDay: function(d) {
                    // a and b are set to today ± 5 days for demonstration
                    var a = new Date();
                    var b = new Date();
                    a.setDate(a.getDate() - 5);
                    b.setDate(b.getDate() + 5);
                    return [true, a <= d && d <= b ? "my-class" : ""];
                }
            });
        });      

    </script>
</body>

</html>