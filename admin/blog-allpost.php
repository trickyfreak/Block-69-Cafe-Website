<?php 
session_start();
include_once './config/connect.php';
include_once './config/functions.php';

$conn = get_connection();
$user_data = check_login($conn);
$user_type = check_usertype($conn);

//HEADER
include_once('partials/header.php');
?>

<link rel="stylesheet" href="css/blog-allpost.css">

<!--START: ADDING OF BLOG CONTENT-->
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "block69cafe";

$data = mysqli_connect($host, $user, $password, $database);

if ($data === false) {
    die("CONNECTION ERROR");
}
//DECLARING DATA
if (isset($_POST['submit'])) {
    // STORAGE OF DATA
    $title_blog = $_POST['blogTitle'];
    $text_blog = $_POST['blogText'];
    $date_blog = $_POST['blogDate'];
    $image_blog = $_FILES['image_blog']['name'];

    $dst = "./blog_db_images/" . $image_blog;
    $dbImages = "blog_db_images/" . $image_blog;

    move_uploaded_file($_FILES['image_blog']['tmp_name'], $dst);

    $query = "INSERT INTO blogcontents(blogTitle, blogText, blogDate, blogImage) 
              VALUES('$title_blog', '$text_blog', '$date_blog', '$dbImages')";

    //NOTIFICATION
    $result = mysqli_query($data, $query);
    if ($result) {
        $_SESSION['blogUploadStatus'] = 'BLOG CONTENT INSERTED SUCCESSFULLY!';
        // Get the last inserted ID
        $blog_last_id = mysqli_insert_id($data);
        $_SESSION['last_inserted_id'] = $blog_last_id;
    } else {
        $_SESSION['blogUploadStatus'] = 'ERROR';
    }
    header("Location: blog-allpost.php");
    exit();
}
?>
<!--END: ADDING OF BLOG CONTENT-->

<body class="blogBodyContainer">

<!--START: MESSAGE OF UPLOAD SUCCESS-->
<?php
if (isset($_SESSION['blogUploadStatus'])) {
    echo '
    <div class="blogMessageSuccess" id="blogMessageSuccess">
        <div class="blogAlertMsg" role="alert">
            <strong>
                <h3>Congratulations!</h3>
            </strong> 
            <p>You inserted your Blog Content 
                <b>Successfully!</b>
            </p>
            <img src="Icons/close-button-white.png" class="blogCloseAlertBtn" alt="CLOSE">
        </div>
    </div>
    ';
    unset($_SESSION['blogUploadStatus']);
}
?>
<!--END: MESSAGE OF UPLOAD SUCCESS-->

<!--START: BLOG CONTENT-->
<div class="BlogMainContainer" id="BlogmainContent">
    <div class="BlogDivider">
        <div class="TextContainer blog">
            <h1>Blog: All Content</h1>
        </div>
        <div class="ButtonContainer">
            <?php
            if($user_type == 'admin')
            {
            ?>
            <button type="submit" class="add_blog_btn" onclick="blog_openPopUp()">ADD BLOG</button>
            <?php
            }
            ?>
            <!-- START: POPUP and BACKDROP -->
            <div id="blogBackdrop" class="blogBackdrop"></div>
            <div class="blog_PopUp" id="blog_PopUp">
                <form action="blog-allpost.php" method="post" enctype="multipart/form-data">
                    <img src="Icons/close-button.png" alt="CLOSE" class="blogClosePopupbtn">
                    <h2>ADD A BLOG</h2>
                    <div class="blog-to-add-input">
                        <label for="blogTitle">TITLE</label>
                        <br>
                        <input type="text" name="blogTitle" id="blogTitle" placeholder="Title of the Blog" required>
                    </div>
                    <div class="blog-to-add-input">
                        <label for="blogTitle">DATE</label>
                        <br>
                        <input type="text" name="blogDate" id="blogDate" placeholder="(Ex: November 04, 2004)" required>
                    </div>
                    <div class="blog-to-add-input">
                        <label for="blogText">CONTENT</label>
                        <br>
                        <textarea name="blogText" id="blogText" placeholder="Content of the Blog (Minimum: 120 Words)" required></textarea>
                    </div>
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
        
        </div>
        <hr>
    </div>

    <!--BACKDROP EFFECT-->
    <script>
        let blog_PopUp = document.getElementById("blog_PopUp");
        let BlogmainContent = document.getElementById("BlogmainContent");
        let blogBackdrop = document.getElementById("blogBackdrop");

        // Notification Success
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

<!--START: CONTENT PREVIEW OF BLOG-->
<?php
$query = "SELECT * FROM blogcontents";
$result = mysqli_query($data, $query);

if ($result) {
    echo "<div class='BlogMainContainer' id='BlogmainContent'>
        <div class='BlogContainer'>";

    while($content = $result->fetch_assoc()) {
        echo "
        <div class='indivblog'>
            <div class='blog-group'>
                <img height='150' width='150' src='{$content['blogImage']}' alt='Blog Image'>
                <h2>{$content['blogTitle']}</h2>
                <form method='post' action='blog-article.php'>
                    <input type='hidden' name='blogID' value='{$content['blogIDNum']}'>
                    <button class='blogReadMore' name='blogIndivArticle'>Read More</button>
                </form>";
    
                if($user_type == 'admin') 
                {
                    echo "
                    <form action='blog-to-delete.php' method='GET'>
                        <input type='hidden' name='blogID' value='{$content['blogIDNum']}'>
                        <button type='submit' class='blogToDelete' name='blogToDelete'><i class='fa-regular fa-trash-can'></i></button>
                    </form>";
                }
                echo "
            </div>
        </div>";
    }            
    echo "</div></div>";
} else {
    echo "Error: " . mysqli_error($data);
}
mysqli_close($data);
?>
<!--END: CONTENT PREVIEW OF BLOG-->


<?php
//FOOTER
include_once('partials/footer.php');
?>