
<?php 

session_start();
include('partials/header.php'); 
include_once './config/connect.php';
include_once './config/functions.php';
include_once './config/services-content-manage.php';

$conn = get_connection();
$user_data = check_login($conn);
$user_type = check_usertype($conn);

//fetching data
$content = get_services_content($conn);
$content_id = 0;

?>

<link rel="stylesheet" href="css/services.css">

  <div class="landing-page"> 
    <video autoplay loop muted plays-inline class="outsideblk-video" src="videos/outsideblk.mp4"></video>
    <div class="content">
        <h1>BLOCK 69 CAFÉ</h1>
        <p class="quote">Discover Coffee, Packages, and Services!</p>
    </div>
  </div>

  <div class="page-title-container">
    <div class="page-title">
    <h1>DISCOVER COFFEE, PACKAGES, AND SERVICES!</h1>
  </div>
  </div>

  <div class="exploreNav-container">
    <div class="explore-nav">
        <div class="container">
            <img src="Images/cafebooking.JPG" alt="">
            <div class="title">
            <h6>Cafe Booking Packages</h6>
            <p>Introducing our Cafe Booking Packages - your gateway to unforgettable moments! Our versatile packages fulfill your every need with premium amenities and ambiance. Let us transform your event dreams into reality. Book now and let the enchantment commence!</p>
                <a class="learn-more" href="cafe-booking-services.html">Learn More</a>
            </div>
        </div>
        <div class="container">
            <img src="Images/bar2.JPG" alt="">
            <div class="title">
            <h6>Coffee Bar Services</h6>
            <p>Sip, savor, and celebrate with our exquisite coffee bar and delightful souvenirs! 
                From lattes to non-coffee drinks, we've got your event covered. 
                Explore our packages at the button below and let the aroma of exceptional coffee elevate your experience. </p>
                <a class="learn-more" href="coffee-bar-services.html">Learn More</a>
            </div>
        </div>
    </div>
  </div>
    <form action="services.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="content_id">
    <?php

    if($user_type == 'admin'){
        echo '
        <div style="background-color: white; margin: 2em;">
        
            <button class="add-btn" name="edit-btn"><i class="fa-solid fa-plus"></i> Add Content</button>
        
        </div>
        ';
        echo '
        <!-- Start of Add Modal -->
        <div class="bg-modal-add">
        <div class="modal-content-add">
            <div class="close"><i class="fa-solid fa-square-xmark" style="color: black;"></i></div>
            <p class="modal-title">EVENT NAME</p>
            <textarea class="edit-content" name="event_name"></textarea>
            <p class="modal-title">TITLE</p>
            <textarea class="edit-content" name="content_title"></textarea>
            <p class="modal-caption">CAPTION</p>
            <textarea class="edit-content" name="content_caption"></textarea>
            <div>
            <label for="image" id="file-upload-label" class="custom-file-upload">Upload 5 images</label>
            <input type="file" id="image" class="inputfile" name="content_images" multiple>
            </div>
            <input class="saveBtn" type="submit" name="submit">
        </div>
        </div>
        <!-- End of Modal -->';
    }

    foreach ($content as $row) {
    $modalClass = 'modal-'.$row['content_id'];
    $contentIdName= 'content_id'.$row['content_id'];
    $contentTitleName = 'content_title'.$row['content_id'];
    $contentCaptionName = 'content_caption'.$row['content_id'];
    $image1 = 'content_image1'.$row['content_id'];
    $image2 = 'content_image2'.$row['content_id'];
    $image3 = 'content_image3'.$row['content_id'];
    $image4 = 'content_image4'.$row['content_id'];
    $image5 = 'content_image5'.$row['content_id'];
    $customFileUploadClass = 'custom-file-upload custom-file-upload'.$row['content_id'];

    if($user_type == 'admin'){
        // echo '
        
        // <div><button class="edit-btn" name="edit-btn" data-content-id="'.$row['content_id'].'" data-content-title="'. $row['content_title'].'" data-content-caption="'. $row['content_caption'].'" data-content-image="'.$row['content_image'].'">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
        // ';
    }
        if($row['content_id'] > 0){
        echo '
            <div class="events" style="margin-top: 2em;">
            <div class="container_color">
            <h1>'.$row['event_name'].'</h1>
            <div class="container">
                <div class="container_big_img">
                    <img class="pic1" src="'.$row['content_image1'].'" alt="">
                        <div class="container_small_img">
                            <img class="img_throw1" src="'.$row['content_image2'].'" alt="">
                            <img class="img_throw1"src="'.$row['content_image3'].'" alt="">
                            <img class="img_throw1" src="'.$row['content_image4'].'" alt="">
                            <img class="img_throw1" src="'.$row['content_image5'].'" alt="">
                        </div>
                </div>
                <div class="container_text">
                    <h4>'.$row['content_title'].'</h4>
                    <p>'.$row['content_caption'].'</p>
                </div>
            </div>
            </div>
        ';
        }
    }
    ?>

    <div class="container_color"">
        <h1>corporate events</h1>
      <div class="container">
          <div class="container_big_img">
              <img class="pic1" src="Events Images/14.png" alt="">
                  <div class="container_small_img">
                      <img class="img_throw1" src="Events Images/9.png" alt="">
                      <img class="img_throw1" src="Events Images/10.png" alt="">
                      <img class="img_throw1" src="Events Images/11.png" alt="">
                      <img class="img_throw1" src="Events Images/13.png" alt="">
                  </div>
          </div>
          <div class="container_text">
              <h4>JAAM Foodcorp Christmas Party at Episode Bar + Kitchen</h4>
              <p>150 cups served</p>
          </div>
      </div>
      </div>

    <div class="container_color" style="background-color: black;">
        <!-- <div class="cont_h1"> -->
            <h1 style="color: white;">community activity</h1>
        <!-- </div> -->
        <div class="container">
            <div class="container_big_img">
                    <div class="container_small_img_v2">
                        <img class="img_throw1" src="Events Images/15.png" alt="">
                        <img class="img_throw1"src="Events Images/20.jpg" alt="">
                        <img class="img_throw1" src="Events Images/17.png" alt="">
                        <img class="img_throw1"src="Events Images/18.png" alt="">
                    </div>
                    <img class="pic1" src="Events Images/19.png" alt="">
            </div>
            <div class="container_text">
                <h4 style="color: white;">The Generics Pharmacy Medical Mission</h4>
                <p style="color: white;">150 cups served</p>
            </div>
        </div>
    </div>
    </div>
    </form>

    <div class="announcement">
        <p>*Photos displayed above were taken with consent from the customers. We support the privacy and identity of our clients.</p>
      </div>

<?php include('partials/footer.php'); ?>

<script>
document.querySelectorAll('.edit-btn').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        //fetch data
        contentTitle = button.getAttribute('data-content-title');
        contentCaption = button.getAttribute('data-content-caption');
        contentImage = button.getAttribute('data-content-image');
        contentId = button.getAttribute('data-content-id');
        contentImageId = 'content_image'+contentId;
        
        handleEditButtonClick(contentId);
    });
});

document.querySelectorAll('.add-btn').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        document.querySelector('.bg-modal-add').style.display = 'flex';
        handleAddButtonClick();
    });
});

//Function to handle edit button clicks
function handleEditButtonClick(contentId) {
  // console.log('contentID: ', contentId);
  // console.log('content_id: ', content_id);
  modalClass = "modal-"+contentId;
  document.querySelector('input[name="content_id"]').value = contentId;
  document.querySelector('.bg-modal.'+modalClass).style.display = 'flex';
}

//Function to handle add button clicks
function handleAddButtonClick() {
  document.querySelector('.bg-modal-add.').style.display = 'flex';
}

document.querySelectorAll('.close').forEach(function(element) {
  element.addEventListener('click', function() {
    document.querySelector('.bg-modal-add').style.display = 'none';
  });
});

document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.edit-content').forEach(function(textarea) {
    ClassicEditor
      .create(textarea)
      .catch(function(error) {
        console.error(error);
      });
  });
});

document.getElementById('content_image'+contentId).addEventListener('change', function() {
  var fileName = this.files[0].name;
  var label = document.querySelector('.custom-file-upload.custom-file-upload'+contentId);
  label.textContent = fileName;
});
document.getElementById('image').addEventListener('change', function() {
    var fileList = this.files;
    var fileName = Array.from(fileList).map(file => file.name).join(', ');
    var label = document.getElementById('file-upload-label');
    label.textContent = fileName;
});

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>