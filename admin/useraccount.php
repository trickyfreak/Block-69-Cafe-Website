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
                <button>All</button>    
                <button>To Ship</button>
                <button>To Receive</button>
                <button>Completed</button>
                <button>Cancelled</button>
                <button>Return Refund</button>
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