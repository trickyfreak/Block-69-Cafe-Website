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

<div class="navigationPanel">
    <div class="container">
        <img id="logoButton" src="Icons/newlogo-light.png" onclick="window.location.href='../admin/home.php'" style="cursor: pointer;" alt="">
        <div class="backgroundDesign"></div>
        <button><i class="fa-solid fa-gauge-simple-high"></i> Dashboard</button>
        <button><i class="fa-solid fa-truck"></i> Orders</button>
        <button><i class="fa-solid fa-chart-simple"></i> Analytics</button>
        <button><i class="fa-solid fa-id-card"></i> Users</button>
        <button><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
    </div>
</div>
<div class="adminDashboard">
    <div class="container">
        <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
    </div>
</div>

<script>
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


    // let chart = document.getElementById('myChart').getContext('2d');
    // let popChart = new Chart(chart, {
    //     type: 'pie',
    //     data:{
    //         labels: ['Latest 2024', '1951', '1957', '1952', '1950'],
    //         datasets:[{
    //             label: 'Population', 
    //             data:[
    //                 118955498,
    //                 23000000,
    //                 20000000,
    //                 18000000,
    //                 10000000
    //             ],
    //             backgroundColor:[
    //                 '#b91d47',
    //                 '#00aba9',
    //                 '#2b5797',
    //                 '#e8c3b9',
    //                 '#1e7145'
    //             ]
    //         }],
    //         options: {
    //             title: {
    //             display: true,
    //             text: "Nigga"
    //             }
    //         }
    //     }
    // });
</script>