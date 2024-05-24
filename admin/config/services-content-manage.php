<?php 
include_once './config/connect.php';
$conn = get_connection();

function get_services_content($conn) {
    $query = "SELECT * FROM servicescontent";
    $result = mysqli_query($conn, $query);
    $all_content = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $all_content;
}

// Handle content addition/editing
if (isset($_POST['submit'])) {
    // Fetch Data
    $content_id = mysqli_real_escape_string($conn, $_POST['content_id']);
    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
    $content_title = mysqli_real_escape_string($conn, $_POST['content_title']);
    $content_caption = mysqli_real_escape_string($conn, $_POST['content_caption']);

    $uploaded_files = [];
    $file_columns = ['content_image1', 'content_image2', 'content_image3', 'content_image4', 'content_image5'];

    // Debugging: Print uploaded files
    echo '<pre>';
    print_r($_FILES['content_images']);
    echo '</pre>';

    // Handle file uploads
    if (isset($_FILES['content_images']) && is_array($_FILES['content_images']['name']) && count($_FILES['content_images']['name']) > 0) {
        for ($i = 0; $i < count($_FILES['content_images']['name']); $i++) {
            if (!empty($_FILES['content_images']['name'][$i])) {
                $file_name = $_FILES['content_images']['name'][$i];
                $temp_name = $_FILES['content_images']['tmp_name'][$i];
                $folder = './Events Images/' . $file_name;

                // Debugging: Print file move status
                if (move_uploaded_file($temp_name, $folder)) {
                    $uploaded_files[] = $folder;
                } else {
                    echo "Failed to move uploaded file: $file_name<br>";
                    echo "Temp file: $temp_name<br>";
                    echo "Target directory: $folder<br>";
                }
            }
        }
    }

    // Prepare columns and values for SQL query
    $columns = ['event_name', 'content_title', 'content_caption'];
    $values = ["'$event_name'", "'$content_title'", "'$content_caption'"];

    for ($i = 0; $i < count($uploaded_files); $i++) {
        if (isset($file_columns[$i])) {
            $columns[] = $file_columns[$i];
            $values[] = "'".$uploaded_files[$i]."'";
        }
    }

    // Check Content Existence
    $check_query = "SELECT * FROM servicescontent WHERE content_id = '$content_id'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Update existing content
        $update_values = [];
        for ($i = 0; $i < count($columns); $i++) {
            $update_values[] = $columns[$i] . " = " . $values[$i];
        }
        $query = "UPDATE servicescontent SET " . implode(', ', $update_values) . " WHERE content_id = '$content_id'";
    } else {
        // Insert new content
        $query = "INSERT INTO servicescontent (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $values) . ")";
    }

    // Debugging: Print query
    echo $query . "<br>";

    // Execute query
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
?>
