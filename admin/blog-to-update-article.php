<?php
session_start();
include('config.php'); // Include your database connection file

if (isset($_POST['blogIDNum'])) {
    $blogIDNum = $_POST['blogIDNum'];
    $blogTitle = $_POST['blogTitle'];
    $blogText = $_POST['blogText'];
    $blogDate = $_POST['blogDate'];

    // Handle the file upload if a new image is uploaded
    if (!empty($_FILES['blogImage']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["blogImage"]["name"]);
        move_uploaded_file($_FILES["blogImage"]["tmp_name"], $target_file);
        $blogImage = $target_file;
    } else {
        $blogImage = $_POST['currentImage'];
    }

    $query = "UPDATE blogcontents SET blogTitle='$blogTitle', blogText='$blogText', blogDate='$blogDate', blogImage='$blogImage' WHERE blogIDNum=$blogIDNum";
    if (mysqli_query($conn, $query)) {
        echo "Blog updated successfully";
    } else {
        echo "Error updating blog: " . mysqli_error($conn);
    }
}
?>
