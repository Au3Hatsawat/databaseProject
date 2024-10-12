<?php
if (isset($_GET['controller']) && isset($_GET['action']) && isset($_GET['buttonId'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
    $buttonId = $_GET['buttonId'];
} else {
    $controller = 'pages';
    $action = 'dashboard';
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
                <li id="dashboard" class="active">
                    <a href="?controller=pages&action=dashboard&buttonId=dashboard">
                        <i class="fa-solid fa-table-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li id="booking" class="inactive">
                    <a href="?controller=booking&action=index&buttonId=booking">
                        <i class="fa-solid fa-book-open"></i>
                        <span>Booking</span>
                    </a>
                </li>
                <li id="user">
                    <a href="#">
                        <i class="fa-solid fa-user"></i>
                        <span>Customer</span>
                    </a>
                </li>
                <li id="room">
                    <a href="#">
                        <i class="fa-solid fa-bed"></i>
                        <span>Room</span>
                    </a>
                </li>
                <li id="payment">
                    <a href="#">
                        <i class="fa-solid fa-money-check-dollar"></i>
                        <span>Payment</span>
                    </a>
                </li>
                <li id="staff">
                    <a href="#">
                        <i class="fa-solid fa-clipboard-user"></i>
                        <span>Staff</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="#">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <?php require("route.php"); ?>

    <script>
        const buttonList = ["staff", "payment", "room", "user", "booking", "dashboard"];

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