<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <script src="jquery.js"></script>
    <script src="views/bookingPages/scripts/changeTablePage.js"></script>
    <link rel="stylesheet" href="views/bookingPages/styles/bookingStyle.css">
    <link rel="stylesheet" href="views/bookingPages/styles/createBookingStyle.css">
    <link rel="stylesheet" href="views/bookingPages/styles/bookingtableStyle.css">
    <script src="https://kit.fontawesome.com/ef0f251530.js" crossorigin="anonymous"></script>
</head>

<body>

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
                        $count = 0;
                        foreach ($bookingList as $booking) {
                            if ($count < 5) {
                                echo "<tr>
                                            <td>$booking->bookingId</td>
                                            <td>$booking->bookingDate</td>
                                            <td>$booking->customerName</td>
                                            <td>$booking->staffName</td>";
                                if ($booking->checkInStatus == 0) {
                                    echo '<td><div class="status">
                                    <span>check in</span>
                                    </div></td>';
                                    echo '<td class="detail"><a><i class="fa-solid fa-chevron-down"></i></a></td>';
                                } else if ($booking->checkOutStatus == 0) {
                                    echo '<td><div class="status">
                                    <span>check out</span>
                                    </div></td>';
                                    echo '<td class="detail"><a><i class="fa-solid fa-chevron-down"></a></td>';
                                }
                                echo "</tr>";
                            } else {
                                break;
                            }
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
            <form class="form-container">
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
                    for="phone">
                    Phone No. :
                </label>
                <input class="form-input" type="text"
                    placeholder="Enter Your Phone No."
                    id="phone" name="phone" required>

                <label class="form-label"
                    for="phone">
                    Number of Guests :
                </label>
                <select class="form-input" name="numGuest">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>

                <label class="form-label"
                    for="type">
                    Room Type :
                </label>
                <select class="form-input" name="type">
                    <?php
                    foreach ($roomlist as $room) {
                        echo "<option value='$room->id'>$room->type</option>";
                    }
                    ?>
                </select>

                <div>
                    <div>
                        <label class="form-label" for="arrival">Arrival Date & Time :</label>
                        <input class="form-input"
                            type="datetime-local"
                            id="arrival"
                            name="arrival" required>
                    </div>

                    <div>
                        <label class="form-label" for="departune">Departune Date :</label>
                        <input class="form-input"
                            type="date"
                            id="departune"
                            name="departune" required>
                    </div>
                </div>
                
                <button class="btn-submit"
                    type="submit">
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
    </script>
</body>

</html>