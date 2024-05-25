
<html>
<header>
    <link rel="icon" href="icons/newlogo-light.png">
    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/blog-allpost.css">    
    <title></title>
</header>

<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "block69cafe";
$data = mysqli_connect($host, $user, $password, $database);

$blogID = $_GET['blogID'];
$query = "DELETE FROM blogcontents WHERE blogIDNum = '$blogID'";
$result = mysqli_query($data, $query);

if($result)
{   
    echo 
    "
    <div class='mainContainerToDelete'>
        <div class='blogToDelete'>
            <img src='icons/check-mark.png' alt='check mark' class='blogCheckMark'>
            <h2>DELETED SUCCESSFULLY!</h2>
        </div>
    </div> 
    ";
}
else
{
    echo "ERROR: NOT DELETED";
}
?>

