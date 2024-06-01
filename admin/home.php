<?php 

  include_once './config/connect.php';
  include_once './config/functions.php';
  include_once './config/content-manage.php';

  session_start(); 
  $conn = get_connection();
  $user_data = check_login($conn);
  $user_type = check_usertype($conn);
  //GETTING content
  $content_id = 0;
  $contents = get_content($conn);
?>

<?php include('partials/header.php'); ?>
<link rel="stylesheet" href="css/home.css">

<form action="home.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="content_id">
  <?php 
  foreach($contents as $content) {
    $modalClass = 'modal-'.$content['content_id'];
    $contentIdName= 'content_id'.$content['content_id'];
    $contentTitleName = 'content_title'.$content['content_id'];
    $contentCaptionName = 'content_caption'.$content['content_id'];
$contentImageId = 'content_image'.$content['content_id'];
    $customFileUploadClass = 'custom-file-upload custom-file-upload'.$content['content_id']    ;
    
    echo '
    
    <!-- Start of Modal -->
    <div class="bg-modal '.$modalClass.'">
      <div class="modal-content">
        <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
        <p class="modal-title">TITLE</p>
        <textarea class="edit-content" name="'.$contentTitleName.'">'.$content['content_title'].'</textarea>
        <p class="modal-caption">CAPTION</p>
        <textarea class="edit-content" name="'.$contentCaptionName.'">'.$content['content_caption'].'</textarea>
        <div>
          <label for="'.$contentImageId.'" class="'.$customFileUploadClass.'">'.$content['content_image'].'</label>
          <input type="file" id="'.$contentImageId.'" name="'.$contentImageId.'" class="inputfile">
        </div>
        <input class="saveBtn" type="submit" name="submit">
      </div>
    </div>
    <!-- End of Modal -->';
    if($user_type == 'admin'){
      echo '
      <div><button class="edit-btn" name="edit-btn" data-content-id="'. $content['content_id'].'" data-content-title="'. $content['content_title'].'" data-content-caption="'. $content['content_caption'].'" data-content-image="'.$content['content_image'].'">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
      ';

      // echo '
      // <div><button class="edit-btn" name="edit-btn" data-content-id="'. $content['content_id'].'">Add Content <i class="fa-regular fa-pen-to-square"></i></button></div>
      // ';
    }

    echo '
    <div class="container"> 
            <div class="content">
                <div class="title"> ' .$content['content_title']. ' </div>
                <div class="caption"> ' .$content['content_caption']. ' </div>
                <a class="view-menu" href="menu.html">VIEW MENU</a>
            </div>
            <img src="' . $content['content_image']. '" alt="Image">
          </div>';

  }
?>
  <div class="announcement">
    <div class="announcement-container">
      <p class="caption">We have a new schedule!
      Starting February 19, 2024, we will operate from 8 AM to 12 AM.
      Will accept dine-ins, take-outs, and deliveries</p>
    </div>
  </div>
</form>

<?php include('partials/footer.php'); ?>

<script>
var modalClass = "modal-1";
var contentTitle = "";
var contentId = 1;
var contentCaption = "";
var contentImage ="";
var contentImageId = 'content_image'+contentId;

document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.edit-content').forEach(function(textarea) {
    ClassicEditor
      .create(textarea)
      .catch(function(error) {
        console.error(error);
      });
  });
});

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


//Function to handle edit button clicks
function handleEditButtonClick(contentId) {
  // console.log('contentID: ', contentId);
  // console.log('content_id: ', content_id);
  modalClass = "modal-"+contentId;
  document.querySelector('input[name="content_id"]').value = contentId;
  document.querySelector('.bg-modal.'+modalClass).style.display = 'flex';
}

document.querySelectorAll('.close').forEach(function(element) {
  element.addEventListener('click', function() {
    document.querySelector('.bg-modal.'+modalClass).style.display = 'none';
  });
});


document.getElementById('content_image'+contentId).addEventListener('change', function() {
  var fileName = this.files[0].name;
  var label = document.querySelector('.custom-file-upload.custom-file-upload'+contentId);
  label.textContent = fileName;
});



if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>