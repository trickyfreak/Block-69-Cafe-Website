<?php 
session_start();
include_once './config/connect.php';
include_once './config/functions.php';

// Check if user is logged in and get user data
$conn = get_connection();
$user_data = check_login($conn);
$user_type = check_usertype($conn);

// HEADER
include_once('partials/header.php');
?>

<link rel="stylesheet" href="css/blog-allpost.css">

<!-- ADDING OR DELETING BLOG CONTENT -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
        // Retrieve form data
        $title_blog = $_POST['blogTitle'];
        $text_blog = $_POST['blogText'];
        $date_blog = $_POST['blogDate'];
        $image_blog = $_FILES['image_blog']['name'];

        // Upload image
        $dst = "./blog_db_images/" . $image_blog;
        $dbImages = "blog_db_images/" . $image_blog;
        move_uploaded_file($_FILES['image_blog']['tmp_name'], $dst);

        // Insert blog content into database
        $query = "INSERT INTO blogcontents (blogTitle, blogText, blogDate, blogImage) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ssss', $title_blog, $text_blog, $date_blog, $dbImages);
        $result = mysqli_stmt_execute($stmt);

        // Added Notification Message
        if ($result) {
            $_SESSION['blogUploadStatus'] = 'Your blog content has been added <b>successfully!</b>';
        } else {
            $_SESSION['blogUploadStatus'] = 'ERROR: ' . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
        header("Location: blog-allpost.php");
        exit();
    }

    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['blogToDelete'])) {
        $blogID = intval($_GET['blogToDelete']); // Sanitize input
        $query = "DELETE FROM blogcontents WHERE blogIDNum = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $blogID);
        $result = mysqli_stmt_execute($stmt);

        // Delete Notification Message
        if ($result) {
            $_SESSION['blogUploadStatus'] = 'The blog and its content was <b>successfully</b> deleted.';
        } else {
            $_SESSION['blogUploadStatus'] = 'ERROR: ' . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
        header("Location: blog-allpost.php");
        exit();
    }
    ?>
<!-- END ADDING OR DELETING BLOG CONTENT -->

<body class="blogBodyContainer">

<!-- MESSAGE SUCCESS (ADDED AND DELETED) -->
    <?php
    if (isset($_SESSION['blogUploadStatus'])) {
        echo '
        <div class="blogMessageSuccess" id="blogMessageSuccess">
            <div class="blogAlertMsg" role="alert">
                <strong>
                    <h3>Hey There!</h3>
                </strong> 
                <p>' . $_SESSION['blogUploadStatus'] . '</p>
                <img src="Icons/close-button-white.png" class="blogCloseAlertBtn" alt="CLOSE">
            </div>
        </div>
        ';
        unset($_SESSION['blogUploadStatus']);
    }
    ?>
<!-- MESSAGE SUCCESS (ADDED AND DELETED) -->

<!-- START: BLOG CONTENT -->
    <div class="BlogMainContainer" id="BlogmainContent">
        <div class="BlogDivider">
            <div class="TextContainer blog">
                <h1>Blog: All Content</h1>
            </div>
            <div class="ButtonContainer">
                <?php
                if($user_type == 'admin') {
                    echo '<button type="submit" class="add_blog_btn" onclick="blog_openPopUp()"><i class="fa-solid fa-plus"></i>ADD BLOG</button>';
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
                            <input type="date" id="blogDate" name="blogDate">
                            <!-- <input type="text" name="blogDate" id="blogDate" placeholder="(Ex: November 04, 2004)" required> -->
                        </div>
                        <div class="blog-to-add-input">
                            <label for="blogText">CAPTION</label>
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

        <!-- CONTENT PREVIEW OF BLOG -->
                <?php
                $query = "SELECT * FROM blogcontents";
                $result = mysqli_query($conn, $query);

                
                if ($result) 
                {
                    if($user_type == 'admin') {
                    echo
                    "
                    <div class='BlogMainContainer' id='BlogmainContent'>
                    <div class='BlogContainer'>
                    ";
                    // PREVIEW: ADMIN SIDE
                    while($content = $result->fetch_assoc()) 
                    {
                        if($user_type == 'admin') {
                        echo 
                        "<div class='indivblog'>
                            <div class='blog-group'>
                                <img height='150' width='150' src='{$content['blogImage']}' alt='Blog Image'>
                                <h2>{$content['blogTitle']}</h2>
                                <form method='post' action='blog-article.php'>
                                    <input type='hidden' name='blogID' value='{$content['blogIDNum']}'>
                                    <button class='blogReadMore' name='blogIndivArticle'>Read More</button>
                                </form>";
                        }
                        
                        if($user_type == 'admin') {
                            echo "<a class='blogToDelete' href='?action=delete&blogToDelete={$content['blogIDNum']}'><i class='fa-regular fa-trash-can'></i></a>";
                        }
                        echo "</div></div>";
                    }
                    echo
                    "
                    </div></div>
                    ";
                    }
                // PREVIEW: ADMIN SIDE

                // PREVIEW: CUSTOMER SIDE
                    echo
                    "
                    <div class='ctmr_BlogMainContainer' id='BlogmainContent'>
                    <div class='ctmr_BlogContainer'>
                    "; 
                        while($customerContent = $result->fetch_assoc()) 
                        {
                            echo
                            "
                                <div class='ctmr_indivblog'>
                                    <div class='ctmr_blog-group'>
                                        <img height='150' width='150' src='{$customerContent['blogImage']}' alt='Blog Image'>
                                        <h2>{$customerContent['blogTitle']}</h2>
                                        <form method='post' action='blog-article.php'>
                                            <input type='hidden' name='blogID' value='{$customerContent['blogIDNum']}'>
                                            <button class='ctmr_blogReadMore' name='blogIndivArticle'>Read More</button>
                                        </form>
                                    </div>
                                </div>
                            ";
                        }
                // PREVIEW: CUSTOMER SIDE
                    echo
                    "
                    </div>
                    </div>
                    ";


                } 
                else {
                    echo "Error: " . mysqli_error($conn);
                }
                mysqli_close($conn);
                ?>

        <!-- END CONTENT PREVIEW OF BLOG -->

    </div>
<!-- END: BLOG CONTENT -->


<!-- START: JavaScript for Popup -->
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
<!-- END: JavaScript for Popup -->


<?php
// FOOTER
include_once('partials/footer.php');
?>
