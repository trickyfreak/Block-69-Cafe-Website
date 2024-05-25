<?php 
session_start();

//HEADER
include_once('partials/header.php');
include_once('config/connect.php');
include_once('config/blog-manage.php');
include_once('config/functions.php');

$conn = get_connection();
$user_type = check_usertype($conn);
$blogcontents = get_content($conn);

$content_id = 0;
?>

<link rel="stylesheet" href="css/blog-article.css">

<form action="blog-allpost.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="content_id">
<?php
if (isset($_POST['blogID']))
{
    $blog_id = $_POST['blogID'];
    $modalClass = 'modal-'.$blog_id;
    $contentIdName= 'blogIDNum'.$blog_id;
    $contentTitleName = 'blogTitle'.$blog_id;
    $contentCaptionName = 'blogText'.$blog_id;
    $contentImageId = 'blogImage'.$blog_id;

    $query_IndivBlog = "SELECT * FROM blogcontents WHERE blogIDNum = $blog_id";
    $result = mysqli_query($conn, $query_IndivBlog);

    if ($result) {
        while($blogArticle = $result->fetch_assoc()) {
            if($user_type == 'admin'){
                echo '
                <div><button class="edit-btn" type="button" data-content-id="'. $blogArticle['blogIDNum'].'" data-content-title="'. $blogArticle['blogTitle'].'" data-content-caption="'. $blogArticle['blogText'].'" data-content-image="'.$blogArticle['blogImage'].'">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
                ';
            }
            echo '
            <!-- Start of Modal -->
            <div class="bg-modal '.$modalClass.'">
                <div class="modal-content">
                    <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
                    
                    <p class="modal-title">TITLE</p>
                    <textarea class="edit-content" name="'.$contentTitleName.'">'.$blogArticle['blogTitle'].'</textarea>
                    
                    <p class="modal-caption">CAPTION</p>
                    <textarea class="edit-content" name="'.$contentCaptionName.'">'.$blogArticle['blogText'].'</textarea>
                    
                    <div>
                    <input type="file" id="'.$contentImageId.'" name="'.$contentImageId.'" class="inputfile">
                    <label class="custom-file-upload" for="'.$contentImageId.'">Choose file</label>
                    
                    </div>
                    <input class="saveBtn" type="submit" name="submit">
                </div>
            </div>
            <!-- End of Modal -->
            ';
            
            //START: ARTICLE CONTENT
            echo "
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
                                <h4>Uploaded in {$blogArticle['blogDate']}</h4>
                            </div>
                            <p>{$blogArticle['blogText']}</p>
                        </div>
                    </div>
                </div>
            </div>
            ";
            //END: ARTICLE CONTENT

        }
    } else {
        echo "Error: " . mysqli_error($data);
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
    });
});

document.querySelectorAll('.close').forEach(function(element) {
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
//FOOTER
include_once('partials/footer.php');
?>
