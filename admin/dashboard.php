<?php 

  include_once './config/connect.php';
  include_once './config/functions.php';

  session_start(); 
  $conn = get_connection();
  $user_data = check_login($conn);
  $user_type = check_usertype($conn);
  
?>

<?php include('partials/header.php'); ?>
<link rel="stylesheet" href="css/dashboard.css">

<div class="adminDashboard">
    <div class="navigationPanel">
    <div class="container">
        <img id="logoButton" src="Icons/newlogo.png" onclick="window.location.href='../admin/home.php'" style="cursor: pointer;" alt="">
        <div class="backgroundDesign"></div>
        <button onclick="window.location.href='../admin/dashboard.php'" id="dashboardButton" class="active"><i class="fa-solid fa-gauge-simple-high"></i> Dashboard</button>
        <button id="ordersButton"><i class="fa-solid fa-truck"></i> Orders</button>
        <button id="logoutButton"><i class="fa-solid fa-right-from-bracket"></i><a id="logoutButton" href="sign-out.php"> Logout</a></button>
</div>
    </div>
    <div class="dashboard">
        <div class="container">
            <h3>Hello, <?php echo ucfirst($_SESSION['username']); ?>!</h3>
            <div><h1>Dashboard</h1></div>
            <div class="revenue">
                <div><p>Revenue</p></div>
                <div><h2>PHP 50,000.00</h2></div>
                <div class="percentIncrease"><p>↑ 3.14% vs last week</p></div>
            </div>
            <div>
            <div class="canvas-container">
                <canvas id="myChart1"></canvas>
                <canvas id="myChart2"></canvas>
            </div>
            </div>
        </div>
    </div>
    <div class="users">
        <div class="container">

        </div>
    </div>
</div>

<script>
    var buttons = document.querySelectorAll('.navigationPanel button');

    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            buttons.forEach(function(btn) {
                btn.classList.remove('active');
            });

            if (button.id !== 'logoutButton') {
                button.classList.add('active');
            }

            if(button.id === 'ordersButton') {
                var dashboards = document.querySelectorAll('.dashboard');
                dashboards.forEach(function(dashboard) {
                    dashboard.style.display = "none";
                });
            } else if ((button.id === 'logoutButton')){
                var dashboards = document.querySelectorAll('.dashboard');
                var navPanel = document.querySelectorAll('.navigationPanel');
                dashboards.forEach(function(dashboard) {
                    dashboard.style.display = "none";
                });
                navPanel.forEach(function(navPanel) {
                    navPanel.style.display = "none";
                });
            } else {
                var dashboards = document.querySelectorAll('.dashboard');
                dashboards.forEach(function(dashboard) {
                    dashboard.style.display = "block";
                });
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var nav = document.getElementById("mainNav");

        var listItems = nav.getElementsByTagName("li");

        for (var i = 0; i < listItems.length; i++) {
            listItems[i].style.display = "none";
        }

        document.getElementById('Cart').style.display = "none";
        document.getElementById('Sign-out').style.display = "none";
        document.getElementById('logoButton').style.display = "none";
        
        nav.style.boxSizing = "border-box"; 
        nav.style.boxShadow = "none"; 
        nav.style.width = "0"; 
        nav.style.height = "0"; 
    });


    let chart1 = document.getElementById('myChart1').getContext('2d');
    let popChart1 = new Chart(chart1, {
        type: 'bar',
        data:{
            labels: ['May 26', 'May 27', 'May 28', 'May 29', 'Latest May 29 2024'],
            datasets:[{
                label: 'Sales from 26-29 May, 2024', 
                data: [
                    20000,
                    25000,
                    30000,
                    25000,
                    30500
                ],
                backgroundColor:"black",
                borderColor: "rgba(0,0,255,0.1)",
            }],
            options: {
                legend: {display: false},
                scales: {
                yAxes: [{ticks: {min: 6, max:16}}],
                }
            }
        }
    });

    let chart2 = document.getElementById('myChart2').getContext('2d');
    let popChart2 = new Chart(chart2, {
        type: 'bar',
        data:{
            labels: ['May 26', 'May 27', 'May 28', 'May 29', 'Latest May 29 2024'],
            datasets:[{
                label: 'Blog engagement from 26-29 May, 2024', 
                data: [
                    20000,
                    300000,
                    40000,
                    50000,
                    60000
                ],
                backgroundColor:"black",
                borderColor: "rgba(0,0,255,0.1)",
            }],
            options: {
                legend: {display: false},
                scales: {
                yAxes: [{ticks: {min: 6, max:16}}],
                }
            }
        }
    });
</script>