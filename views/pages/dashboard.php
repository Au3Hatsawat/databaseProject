 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="UTF-8" />
     <link rel="stylesheet" href="views/pages/styles/home--style.css">
     <link rel="stylesheet" href="views/pages/styles/table--style.css">
     <script src="https://kit.fontawesome.com/ef0f251530.js" crossorigin="anonymous"></script>
 </head>

 <body>

     <div class="main--content">
         <div class="header--wrapper">
             <div class="header--title">
                 <span>Primary</span>
                 <h2>Dashboard</h2>
             </div>
             <div class="search--box">
                 <i class="fa-solid fa-magnifying-glass"></i>
                 <input tpye="text" placeholder="Search" />
             </div>
         </div>

         <div class="card--container">
             <h3 class="main--title">Today's datas</h3>
             <div class="card--wrapper">

                 <div class="card--box light-red">
                     <div class="card--header">
                         <div class="amount">
                             <span class="title">
                                 Payment amount
                             </span>
                             <!-- Edit value here -->
                             <span class="amount--value">
                                 100
                             </span>
                         </div>
                         <i class="fa-solid fa-money-check-dollar icon"></i>
                     </div>
                     <span class="card--detail">
                         Total number of payments
                     </span>
                 </div>

                 <div class="card--box light-blue">
                     <div class="card--header">
                         <div class="amount">
                             <span class="title">
                                 Booking amount
                             </span>
                             <!-- Edit value here -->
                             <span class="amount--value">
                                 <?php
                                    $bookingAmount = 0;
                                    foreach($bookingList as $booking){
                                        $bookingAmount += 1;
                                    }
                                    echo $bookingAmount;
                                 ?>
                             </span>
                         </div>
                         <i class="fa-solid fa-book-open icon dark-blue"></i>
                     </div>
                     <span class="card--detail">
                         Total number of bookings
                     </span>
                 </div>

                 <div class="card--box light-green">
                     <div class="card--header">
                         <div class="amount">
                             <span class="title">
                                 Room amount
                             </span>
                             <!-- Edit value here -->
                             <span class="amount--value">
                                 100
                             </span>
                         </div>
                         <i class="fa-solid fa-bed icon dark-green"></i>
                     </div>
                     <span class="card--detail">
                         Total number of rooms
                     </span>
                 </div>


                 <div class="card--box light-yellow">
                     <div class="card--header">
                         <div class="amount">
                             <span class="title">
                                 Staff amount
                             </span>
                             <!-- Edit value here -->
                             <span class="amount--value">
                                 100
                             </span>
                         </div>
                         <i class="fa-solid fa-clipboard-user icon dark-yellow"></i>
                     </div>
                     <span class="card--detail">
                         Total number of staffs
                     </span>
                 </div>

             </div>
         </div>


         <div class="table--wrapper">
            <div class="header--table">
                <div class="main--title">
                    <h3>
                        Today's details
                    </h3>
                </div>
                <div class="all--detail">
                    <a href="?controller=booking&action=index&buttonId=booking">
                            see all booking
                    </a>
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

 </body>

 </html>