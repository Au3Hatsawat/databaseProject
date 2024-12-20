<?php
if (isset($_GET['controller']) && isset($_GET['action']) && isset($_GET['buttonId'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
    $buttonId = $_GET['buttonId'];
} else {
    $controller = 'customerbooking';
    $action = 'createBooking';
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>hotel dashboard</title>
    <link rel="stylesheet" href="style.css" />

    <script src="https://kit.fontawesome.com/ef0f251530.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <ul class="menu">
                <li id="customerbooking" class="active">
                    <a href="?controller=customerbooking&action=createBooking&buttonId=customerbooking">
                        <i class="fa-solid fa-table-columns"></i>
                        <span style='font-weight: bold;'>customer page</span>
                    </a>
                </li>
                <li id="booking" class="inactive">
                    <a href="?controller=booking&action=index&buttonId=booking">
                        <i class="fa-solid fa-book-open"></i>
                        <span style='font-weight: bold;'>Booking</span>
                    </a>
                </li>
                <li id="service">
                    <a href="?controller=service&action=index&buttonId=service">
                        <i class="fa-solid fa-list-ul"></i>
                        <span style='font-weight: bold;'>Services</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="https://bservcpe.eng.kps.ku.ac.th/db24/db24_100/g09/">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span style='font-weight: bold;'>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <?php
    require("route.php"); ?>

    <script>
        const buttonList = ["booking", "service", "customerbooking"];

        function activeButton(cl) {
            var element;
            for (let i = 0; i < buttonList.length; i++) {
                element = document.getElementById(buttonList[i]);
                element.classList.remove("active");
                element.classList.add("inactive");
            }
            element = document.getElementById(cl);
            element.classList.add("active");
        }

        <?php
        echo "activeButton('$buttonId')";
        ?>
    </script>

</body>

</html>