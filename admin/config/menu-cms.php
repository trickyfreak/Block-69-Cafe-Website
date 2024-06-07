<?php
  include_once('config/functions.php');
  include_once('config/connect.php');
  $conn = get_connection();

  function get_all_categories($conn) {
    $query = "SELECT * FROM menucategory";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $categories;
    } else {
        return [];
    }
  }

  function get_all_items($conn) {
      $query = "SELECT * FROM menuitems";
      $result = mysqli_query($conn, $query);
      if ($result) {
          $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
          mysqli_free_result($result);
          return $items;
      } else {
          return [];
      }
  }

  // Handle content deletion
  if (isset($_POST['delete_content_id'])) {
      $delete_content_id = mysqli_real_escape_string($conn, $_POST['delete_content_id']);
      $query = "DELETE FROM menucategory WHERE product_id = '$delete_content_id'";
      
      if (mysqli_query($conn, $query)) {
          echo '
          <script>
              if (window.history.replaceState) {
                  window.history.replaceState(null, null, window.location.href);
              }
              window.location.reload();
          </script>
          ';
      } else {
          echo "Error deleting record: " . mysqli_error($conn);
      }
  }

  // Handle content addition/editing
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['add'])) {
      $content_category = mysqli_real_escape_string($conn, $_POST['content_category']);
      $content_name = mysqli_real_escape_string($conn, $_POST['content_title']);
      $content_subname = mysqli_real_escape_string($conn, $_POST['content_caption']);
      $content_image_name = 'content_image';
      $file_name = '';
      $folder = '';

      // Check if a new image is uploaded
      if (!empty($_FILES[$content_image_name]['name'])) {
          $file_name = $_FILES[$content_image_name]['name'];
          $temp_name = $_FILES[$content_image_name]['tmp_name'];
          $folder = './Images/' . $file_name;
          move_uploaded_file($temp_name, $folder);
      }

      // Check if the category already exists
      $check_query = "SELECT * FROM menucategory WHERE LOWER(product_name) = LOWER('$content_name')";
      $check_result = mysqli_query($conn, $check_query);
      if (mysqli_num_rows($check_result) > 0) {
          echo "Error: Category already exists.";
          // $query = "UPDATE menucategory SET content_title = '$content_title', content_caption = '$content_caption', content_image = '$folder' WHERE content_id = '$content_id'";
      } else {
          // Insert new content
          $query = "INSERT INTO menucategory (product_category, product_name, product_subname, product_image) VALUES ('$content_category', '$content_name', '$content_subname', '$folder')";

          if (mysqli_query($conn, $query)) {
              echo '
              <script>
                  if (window.history.replaceState) {
                      window.history.replaceState(null, null, window.location.href);
                  }
                  window.location.reload();
              </script>
              ';
          } else {
              echo "Error: " . $query . "<br>" . mysqli_error($conn);
          }
      }
    }
  }
?>