<?php 
session_start();

// HEADER
include_once('partials/header.php');
include_once('config/connect.php');
include_once('config/blog-manage.php');
include_once('config/functions.php');

$conn = get_connection();
$user_type = check_usertype($conn);

// Initialize $blog_id to null
$blog_id = null;

// Store the blog ID in a session variable if it's set in the POST request
if (isset($_POST['blogID'])) {
    $_SESSION['blogID'] = $_POST['blogID'];
    $blog_id = $_POST['blogID'];
} elseif (isset($_SESSION['blogID'])) {
    $blog_id = $_SESSION['blogID'];
}

if (isset($_POST['update'])) {
    $content_id = $_POST['content_id'];
    $title = $_POST['blogTitle' . $content_id];
    $caption = $_POST['blogText' . $content_id];
    $date = $_POST['blogDate'];
    $image = $_FILES['blogImage' . $content_id]['name'];

    if ($image) {
        $target_dir = "blog_db_sliderImages/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['blogImage' . $content_id]['tmp_name'], $target_file);
        $query_update = "UPDATE blogcontents SET blogTitle='$title', blogText='$caption', blogDate='$date', blogImage='$target_file' WHERE blogIDNum=$content_id";
    } else {
        $query_update = "UPDATE blogcontents SET blogTitle='$title', blogText='$caption', blogDate='$date' WHERE blogIDNum=$content_id";
    }

    if (mysqli_query($conn, $query_update)) {
        echo '<script>alert("Blog updated successfully!");</script>';
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$blogcontents = get_content($conn);
?>

<link rel="stylesheet" href="css/blog-article.css">
<form action="blog-article.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="content_id" id="content_id">

    <?php
    if ($blog_id) 
    {
        $modalClass = 'modal-'.$blog_id;
        $contentIdName= 'blogIDNum'.$blog_id;
        $contentTitleName = 'blogTitle'.$blog_id;
        $contentCaptionName = 'blogText'.$blog_id;
        $contentImageId = 'blogImage'.$blog_id;
        $customFileUploadClass = 'custom-file-upload custom-file-upload'.$blog_id;

        $query_IndivBlog = "SELECT * FROM blogcontents WHERE blogIDNum = $blog_id";
        $result = mysqli_query($conn, $query_IndivBlog);

        if ($result) 
        {
            while($blogArticle = $result->fetch_assoc()) 
            {
                if($user_type == 'admin'){
                    echo '
                    <div>
                        <button class="edit-btn" type="button" 
                        data-content-id="'. $blogArticle['blogIDNum'].'" 
                        data-content-title="'. $blogArticle['blogTitle'].'" 
                        data-content-caption="'. $blogArticle['blogText'].'" 
                        data-content-image="'.$blogArticle['blogImage'].'">EDIT BLOG<i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </div>
                    ';
                }
                // Convert the date to a timestamp and format it as "F j, Y"
                $timestamp = strtotime($blogArticle['blogDate']);
                $formatted_date = date("F j, Y", $timestamp);
                
                //START: ARTICLE CONTENT
                echo "
                <div class='backBtn'>
                    <a href='blog-allpost.php'><i class='fa-solid fa-arrow-left-long'></i></a>
                </div>
                <div class='MainContainer'>
                    <div class='ImageContainer'>
                        <img src='{$blogArticle['blogImage']}' alt=''>
                    </div>
                    <div class='TextContainer'>
                        <div class='ArticleContainer'>
                            <div class='title'>
                                <h1>{$blogArticle['blogTitle']}</h1>
                            </div>
                            <div class='content'>
                                <div class='date'>
                                    <h4>Uploaded on {$formatted_date}</h4>
                                </div>
                                <p>{$blogArticle['blogText']}</p>
                            </div>
                        </div>
                    </div>
                </div>
                ";
                //END: ARTICLE CONTENT

                echo '
                <!-- Start of Modal -->
                <div class="bg-modal '.$modalClass.'">
                    <div class="modal-content">
                        <img src="Icons/close-button.png" alt="CLOSE" class="blogClosePopupbtn">
                        <h2>UPDATE A BLOG</h2>
                        <div class="blog-to-add-input">
                            <p class="modal-title">TITLE</p>
                            <input type="text" class="edit-content blogTitle" name="'.$contentTitleName.'" value="'.$blogArticle['blogTitle'].'">
                        </div>
                        <div class="blog-to-add-input">
                            <p class="modal-date">DATE</p>
                            <input class="edit-content blogDate" type="date" id="blogDate" name="blogDate" required>
                        </div>
                        <div class="blog-to-add-input">
                            <p class="modal-caption">CAPTION</p>
                            <textarea class="edit-content blogCaption" name="'.$contentCaptionName.'">'.$blogArticle['blogText'].'</textarea>
                        </div>
                        <div class="blog-to-add-input">
                            <p class="modal-imgname">UPLOADED IMAGE</p>
                            <label class="'.$customFileUploadClass.'" for="'.$contentImageId.'">'.basename($blogArticle['blogImage']).'</label>
                            <input type="file" id="'.$contentImageId.'" name="'.$contentImageId.'" class="inputfile">
                        </div>
                        <input class="saveBtn" type="submit" name="update" value="Save">
                    </div>
                </div>
                <!-- End of Modal -->
                ';
            }
        } 
        else 
        {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
</form>

<!--BACKDROP EFFECT-->
<script>
document.querySelectorAll('.edit-btn').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var contentId = button.getAttribute('data-content-id');
        var modalClass = "modal-" + contentId;
        document.querySelector('.bg-modal.' + modalClass).style.display = 'flex';
        document.getElementById('content_id').value = contentId;
    });
});

document.querySelectorAll('.blogClosePopupbtn').forEach(function(element) {
    element.addEventListener('click', function() {
        var modal = element.closest('.bg-modal');
        modal.style.display = 'none';
    });
});

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
</script>
<?php
// FOOTER
include_once('partials/footer.php');
?>
