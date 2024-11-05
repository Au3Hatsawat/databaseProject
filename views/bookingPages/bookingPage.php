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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

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
                    <input id="searchInput" type="text" placeholder="Search" />
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
                            <th>BOOKING NUMBER</th>
                            <th>BOOKING DATE</th>
                            <th>CUSTOMER</th>
                            <th>STAFF</th>
                            <th>STATUS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php

                        foreach ($bookingList as $booking) {
                            echo "<tr class='picked'>
                                            <td>$booking->bookingId</td>
                                            <td>$booking->bookingDate</td>
                                            <td>$booking->customerName</td>
                                            <td>$booking->staffName</td>";
                            if ($booking->checkInStatus == 0) {
                                echo '<td><div class="status orange--status">
                                    <span class="point orange--point">•</span>
                                    <span>Check In</span>
                                    </div></td>';
                                echo '<td class="detail"><a><i class="fa-solid fa-chevron-down"></i></a></td>';
                            } else if ($booking->checkOutStatus == 0) {
                                echo '<td><div class="status green--status">
                                    <span class="point green--point">•</span>
                                    <span>Check In</span>
                                    </div></td>';
                                echo '<td class="detail"><a id="show_detail"><i class="fa-solid fa-chevron-down"></a></td>';
                            } else if ($booking->checkInStatus == 1 && $booking->checkOutStatus == 1) {
                                echo '<td><div class="status">
                                    <span class="point">•</span>
                                    <span>Check Out</span>
                                    </div></td>';
                                echo '<td class="detail"><a id="show_detail"><i class="fa-solid fa-chevron-down"></a></td>';
                            }
                            echo "</tr>";
                            $checkInDate = date('d M o', strtotime($booking->checkInDate));
                            $checkOutDate = date('d M o', strtotime($booking->checkOutDate));
                            echo "
                            <tr><td colspan='6' class='info'>
                                <div class='card--container'>
                                        <div class='card--header'>
                                            <div class='card--title'>
                                            <h3>$booking->bookingId's Booking Details</h3>
                                            </div>
                                            <div class='button--header'>
                                                <div class='check--button'>
                                                    <a id='statusUpdateButton$booking->bookingId' href='#' onclick='togglePopupStatusUpdate()'>
                                                        <i class='fa-solid fa-arrow-right'></i>
                                                    </a>
                                                    <input id='statusUpdateInput$booking->bookingId' type='hidden' name='statusUpdate'
                                                    value='$booking->bookingId $booking->customerName $booking->checkInStatus $booking->checkOutStatus'>
                                                </div>
                                                <div class='edit--button'>
                                                    <a href='#' id='updateButton$booking->bookingId' onclick='togglePopupUpdateForm()'>
                                                        <i class='fa-regular fa-pen-to-square'></i>
                                                    </a>
                                                    <input id='updateInput$booking->bookingId' type='hidden' name='update' 
                                                    value='$booking->bookingId $booking->customerName $booking->customerEmail $booking->customerPhoneNum $booking->amountRoom $booking->typeId $booking->typePrice $booking->checkInDate $booking->checkOutDate $booking->customerId'>";
                            $servicesToString = "";
                            for ($i = count($booking->servicesList) - 1; $i >= 0; $i--) {
                                $servicesToString = $booking->serviceIdList[$i] . " " . $booking->servicePriceList[$i] . "," . $servicesToString;
                            }
                            $bookingDetailIdList = "";
                            for ($i = count($booking->bookingDetailId) - 1; $i >= 0; $i--) {
                                $bookingDetailIdList = $booking->bookingDetailId[$i] . "," . $bookingDetailIdList;
                            }
                            echo "<input id='serviceUpdateInput$booking->bookingId' type='hidden' name='serviceUpdate' 
                                                    value='$servicesToString'>
                                                    <input id='bookingDetailId$booking->bookingId' type='hidden' name='bookingDetailUpdate'
                                                    value='$bookingDetailIdList'>
                                                </div>
                                                <div class='delete--button'>
                                                    <a id='deleteButton$booking->bookingId' onclick='togglePopupDeleteForm()'>
                                                        <i class='fa-solid fa-xmark'></i>
                                                    </a>
                                                    <input id='deleteInput$booking->bookingId' type='hidden' name='delete' value='$booking->bookingId $booking->customerName'>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='detail--container'>
                                            <div>
                                                <p style='font-size: 16.5px;'>$booking->customerName</p></br>
                                                <p>Email: $booking->customerEmail</p>
                                                <p>Phone Number: $booking->customerPhoneNum</p>
                                            </div>
                                            <div>
                                                <p>Check In:    $checkInDate</p>
                                                <p>Check Out:   $checkOutDate</p>
                                                <p>Room Type:   $booking->typeName</p>
                                                <p>Amount Room: $booking->amountRoom</p>
                                            </div> 
                                            <div>
                                                <p>Services: </p>
                                                <ul>";
                            foreach ($booking->servicesList as $service) {
                                echo "<li>$service</li>";
                            }
                            echo " </ul>
                                            </div>

                                        </div>
                                        <div class='total--container'>
                                            <span>Total:</span>
                                            <span>$booking->totalPrice ฿</span>
                                        </div>
                                </div>
                            </td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- create new booking form -->
    <div id="popupOverlayCreateForm"
        class="overlay-container">
        <div class="popup-box">
            <h2 style="color: cornflowerblue; margin-bottom: 20px;">CREATE NEW BOOKING</h2>
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


    <!-- Update booking form -->
    <div id="popupOverlayUpdateForm"
        class="overlay-container">
        <div class="popup-box">
            <h2 style="color: cornflowerblue; margin-bottom: 20px;">UPDATE BOOKING</h2>
            <form method="GET" class="form-container">
                <label class="form-label"
                    for="name">
                    Name :
                </label>
                <div>
                    <input class="form-input form-input-name" type="text"
                        placeholder="Enter Your First Name"
                        id="updateFname" name="fname" required>

                    </label>
                    <input class="form-input form-input-name" type="text"
                        placeholder="Enter Your Last Name"
                        id="updateLname" name="lname" required>
                </div>

                <label class="form-label"
                    for="email">
                    Email :
                </label>
                <input class="form-input" type="email"
                    placeholder="Enter Your Email"
                    id="updateEmail" name="email" required>

                <label class="form-label"
                    for="phone">
                    Phone No. :
                </label>
                <input class="form-input" type="text"
                    placeholder="Enter Your Phone No."
                    id="updatePhone" name="phone" required>

                <label class="form-label"
                    for="amount">
                    Amount of Room :
                </label>
                <select id="updateAmount" class="form-input" name="amount">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>

                <label class="form-label"
                    for="type">
                    Room Type :
                </label>
                <select class="form-input" name="type" id="updateRoomType">
                    <?php
                    foreach ($typeList as $type) {
                        echo "<option value='$type->typeId $type->price'>$type->typeName</option>";
                    }
                    ?>
                </select>

                <div>
                    <div>
                        <label class="form-label" for="arrival">Arrival Date & Time :</label>
                        <input class="form-input" type="text" id="updateArrivalDate" name="arrival">
                    </div>

                    <div>
                        <label class="form-label" for="departune">Departune Date :</label>
                        <input class="form-input" type="text" id="updateDepartuneDate" name="departune">
                    </div>
                </div>
                <label class="form-label"
                    for="service">
                    Service :
                </label>
                <select id="updateService" class="form-input" name="service[]" multiple>
                    <?php
                    foreach ($serviceList as $service) {
                        echo "<option value='$service->serviceId $service->servicePrice'>$service->serviceName</option>";
                    }
                    ?>
                </select>

                <input id="oldService" type="hidden" name="oldService[]" value="" />
                <input id="customerId" type="hidden" name="customerId" value="" />
                <input id="bookingId" type="hidden" name="bookingId" value="" />
                <input id="bookingDetailId" type="hidden" name="bookingDetailId[]" value="" />
                <input id="bookingDetailIdForOptionalId" type="hidden" name="optionalId[]" value="" />
                <input id="oldAmountRoom" type="hidden" name="oldAmount" value="" />
                <input id="oldTypeRoom" type="hidden" name="oldType" value="" />
                <input type="hidden" name="controller" value="booking" />
                <input type="hidden" name="buttonId" value="booking" />
                <button class="btn-submit"
                    type="submit" name="action" value="update">
                    Update Booking
                </button>
            </form>
            <button class="btn-close-popup"
                onclick="togglePopupUpdateForm()">
                Close
            </button>

        </div>
    </div>


    <!-- Delete Form -->
    <div id="popupOverlayDeleteForm"
        class="overlay-container">
        <div class="popup-box">
            <h3 style="color: cornflowerblue; margin-bottom: 20px;">Are you sure to delete this booking?</h3>
            <div>
                <label id="deleteBookinglabel"></label>
            </div>
            <form method="GET" action="">
                <input id="deleteId" type="hidden" name="bookingId" value="" />
                <input type="hidden" name="controller" value="booking" />
                <input type="hidden" name="buttonId" value="booking" />
                <button class="btn-submit" name="action" value="delete">
                    Delele
                </button>
            </form>
            <button class="btn-close-popup"
                onclick="togglePopupDeleteForm()">
                Close
            </button>
        </div>
    </div>


    <!-- check-in checkout status update Form -->
    <div id="popupOverlayStatusUpdateForm"
        class="overlay-container">
        <div class="popup-box">
            <h3 style="color: cornflowerblue; margin-bottom: 20px;">Are you sure to update status this booking?</h3>
            <div>
                <label id="statusUpdateBookinglabel"></label>
            </div>
            <form method="GET" action="">
                <input id="statusUpdateId" type="hidden" name="bookingId" value="" />
                <input id="checkInStatus" type="hidden" name="checkInStatus" value="" />
                <input id="checkOutStatus" type="hidden" name="checkOutStatus" value="" />
                <input type="hidden" name="controller" value="booking" />
                <input type="hidden" name="buttonId" value="booking" />
                <button class="btn-submit" name="action" value="statusUpdate">
                    Update
                </button>
            </form>
            <button class="btn-close-popup"
                onclick="togglePopupStatusUpdate()">
                Close
            </button>
        </div>
    </div>


    <script>
        function togglePopup() {
            const overlay = document.getElementById('popupOverlayCreateForm');
            overlay.classList.toggle('show');
        }

        function togglePopupStatusUpdate() {
            const overlay = document.getElementById('popupOverlayStatusUpdateForm');
            overlay.classList.toggle('show');
        }

        function togglePopupDeleteForm() {
            const overlay = document.getElementById('popupOverlayDeleteForm');
            overlay.classList.toggle('show');
        }

        function togglePopupUpdateForm() {
            const overlay = document.getElementById('popupOverlayUpdateForm');
            overlay.classList.toggle('show');
        }

        <?php

        foreach ($bookingList as $booking) {
            echo "$(function(){
                        $('#deleteButton$booking->bookingId').click(function() {
                            var idAndName = $(this).closest('tr').find('#deleteInput$booking->bookingId').val();
                            $('#deleteBookinglabel').empty();
                            $('#deleteBookinglabel').append(idAndName);
                            var deleteId = idAndName.split(' ');
                            $('#deleteId').val(deleteId[0]);
                        });
                    });";
        }

        foreach ($bookingList as $booking) {
            echo "$(function(){
                    $('#updateButton$booking->bookingId').click(function() {
                        $('#updateService option:selected').prop('selected', false);
                        var updateInfo = $(this).closest('tr').find('#updateInput$booking->bookingId').val();
                        var info = updateInfo.split(' ');
                        $('#updateFname').val(info[1]);
                        $('#updateLname').val(info[2]);
                        $('#updateEmail').val(info[3]);
                        $('#updatePhone').val(info[4]);
                        $('#updateAmount').val(info[5]);
                        $('#oldAmountRoom').val(info[5]);
                        $('#updateRoomType').val(info[6] + ' ' + info[7]);
                        $('#oldTypeRoom').val(info[6] + ' ' + info[7]);
                        var ArrivalDateSplit = info[8].split('-');
                        $('#updateArrivalDate').val($.datepicker.formatDate( 'mm/dd/yy', new Date(ArrivalDateSplit[0],ArrivalDateSplit[1],ArrivalDateSplit[2])));
                        var DepartuneDateSplit = info[10].split('-');
                        $('#updateDepartuneDate').val($.datepicker.formatDate( 'mm/dd/yy', new Date(DepartuneDateSplit[0],DepartuneDateSplit[1],DepartuneDateSplit[2])));
                        var bookingDetailId = $(this).closest('tr').find('#bookingDetailId$booking->bookingId').val();
                        var bookingDetailIdList = bookingDetailId.split(',');
                        $('#bookingDetailId').val(bookingDetailIdList);
                        $('#bookingDetailIdForOptionalId').val(bookingDetailIdList);
                        $('#customerId').val(info[12]);
                        $('#bookingId').val(info[0]);
                        var serviceList = $(this).closest('tr').find('#serviceUpdateInput$booking->bookingId').val();
                        var ser = serviceList.split(',');
                        $('#oldService').val(ser);
                        var options = Array.from(document.querySelectorAll('#updateService option'));
                        serviceList.split(',').forEach(function(v) {
                            options.find(c => c.value == v).selected = true;
                        });
                        
                    });
                });";
        }

        foreach ($bookingList as $booking) {
            echo "$(function(){
                        $('#statusUpdateButton$booking->bookingId').click(function() {
                            var idAndStatus = $(this).closest('tr').find('#statusUpdateInput$booking->bookingId').val();
                            var updateStatusId = idAndStatus.split(' ');
                            $('#statusUpdateBookinglabel').empty();
                            $('#statusUpdateBookinglabel').append(updateStatusId[0] + ' ' + updateStatusId[1] + ' ' + updateStatusId[2]);
                            $('#statusUpdateId').val(updateStatusId[0]);
                            $('#checkInStatus').val(updateStatusId[3]);
                            $('#checkOutStatus').val(updateStatusId[4]);
                        });
                    });";
        }

        ?>

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

            $("#updateDepartuneDate").datepicker({
                beforeShowDay: function(d) {
                    // a and b are set to today ± 5 days for demonstration
                    var a = new Date();
                    var b = new Date();
                    a.setDate(a.getDate() - 5);
                    b.setDate(b.getDate() + 5);
                    return [true, a <= d && d <= b ? "my-class" : ""];
                }
            });

            $("#updateArrivalDate").datepicker({
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

        $(document).ready(function(){
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>