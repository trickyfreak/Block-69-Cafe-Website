<?php
include_once './config/connect.php';
$conn = get_connection();

if (isset($_POST['submit'])) {
    //Fetch Data
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title_barservices = mysqli_real_escape_string($conn, $_POST['title_barservices' . $id]);
    $content_barservices = mysqli_real_escape_string($conn, $_POST['content_barservices' . $id]);
    $image_barservices = 'image_barservices' . $id;
    if (isset($_FILES[$image_barservices])) {
        $file_name = $_FILES[$image_barservices]['name'];
        $temp_name = $_FILES[$image_barservices]['tmp_name'];
        $folder = './Images/' . $file_name;

        if (move_uploaded_file($temp_name, $folder)) {
            if (isset($_POST['id'])) {
                //Check Content Existence
                $check_query = "SELECT * FROM barservicescontent WHERE id = '$id'";
                $check_result = mysqli_query($conn, $check_query);

                if (mysqli_num_rows($check_result) > 0) {
                    $query = "UPDATE barservicescontent SET title_barservices = '$title_barservices', content_barservices = 
                    '$content_barservices', image_barservices = '$folder' WHERE id = '$id'";
                } else {
                    $query = "INSERT INTO barservicscontent (id, title_barservices, content_barservices, image_barservices) 
                    VALUES ('$id', '$title_barservices', '$content_barservices', '$folder')";
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
    $title_booking = mysqli_real_escape_string($conn, $_POST['title_booking' . $id]);
    $content_booking = mysqli_real_escape_string($conn, $_POST['content_booking' . $id]);
    $list_inclusion = mysqli_real_escape_string($conn, $_POST['list_inclusion' . $id]);
    $list_additional = mysqli_real_escape_string($conn, $_POST['list_additional' . $id]);

    if (isset($_POST['id'])) {
        // Check Content Existence
        $check_query = "SELECT * FROM barservicescontent WHERE id = '$id'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $query = "UPDATE barservicescontent SET title_booking = '$title_booking', content_booking = '$content_booking', 
                      list_inclusion = '$list_inclusion', list_additional = '$list_additional' WHERE id = '$id'";
        } else {
            $query = "INSERT INTO barservicescontent (id, title_booking, content_booking, list_inclusion, list_additional) 
                      VALUES ('$id', '$title_booking', '$content_booking', '$list_inclusion', '$list_additional')";
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
    // Fetch Data
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title_flavors = mysqli_real_escape_string($conn, $_POST['title_flavors' . $id]);
    $title_premium = mysqli_real_escape_string($conn, $_POST['title_premium' . $id]);
    $title_basic = mysqli_real_escape_string($conn, $_POST['title_basic' . $id]);
 
    if (isset($_POST['id'])) {
        // Check Content Existence
        $check_query = "SELECT * FROM barservicescontent WHERE id = '$id'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $query = "UPDATE barservicescontent SET title_flavors = '$title_flavors', title_premium = '$title_premium', 
                      title_basic = '$title_basic' WHERE id = '$id'";
        } else {
            $query = "INSERT INTO barservicescontent (id, title_flavors, title_premium, title_basic) 
                      VALUES ('$id', '$title_flavors', '$title_premium', '$title_basic')";
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
    // Fetch Data
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $premium_coffee = mysqli_real_escape_string($conn, $_POST['premium_coffee' . $id]);
  
    if (isset($_POST['id'])) {
        // Check Content Existence
        $check_query = "SELECT * FROM barservicescontent WHERE id = '$id'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $query = "UPDATE barservicescontent SET premium_coffee = '$premium_coffee' WHERE id = '$id'";
        } 
        else {
            $query = "INSERT INTO barservicescontent (id, premium_coffee) 
                      VALUES ('$id', '$premium_coffee')";
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
    // Fetch Data
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $premium_noncoffee = mysqli_real_escape_string($conn, $_POST['premium_noncoffee' . $id]);
  
    if (isset($_POST['id'])) {
        // Check Content Existence
        $check_query = "SELECT * FROM barservicescontent WHERE id = '$id'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $query = "UPDATE barservicescontent SET premium_noncoffee = '$premium_noncoffee' WHERE id = '$id'";
        } 
        else {
            $query = "INSERT INTO barservicescontent (id, premium_noncoffee) 
                      VALUES ('$id', '$premium_noncoffee')";
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
    // Fetch Data
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $basic_coffee = mysqli_real_escape_string($conn, $_POST['basic_coffee' . $id]);
  
    if (isset($_POST['id'])) {
        // Check Content Existence
        $check_query = "SELECT * FROM barservicescontent WHERE id = '$id'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $query = "UPDATE barservicescontent SET basic_coffee = '$basic_coffee' WHERE id = '$id'";
        } 
        else {
            $query = "INSERT INTO barservicescontent (id, basic_coffee) 
                      VALUES ('$id', '$basic_coffee')";
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
    // Fetch Data
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $basic_noncoffee = mysqli_real_escape_string($conn, $_POST['basic_noncoffee' . $id]);
  
    if (isset($_POST['id'])) {
        // Check Content Existence
        $check_query = "SELECT * FROM barservicescontent WHERE id = '$id'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $query = "UPDATE barservicescontent SET basic_noncoffee = '$basic_noncoffee' WHERE id = '$id'";
        } 
        else {
            $query = "INSERT INTO barservicescontent (id, basic_noncoffee) 
                      VALUES ('$id', '$basic_noncoffee')";
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



function get_content_by_id($conn, $content_id)
{
    $query = "SELECT * FROM barservicescontent WHERE content_id = '$content_id' ";

    $result = mysqli_query($conn, $query);
    $content_data = mysqli_fetch_assoc($result);
    return $content_data;
}

function get_content($conn)
{
    $query = "SELECT * FROM barservicescontent";

    $result = mysqli_query($conn, $query);
    $all_content = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $all_content;
}

?>