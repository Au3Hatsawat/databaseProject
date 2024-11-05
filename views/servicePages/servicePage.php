<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <script src="jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="views/bookingPages/script/changeTablePage.js"></script>
    <link rel="stylesheet" href="views/servicePages/css/service-style.css">
    <link rel="stylesheet" href="views/servicePages/css/create-service-style.css">
    <link rel="stylesheet" href="views/servicePages/css/servicetable-style.css">
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script>
        function togglePopup() {
            const overlay = document.getElementById('popupOverlayCreateForm');
            overlay.classList.toggle('show');
        }

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