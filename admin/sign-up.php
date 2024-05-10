<?php 

include('partials/header.php'); 
include('config/connect.php') 

?>

<link rel="stylesheet" href="css/sign-up.css">

  <form action="sign-up.php" method="post">
    <div class="sign-up-container">
      <h1 h1>Create an account</h1>
      <div class="description">
        <h2 style="font-family: League Spartan; font-size: 19px;">BLOCK 69 CAFE LOYALTY CARD</h2>
        <p style="font-size: 18px">Join Block 69 Cafe Loyalty Cards to earn a free cup <br> of coffee of your choice in your 10th payment.</p>
      </div>
      
      <div class="form-container">
        <p>*indicates required field</p>
        <input type="text" name="username" placeholder="* Username">
        <input type="text" name="email" placeholder="* Email Address">
        <input type="text" name="password" placeholder="* Password">
        <div class="chk"> <input type="checkbox"> Already have a Loyalty Card?. <a href="#" style="color: Black">Details</a></div>
        <input type="submit" name="submit" value="Sign up">
      </div>
    </div>
  </form>

<?php 

if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = "customer";

    if(!empty($username) && !empty($email) && !empty($password)){

      $query = "INSERT INTO useraccounts (status, username, email, password) VALUES ('$status', '$username', '$email', '$password')";

      mysqli_query($conn, $query);
      echo "Successfully signed up.";
      include('partials/footer.php'); 
      die;

    }elseif(!empty($username) && empty($email) && !empty($password)){
      echo "Please enter email";
    }elseif(!empty($username) && !empty($email) && empty($password)){
      echo "Please enter password";
    }elseif(empty($username) && !empty($email) && !empty($password)){
      echo "Please enter username";
    }else{
      echo "Please enter username and email and password";
    }
  }
  
?>

<?php include('partials/footer.php'); ?>