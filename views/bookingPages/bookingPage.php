<!DOCTYPE html>
 <html>

 <head>
     <meta charset="UTF-8" />
     <link rel="stylesheet" href="views/bookingPages/styles/bookingpage--style.css">
     <link rel="stylesheet" href="views/bookingPages/styles/table--style.css">
     <script src="https://kit.fontawesome.com/ef0f251530.js" crossorigin="anonymous"></script>
 </head>

 <body>

     <div class="main--content">
         <div class="header--wrapper">
             <div class="header--title">
                 <span>Booking</span>
                 <h2>Edit</h2>
             </div>

         </div>

         <div class="table--wrapper">
            <div class="header--table">
                <div class="search--box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input tpye="text" placeholder="Search" />
                </div>
                <div class="add--button">
                    <i class="fa-solid fa-plus"></i>
                    <span>
                        <a href="#">
                            ADD BOOKING
                        </a>
                    </span>
                </div>
            </div>
             <div class="table--container">
                 <table>
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
                         <tbody>
                                <?php
                                    $count = 0;
                                    foreach($bookingList as $booking){
                                        if($count < 5){
                                            echo "<tr>
                                            <td>$booking->bookingId</td>
                                            <td>$booking->bookingDate</td>
                                            <td>$booking->customerId</td>
                                            <td>$booking->registStaffId</td>
                                            <td>$booking->checkInDate</td>
                                            <td>$booking->checkOutDate</td>";
                                            if($booking->checkInStatus == 0){
                                                echo "<td>waiting for check-in</td>";
                                            }else if($booking->checkOutStatus == 0){
                                                echo "<td>waiting for check-out</td>";
                                            }
                                            echo "</tr>";
                                        }else{
                                            break;
                                        }
                                    }
                                ?>
                         </tbody>
                     </thead>
                 </table>
             </div>
         </div>
     </div>


    <script src="jquery.js"></script>

 </body>

 </html>