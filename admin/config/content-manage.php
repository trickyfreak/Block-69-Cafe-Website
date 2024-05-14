
<?php 
include_once './config/connect.php';
$conn = get_connection();

if (isset($_POST['submit'])) {
    //Fetch Data
    $content_id = mysqli_real_escape_string($conn, $_POST['content_id']);
    $content_title = mysqli_real_escape_string($conn, $_POST['content_title'.$content_id]);
    $content_caption = mysqli_real_escape_string($conn, $_POST['content_caption'.$content_id]);
    $content_image_name = 'content_image'.$content_id;
    if (isset($_FILES[$content_image_name])) {
        $file_name = $_FILES[$content_image_name]['name'];
        $temp_name = $_FILES[$content_image_name]['tmp_name'];
        $folder = './Images/' . $file_name;
  
        if (move_uploaded_file($temp_name, $folder)) {
            if (isset($_POST['content_id'])) {
              //Check Content Existence
              $check_query = "SELECT  * FROM homecontent WHERE content_id = '$content_id'";
              $check_result = mysqli_query($conn, $check_query);
              
              if (mysqli_num_rows($check_result) > 0) {
                  $query = "UPDATE homecontent SET content_title = '$content_title', content_caption = '$content_caption', content_image = '$folder' WHERE content_id = '$content_id'";
              } else {
                  $query = "INSERT INTO homecontent (content_id, content_title, content_caption, content_image) VALUES ('$content_id', '$content_title', '$content_caption', '$folder')";
              }
  
              if (mysqli_query($conn, $query)) {
                  echo '
                  <script>
                      if ( window.history.replaceState ) {
                          window.history.replaceState( null, null, window.location.href );
                      }
                  </script>
                  ';
              } else {
                  echo "Error: " . $query . "<br>" . mysqli_error($conn);
              }
            } else {
                echo "Error: content_id is not set.";
            }
        }
    }
}

function get_content_by_id($conn, $content_id){
  $query = "SELECT * FROM homecontent WHERE content_id = '$content_id' ";

  $result = mysqli_query($conn, $query);
  $content_data = mysqli_fetch_assoc($result);
  return $content_data;
}

function get_content($conn){
  $query = "SELECT * FROM homecontent";

  $result = mysqli_query($conn, $query);
  $all_content = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $all_content;
}

?>
