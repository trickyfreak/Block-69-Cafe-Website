<link rel="stylesheet" href="css/blog-toedit-slider.css">
<?php
session_start();
include_once('partials/header.php');

$host = "localhost";
$user = "root";
$password = "";
$database = "block69cafe";

$data = mysqli_connect($host, $user, $password, $database);
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['blogSliderID'])) {
    $blogSliderID = intval($_GET['blogSliderID']); // Use intval to sanitize input
    $querySlider = "DELETE FROM blogslider WHERE blogIDNum = ?";
    
    $stmt = mysqli_prepare($data, $querySlider);
    mysqli_stmt_bind_param($stmt, 'i', $blogSliderID);
    $resultSlider = mysqli_stmt_execute($stmt);
    
    if ($resultSlider) {
        $_SESSION['blogUploadStatus'] = 'BLOG CONTENT DELETED SUCCESSFULLY!';
    } else {
        $_SESSION['blogUploadStatus'] = 'ERROR: NOT DELETED';
    }
    mysqli_stmt_close($stmt);
    header("Location: blog-toedit-slider.php");
    exit();
}

$query = "SELECT * FROM blogslider";
$result = mysqli_query($data, $query);
?>

<!-- NOTIFICATION: CONTENT -->
<?php
if (isset($_SESSION['blogUploadStatus'])) {
    echo '
    <div class="blogMessageSuccess" id="blogMessageSuccess">
        <div class="blogAlertMsg" role="alert">
            <strong>
                <h3>Hey There!</h3>
            </strong> 
            <p>You Deleted an Image <b>Successfully!</b></p>
            <img src="Icons/close-button-white.png" class="blogCloseAlertBtn" alt="CLOSE">
        </div>
    </div>
    ';
    unset($_SESSION['blogUploadStatus']);
}
?>
<!-- NOTIFICATION: CONTENT -->


<!-- NOTIFICATION EFFECT -->
<script>
document.addEventListener("DOMContentLoaded", function() 
        {
        let blogMessageSuccess = document.getElementById("blogMessageSuccess");
        if (blogMessageSuccess) 
        {
            document.querySelector(".blogCloseAlertBtn").addEventListener("click", function() 
            {
                blogMessageSuccess.classList.add("hidden"); // Add hidden class for transition effect
                setTimeout(() => blogMessageSuccess.style.display = "none", 500); // Ensure element is removed after transition
            });
        }
        });
</script>
<!-- NOTIFICATION EFFECT -->


<!-- CONTENT: TABLE -->
<div class="tablecontainer">
    <table class="tableclass">
        <tr>
            <th class="th_id">ID</th>
            <th class="th_img">IMAGES</th>
            <th class="th_edit">EDIT</th>
            <th class="th_delete">DELETE</th>
        </tr>

        <?php
        while ($blogImageContent = $result->fetch_assoc()) {
            echo '
            <tr>
                <td>
                    <h4>' . $blogImageContent['blogIDNum'] . '</h4>
                </td>
                <td>
                    <img src="' . $blogImageContent['blogSliderImage'] . '" alt="">
                </td>
                <td class="sliderEditBtn">
                    <a class="add_blog_btn" href="edit.php?id=' . $blogImageContent['blogIDNum'] . '">EDIT</a>
                </td>
                <td class="sliderDeleteBtn">
                    <input type="hidden" name="blogSliderID" value="' . $blogImageContent['blogIDNum'] . '">
                    <a href="?action=delete&blogSliderID=' . ($blogImageContent['blogIDNum']) . '">DELETE</a>
                </td>
            </tr>';
        }
        ?>
    </table>
</div>

<!-- <button type="submit" class="add_blog_btn" onclick="blog_openPopUp()" id='.$blogImageContent['blogIDNum'].'>EDIT</button> -->

<!-- CONTENT: TABLE -->






<!-- START: POPUP and BACKDROP -->
            <div id="blogBackdrop" class="blogBackdrop"></div>
            <div class="blog_PopUp" id="blog_PopUp">
                <form action="blog-toedit-slider.php" method="post" enctype="multipart/form-data">
                    <img src="Icons/close-button.png" alt="CLOSE" class="blogClosePopupbtn">
                    <h2>UPDATE IMAGE</h2>
                    <div class="blog-to-add-input">
                        <label for="image_blog">INSERT IMAGE</label>
                        <br>
                        <input type="file" name="image_blog" id="image_blog" required>
                    </div>
                    <div class="submitBtn">
                        <input type="submit" name="submit" value="Upload Data" onclick="blog_closePopUp()">
                    </div>
                </form>
            </div>
<!-- END: POPUP and BACKDROP -->

<!--START: BACKDROP EFFECT-->
<script>
    let blog_PopUp = document.getElementById("blog_PopUp");
    let blogBackdrop = document.getElementById("blogBackdrop");

    document.addEventListener("DOMContentLoaded", function() {
        let blogMessageSuccess = document.getElementById("blogMessageSuccess");
        if (blogMessageSuccess) {
            document.querySelector(".blogCloseAlertBtn").addEventListener("click", function() {
                blogMessageSuccess.classList.add("hidden"); // Add hidden class for transition effect
                setTimeout(() => blogMessageSuccess.style.display = "none", 500); // Ensure element is removed after transition
            });
        }
    });

    function blog_openPopUp() {
        blog_PopUp.classList.add("blog-open-popup");
        blogBackdrop.classList.add('blogBackdrop-active');
    }

    function blog_closePopUp() {
        blog_PopUp.classList.remove("blog-open-popup");
        blogBackdrop.classList.remove('blogBackdrop-active');
    }

    document.querySelector(".blogClosePopupbtn").addEventListener("click", function() {
        blog_PopUp.classList.remove("blog-open-popup");
        blogBackdrop.classList.remove('blogBackdrop-active');
    });
</script>
<!--END: BACKDROP EFFECT-->



<?php
mysqli_close($data);
include_once('partials/footer.php');
?>
