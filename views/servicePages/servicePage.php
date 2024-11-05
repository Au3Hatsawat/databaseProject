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
                <h2>Services</h2>
            </div>
            <div class="header2--container">
                <div class="search--box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input id="searchInput" type="text" placeholder="Search" />
                </div>
                <div class="add--button">
                    <a href="#" onclick="togglePopupCreate()">
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
                            <th>SERVICE NUMBER</th>
                            <th>SERVICE NAME</th>
                            <th>SERVICE PRICE</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        foreach ($serviceList as $service) {
                            echo "<tr>
                                    <td>$service->serviceId</td>
                                    <td>$service->serviceName</td>
                                    <td>$service->servicePrice ฿</td>
                                    <td>
                                        <div class='edit--button'>
                                            <a id='serviceButton$service->serviceId' href='#' onclick='togglePopupUpdate()'>
                                                <i class='fa-regular fa-pen-to-square'></i>
                                            </a>
                                            <input id='serviceInput$service->serviceId' type='hidden' name='serviceInput' 
                                            value='$service->serviceName,$service->servicePrice,$service->serviceId'>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='delete--button'>
                                            <a id='deleteButton$service->serviceId' href='#' onclick='togglePopupDelete()'>
                                                <i class='fa-solid fa-xmark'></i>
                                            </a>
                                            <input id='deleteInput$service->serviceId' type='hidden' name='deleteInput' 
                                            value='$service->serviceId,$service->serviceName'>
                                        </div>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- create new service form -->
    <div id="popupOverlayCreateForm"
        class="overlay-container">
        <div class="popup-box">
            <h2 style="color: cornflowerblue; margin-bottom: 20px;">CREATE NEW SERVICE</h2>
            <form method="GET" class="form-container">
                <div>
                    <div class='input-container'>
                        <label class="form-label"
                            for="name">
                            Service Name :
                        </label>
                        <input class="form-input form-input-name" type="text"
                            placeholder="Enter Service Name"
                            id="serviceName" name="serviceName" required>
                    </div>
                    <div class='input-container'>
                        <label class="form-label"
                            for="name">
                            Service Price :
                        </label>
                        <input class="form-input form-input-name" type="number"
                            placeholder="Enter Price (฿)"
                            id="servicePrice" name="servicePrice" required>
                    </div>
                </div>

                <input type="hidden" name="controller" value="service" />
                <input type="hidden" name="buttonId" value="service" />
                <button class="btn-submit"
                    type="submit" name="action" value="addService">
                    Create Service
                </button>
            </form>
            <button class="btn-close-popup"
                onclick="togglePopupCreate()">
                Close
            </button>

        </div>
    </div>

    <!-- update service form -->
    <div id="popupOverlayUpdateForm"
        class="overlay-container">
        <div class="popup-box">
            <h2 style="color: cornflowerblue; margin-bottom: 20px;">UPDATE SERVICE</h2>
            <form method="GET" class="form-container">
                <div>
                    <div class='input-container'>
                        <label class="form-label"
                            for="name">
                            Service Name :
                        </label>
                        <input class="form-input form-input-name" type="text"
                            placeholder="Enter Service Name"
                            id="updateServiceName" name="serviceName" required>
                    </div>
                    <div class='input-container'>
                        <label class="form-label"
                            for="name">
                            Service Price :
                        </label>
                        <input class="form-input form-input-name" type="number"
                            placeholder="Enter Price (฿)"
                            id="updateServicePrice" name="servicePrice" required>
                    </div>
                </div>
                
                <input id="serviceId" type="hidden" name="serviceId" value="" />
                <input type="hidden" name="controller" value="service" />
                <input type="hidden" name="buttonId" value="service" />
                <button class="btn-submit"
                    type="submit" name="action" value="update">
                    Update Service
                </button>
            </form>
            <button class="btn-close-popup"
                onclick="togglePopupUpdate()">
                Close
            </button>

        </div>
    </div>

    <!-- Delete Form -->
    <div id="popupOverlayDelete"
        class="overlay-container">
        <div class="popup-box">
            <h3 style="color: cornflowerblue; margin-bottom: 20px;">Are you sure to delete this service?</h3>
            <div>
                <label id="deletServiceInfo"></label>
            </div>
            <form method="GET" action="">
                <input id="deleteId" type="hidden" name="serviceId" value="" />
                <input type="hidden" name="controller" value="service" />
                <input type="hidden" name="buttonId" value="service" />
                <button class="btn-submit" name="action" value="delete">
                    Delele
                </button>
            </form>
            <button class="btn-close-popup"
                onclick="togglePopupDelete()">
                Close
            </button>
        </div>
    </div>



    <script>
        function togglePopupCreate() {
            const overlay = document.getElementById('popupOverlayCreateForm');
            overlay.classList.toggle('show');
        }

        function togglePopupUpdate() {
            const overlay = document.getElementById('popupOverlayUpdateForm');
            overlay.classList.toggle('show');
        }

        function togglePopupDelete() {
            const overlay = document.getElementById('popupOverlayDelete');
            overlay.classList.toggle('show');
        }

        <?php
            foreach($serviceList as $service){
                echo "$(function(){
                        $('#serviceButton$service->serviceId').click(function() {
                        var serviceNameAndPrice = $(this).closest('tr').find('#serviceInput$service->serviceId').val();
                        var serviceInfo = serviceNameAndPrice.split(',');
                        $('#updateServiceName').val(serviceInfo[0]);
                        $('#updateServicePrice').val(serviceInfo[1]);
                        $('#serviceId').val(serviceInfo[2]);
                    });
                });";

                echo "$(function(){
                        $('#deleteButton$service->serviceId').click(function() {
                        var serviceInfo = $(this).closest('tr').find('#deleteInput$service->serviceId').val().split(',');
                        $('#deleteId').val(serviceInfo[0]);
                        $('#deletServiceInfo').empty();
                        $('#deletServiceInfo').append(serviceInfo[0] + ' ' + serviceInfo[1]);
                    });
                });";
            }
        ?>

        $(document).ready(function() {
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