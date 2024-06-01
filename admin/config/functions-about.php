<?php
include_once './config/connect.php';
$conn = get_connection();

if (isset($_POST['submit'])) {
    //Fetch Data
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title_header = mysqli_real_escape_string($conn, $_POST['title_header' . $id]);
    $title_caption = mysqli_real_escape_string($conn, $_POST['title_caption' . $id]);
    $content_caption = mysqli_real_escape_string($conn, $_POST['content_caption' . $id]);
    $image_about = 'image_about' . $id;
    if (isset($_FILES[$image_about])) {
        $file_name = $_FILES[$image_about]['name'];
        $temp_name = $_FILES[$image_about]['tmp_name'];
        $folder = './Images/' . $file_name;

        if (move_uploaded_file($temp_name, $folder)) {
            if (isset($_POST['id'])) {
                //Check Content Existence
                $check_query = "SELECT * FROM aboutcontent WHERE id = '$id'";
                $check_result = mysqli_query($conn, $check_query);

                if (mysqli_num_rows($check_result) > 0) {
                    $query = "UPDATE aboutcontent SET title_header = '$title_header', title_caption = '$title_caption', content_caption = '$content_caption', image_about = '$folder' WHERE id = '$id'";
                } else {
                    $query = "INSERT INTO aboutcontent (id, title_header, title_caption, content_caption, image_about) 
                    VALUES ('$id', '$title_header', '$title_caption', '$content_caption', '$folder')";
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

if (isset($_POST['submit'])) {
    //Fetch Data
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title_mission = mysqli_real_escape_string($conn, $_POST['title_mission' . $id]);
    $caption_mission = mysqli_real_escape_string($conn, $_POST['content_mission' . $id]);
    $title_vision = mysqli_real_escape_string($conn, $_POST['title_vision' . $id]);
    $caption_vision = mysqli_real_escape_string($conn, $_POST['content_vision' . $id]);
    $image2_about = 'image2_about' . $id;
    if (isset($_FILES[$image2_about])) {
        $file_name = $_FILES[$image2_about]['name'];
        $temp_name = $_FILES[$image2_about]['tmp_name'];
        $folder = './Images/' . $file_name;

        if (move_uploaded_file($temp_name, $folder)) {
            if (isset($_POST['id'])) {
                //Check Content Existence
                $check_query = "SELECT * FROM aboutcontent WHERE id = '$id'";
                $check_result = mysqli_query($conn, $check_query);

                if (mysqli_num_rows($check_result) > 0) {
                    $query = "UPDATE aboutcontent SET title_mission = '$title_mission', content_mission = '$caption_mission', 
                    title_vision = '$title_vision', content_vision = '$caption_vision', image2_about = '$folder' WHERE id = '$id'";
                } else {
                    $query = "INSERT INTO aboutcontent (id, title_mission, content_mission, title_vision, content_vision, image2_about) 
                    VALUES ('$id', '$title_mission', '$caption_mission, '$title_vision', '$caption_vision', '$folder')";
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

if (isset($_POST['submit'])) {
    // Fetch Data
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title_competitive = mysqli_real_escape_string($conn, $_POST['title_competitive' . $id]);
    $caption_competitive = mysqli_real_escape_string($conn, $_POST['caption_competitive' . $id]);
    $caption_competitive2 = mysqli_real_escape_string($conn, $_POST['caption2nd_competitive' . $id]);

    if (isset($_POST['id'])) {
        // Check Content Existence
        $check_query = "SELECT * FROM aboutcontent WHERE id = '$id'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $query = "UPDATE aboutcontent SET title_competitive = '$title_competitive', caption_competitive = '$caption_competitive', 
                      caption2nd_competitive = '$caption_competitive2' WHERE id = '$id'";
        } else {
            $query = "INSERT INTO aboutcontent (id, title_competitive, caption_competitive, caption2nd_competitive) 
                      VALUES ('$id', '$title_competitive', '$caption_competitive', '$caption_competitive2')";
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

if (isset($_POST['submit'])) {
    //Fetch Data
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title_landscape = mysqli_real_escape_string($conn, $_POST['title_landscape' . $id]);
    $caption_landscape = mysqli_real_escape_string($conn, $_POST['content_landscape' . $id]);
   
    $image3_about = 'image3_about' . $id;
    if (isset($_FILES[$image3_about])) {
        $file_name = $_FILES[$image3_about]['name'];
        $temp_name = $_FILES[$image3_about]['tmp_name'];
        $folder = './Images/' . $file_name;

        if (move_uploaded_file($temp_name, $folder)) {
            if (isset($_POST['id'])) {
                //Check Content Existence
                $check_query = "SELECT * FROM aboutcontent WHERE id = '$id'";
                $check_result = mysqli_query($conn, $check_query);

                if (mysqli_num_rows($check_result) > 0) {
                    $query = "UPDATE aboutcontent SET title_landscape = '$title_landscape', content_landscape = '$caption_landscape', 
                    image3_about = '$folder' WHERE id = '$id'";
                } else {
                    $query = "INSERT INTO aboutcontent (id, title_landscape, content_landscape, image3_about) 
                    VALUES ('$id', '$title_landscape', '$caption_landscape, '$folder')";
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


function get_content_by_id($conn, $id)
{
    $query = "SELECT * FROM aboutcontent WHERE id = '$id' ";
  
    $result = mysqli_query($conn, $query);
    $content_data = mysqli_fetch_assoc($result);
    return $content_data;
}

function get_content($conn)
{
    $query = "SELECT * FROM aboutcontent";
    $result = mysqli_query($conn, $query);
    $all_content = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $all_content;
}

?>
