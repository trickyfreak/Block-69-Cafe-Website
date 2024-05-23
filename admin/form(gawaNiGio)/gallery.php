<?php
$conn = get_connection();
$img_id = $_POST['img_ID'];

$file_name = $_FILES['file-img']['name'];
$temp_name = $_FILES['file-img']['tmp_name'];
$img_url = './galleryImages/' . $file_name;
move_uploaded_file($temp_name, $img_url);

$conn->query("
  UPDATE galleryimage 
  SET img = '$img_url'
  WHERE img_ID = '$img_id'
");
