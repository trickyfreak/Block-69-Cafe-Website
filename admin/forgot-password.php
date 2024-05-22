
<?php 

include_once './config/connect.php';
include_once './config/functions.php';
session_start();

?>

<?php include('partials/header.php'); ?>
<link rel="stylesheet" href="css/forgot-password.css">

<form action="forgot-password.php" method="post">
  <div class="forgot-container">
    <div class="forgot-pass">
      <div><h1>Forgot Password</h1></div>
    </div>
    <div class="forgotPass-form">
      <div>
        <p>Just need to confirm your email to send you instructions to reset your password.<p>
        <p>* indicates required field</p>
        <input type="email" placeholder="* Email" name="email">
        <button type="submit" name="submit">Send</button>
      </div>
    </div>
  </div>
</form>

<?php 

if (isset($_POST['submit'])){
  $email = mysqli_escape_string($conn, $_POST['email']);
  $token = md5(rand());

  $check_email = "SELECT * FROM useraccounts WHERE email ='$email' LIMIT 1";
  $result = mysqli_query($conn, $check_email);

  if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    $get_name = $row["username"];
    $get_email = $row["email"];

    $update_token = "UPDATE useraccounts SET token='$token' WHERE email='$email' LIMIT 1";
    $tokenResult = mysqli_query($conn, $update_token);

    if ($tokenResult){
      send_pass_reset($get_name, $get_email, $token);
    }else{

    }

  }else{
    echo 'no account detected';
  }
}

?>

<!-- Hide the nav buttons -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var nav = document.getElementById("mainNav");

        var listItems = nav.getElementsByTagName("li");

        for (var i = 0; i < listItems.length; i++) {
            listItems[i].style.display = "none";

            listItems[0].style.fontWeight = "bold";
            listItems[0].style.fontFamily = "League Spartan";
            listItems[0].style.fontSize = "30px";
        }

        document.getElementById('Cart').style.display = "none";
        document.getElementById('Sign-in').style.display = "none";
        document.getElementById('Sign-up').style.display = "none";
    });
</script>