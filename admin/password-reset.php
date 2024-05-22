
<?php 

include_once './config/connect.php';
include_once './config/functions.php';
session_start();

?>

<?php include('partials/header.php'); ?>
<link rel="stylesheet" href="css/password-reset.css">

<form action="password-reset.php" method="post">
  <input type="hidden" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">

  <div class="password-reset-container">
    <div class="password-reset">
      <div><h1>Password Reset</h1></div>
    </div>
    <div class="password-reset-form">
      <div>
        <p>Just need to confirm your email and password to reset your password.<p>
        <p>* indicates required field</p>
        <input type="email" placeholder="* Email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>">
        <input type="password" placeholder="* Enter New Password" name="newPassword">
        <input type="password" placeholder="* Enter Confirm Password" name="confirmPassword">
        <button type="submit" name="submit">Update Password</button>
      </div>
    </div>
  </div>
</form>

<?php 

if (isset($_POST['submit'])){
  $email = mysqli_escape_string($conn, $_POST['email']);
  $newPassword = mysqli_escape_string($conn, $_POST['newPassword']);
  $confirmPassword = mysqli_escape_string($conn, $_POST['confirmPassword']);
  $tokenn = mysqli_escape_string($conn, $_POST['token']);

  if (!empty($token)){
    if (!empty($email) && !empty($newPassword) && !empty($confirmPassword)){
      $check_token = "SELECT token FROM useraccounts WHERE token='$token' LIMIT 1";
      $result = mysqli_query($conn, $check_token);

      if (mysqli_num_rows($result) > 0){
        if ($newPassword == $confirmPassword){
          $update = "UPDATE useraccounts SET password='$newPassword' WHERE token='$token' LIMIT 1";
          $updateResult = mysqli_query( $conn, $update);

          if ($updateResult){
            
          }else{

          }
        }
      }
    }
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