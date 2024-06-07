<?php 

  include_once './config/connect.php';
  include_once './config/functions.php';

  session_start(); 
  $conn = get_connection();
  $user_data = check_login($conn);
  $user_type = check_usertype($conn);
  $user_accounts = useraccounts($conn);
  $order_details = orderdetails($conn);
  $order_items = orderitems($conn);
?>

<title>Account</title>
<?php include('partials/header.php'); ?>
<link rel="stylesheet" href="css/useraccount.css">

<?php 

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}

?>

<div class="userheader">
    <div class="container">
        <div class="sidebar">
            <div class="buttons">
                <div><button><i class="fa-solid fa-store"></i> My Purchase</button></div>
                <div><button><i class="fa-regular fa-face-smile"></i> My Account</button></div>
                <div><button><i class="fa-solid fa-envelope"></i> Support</button></div>
            </div>
        </div>
        <div class="account">

        </div>
        <div class="purchases">
            <div class="navigationbar">
                <button id="all" class="active">All</button>    
                <button id="to-ship">To Ship</button>
                <button id="to-receive">To Receive</button>
                <button id="completed">Completed</button>
                <button id="cancelled">Cancelled</button>
                <button id="refund">Return Refund</button>
            </div>
            <?php 
            foreach($order_items as $orderInfo) {
                echo '
            <div class="all">
                <div class="orderContainer">
                    <img src="'.$orderInfo['item_image'].'" alt="">
                    <div>
                        <h1>'.$orderInfo['item_name'].'</h1>
                        <p>'.$orderInfo['item_category'].'</p>
                        <p style="margin: 1em 0 0 0; font-size: 14px"> Quantity: '.$orderInfo['item_quantity'].'</p>
                    </div>
                </div>
            </div>
                ';
            }
            ?>
            <div class="to-ship">
                <div class="container">
                    
                </div>
            </div>
            <div class="to-receive">
                <div class="container">

                </div>
            </div>
            <div class="completed">
                <div class="container">

                </div>
            </div>
            <div class="cancelled">
                <div class="container">

                </div>
            </div>
            <div class="refund">
                <div class="container">

                </div>
            </div>
        </div>
        <div class="support">

        </div>
    </div>
</div>

<script>
var buttons = document.querySelectorAll('.navigationbar button');

buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        buttons.forEach(function(btn) {
            btn.classList.remove('active');
        });

        button.classList.add('active');

        var summary = document.querySelectorAll('.all');
        var toShip = document.querySelectorAll('.to-ship');
        var toReceive = document.querySelectorAll('.to-receive');
        var completed = document.querySelectorAll('.completed');
        var cancelled = document.querySelectorAll('.cancelled');
        var refund = document.querySelectorAll('.refund');
        
        if(button.id === '.all'){
            summary.forEach(function(summary) {
                summary.style.display = "flex";
            });
            toShip.forEach(function(toShip) {
                toShip.style.display = "none";
            });
        }else if(button.id === 'to-ship') {
            summary.forEach(function(summary) {
                summary.style.display = "none";
            });
            toShip.forEach(function(toShip) {
                toShip.style.display = "flex";
            });
        } else if(button.id === 'to-receive') {
            summary.forEach(function(summary) {
                summary.style.display = "none";
            });
            toShip.forEach(function(toShip) {
                toShip.style.display = "none";
            });
            toReceive.forEach(function(toReceive) {
                toShip.style.display = "flex";
            });
        } else if(button.id === 'completed') {
            summary.forEach(function(summary) {
                summary.style.display = "none";
            });
            toShip.forEach(function(toShip) {
                toShip.style.display = "none";
            });
            toReceive.forEach(function(toReceive) {
                toReceive.style.display = "none";
            });
            completed.forEach(function(completed) {
                completed.style.display = "flex";
            });
        } else if(button.id === 'cancelled') {
            summary.forEach(function(summary) {
                summary.style.display = "none";
            });
            toShip.forEach(function(toShip) {
                toShip.style.display = "none";
            });
            toReceive.forEach(function(toReceive) {
                toReceive.style.display = "none";
            });
            completed.forEach(function(completed) {
                completed.style.display = "none";
            });
            cancelled.forEach(function(cancelled) {
                cancelled.style.display = "flex";
            });
        } else if(button.id === 'refund') {
            summary.forEach(function(summary) {
                summary.style.display = "none";
            });
            toShip.forEach(function(toShip) {
                toShip.style.display = "none";
            });
            toReceive.forEach(function(toReceive) {
                toReceive.style.display = "none";
            });
            completed.forEach(function(completed) {
                completed.style.display = "none";
            });
            cancelled.forEach(function(cancelled) {
                cancelled.style.display = "none";
            });
            refund.forEach(function(refund) {
                refund.style.display = "flex";
            });
        } else {
            var summary = document.querySelectorAll('.all');
            summary.forEach(function(summary) {
                summary.style.display = "block";
            });
        }
    });
});
</script>