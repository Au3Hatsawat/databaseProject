<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <script src="jquery.js"></script>
    <script src="views/bookingPages/scripts/changeTablePage.js"></script>
    <link rel="stylesheet" href="views/bookingPages/styles/bookingpage--style.css">
    <link rel="stylesheet" href="views/bookingPages/styles/bookingtable--style.css">
    <script src="https://kit.fontawesome.com/ef0f251530.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="main--content">
         <div class="header--wrapper">
             <div class="header--title">
                 <span>detail</span>
                 <h2>Booking</h2>
             </div>
             <div class="add--button">
                    <i class="fa-solid fa-plus"></i>
                </div>
             <div class="search--box">
                 <i class="fa-solid fa-magnifying-glass"></i>
                 <input tpye="text" placeholder="Search" />
             </div>
         </div>

        <div class="table--wrapper">
            <h3 class="main--title">booking lists</h3>
            <div class="table--container">
                <table class="paginated">
                    <thead>
                        <tr>
                            <th>bookingId</th>
                            <th>booking Date</th>
                            <th>Customer</th>
                            <th>Staff</th>
                            <th>check-In Date</th>
                            <th>check-Out Date</th>
                            <th>Status</th>
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
                                            <td>$booking->customerId</td>
                                            <td>$booking->registStaffId</td>
                                            <td>$booking->checkInDate</td>
                                            <td>$booking->checkOutDate</td>";
                                if ($booking->checkInStatus == 0) {
                                    echo "<td>waiting for check-in</td>";
                                } else if ($booking->checkOutStatus == 0) {
                                    echo "<td>waiting for check-out</td>";
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


</body>

</html>