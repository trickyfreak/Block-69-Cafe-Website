<?php 
function check_login($conn){
  return isset($_SESSION['username']);
}

function check_usertype($conn){
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  
    $query = "SELECT status FROM useraccounts WHERE username = '$username'";
  
    $result = mysqli_query($conn, $query);
    
    if($result && mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result); 
      $userStatus = $row['status'];
  
      return $userStatus;
    }
  }
}
