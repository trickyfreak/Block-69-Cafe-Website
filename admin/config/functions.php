<?php 

// function check_login($conn){

//   if(isset($_SESSION['username'])){
//     $username = $_SESSION['username'];
//     $query = "SELECT * FROM useraccounts WHERE username = '$username'";

//     $result = mysqli_query($conn, $query);
    
//     if($result && mysqli_num_rows($result) > 0){
//       $user_data = mysqli_fetch_assoc($result);
//       echo "User Logged in";
//       return $user_data;
//     }
//   }else{
//     echo "No User Logged in";
//   }
// }

function get_user_data($conn){
  $username = $_SESSION['username'];
  $query = "SELECT * FROM useraccounts WHERE username = '$username'";

  $result = mysqli_query($conn, $query);
  
  if($result && mysqli_num_rows($result) > 0){
    $user_data = mysqli_fetch_assoc($result);
    echo "User Logged in";
    return $user_data;
  }
}

function check_login($conn){
  return isset($_SESSION['username']);
}