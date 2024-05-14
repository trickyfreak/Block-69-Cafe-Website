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

<?php 
  if($user_type == 'admin'){
    echo '
    <div><button class="editBtn1" data-content-id="1">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
    ';
  }
?>

<form action="home.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="content_id" value="<?php echo $content_id ?>">
  <!-- Start of Modal -->
  <div class="bg-modal">
    <div class="modal-content">
      <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
      <p class="modal-title">TITLE <?php echo $content_id; ?></p>
      <textarea class="edit-content" name="content_title"><?php echo $contents[$content_id]['content_title']; ?></textarea>
      <p class="modal-caption">CAPTION</p>
      <textarea class="edit-content" name="content_caption"><?php echo $contents[$content_id]['content_caption']; ?></textarea>
      <div>
        <label for="content_image" class="custom-file-upload"><?php echo $contents[$content_id]['content_image']; ?></label>
        <input type="file" id="content_image" name="content_image" class="inputfile"/>
      </div>
      <input class="saveBtn" type="submit" name="submit"></input>
    </div>
  </div>
  <!-- End of Modal -->
  
  <div class="first-content">
    <div class="content">
      <div class="title">
        <?php echo $contents[0]['content_title']; ?>
      </div>
      <div class="caption">
      <?php echo $contents[0]['content_caption']; ?>
      </div>
      <a class="view-menu" href="menu.html">VIEW MENU</a>
    </div>
    <?php echo '<img src="' . $contents[0]['content_image'] . '" alt="Image">'; ?>
  </div>

  <?php 
    if($user_type == 'admin'){
      echo '
        <div><button class="editBtn2" data-content-id="2">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
        ';
        }
  ?>
  
  <div class="second-content">
    <?php echo '<img src="' . $contents[1]['content_image'] . '" alt="Image">'; ?>
    <div class="content">
      <div class="title">
        <?php echo $contents[1]['content_title']; ?>
      </div>
      <div class="caption">
      <?php echo $contents[1]['content_caption']; ?>
      </div>
      <a class="view-menu" href="#">LEARN MORE</a>
    </div>
  </div>
  </div>

  <?php 
    if($user_type == 'admin'){
      echo '
        <div><button class="editBtn3" data-content-id="3">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
        ';
        }
  ?>

  <div class="third-content">
    <?php echo '<img src="' . $contents[2]['content_image'] . '" alt="Image">'; ?>
    <div class="content">
      <div class="title">
        <?php echo $contents[2]['content_title']; ?>
      </div>
      <div class="caption">
      <?php echo $contents[2]['content_caption']; ?>
      </div>
      <a class="view-menu" href="menu.html">VIEW MENU</a>
    </div>
  </div>

  <?php 
    if($user_type == 'admin'){
      echo '
        <div><button class="editBtn4" data-content-id="4">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
        ';
        }
  ?>

  <div class="fourth-content">
    <div class="content">
      <div class="title">Indulge in the ultimate non-coffee delights that have won over crowds everywhere! </div>
      <p class="caption">Have you treated yourself to the <span
          style="font-weight: bold; color: #e0bb5e;">refreshing</span> allure of our Pink Paradise or the tantalizing
        blend of flavors in our Dark Berry? Sip, savor, and discover your new favorites today!</p>
      <a class="view-menu" href="menu.html">VIEW MENU</a>
    </div>
    <img src="Homepage Products/dark berry design2.png" alt="image">
  </div>

  <?php 
    if($user_type == 'admin'){
      echo '
        <div><button class="editBtn5" data-content-id="5">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
        ';
        }
  ?>
  
  <div class="fifth-content">
    <img src="Homepage Products/pastries (1).png" alt="">
    <div class="content">
      <div class="title">Warning: Proceed with caution.</div>
      <p class="caption">These <span style="font-weight: bold; color: #e0bb5e;">pastries</span> have been known to cause
        uncrontrollable smiles and sudden cravings. Eat at your own risk!</p>
      <a class="view-menu" href="menu.html">VIEW MENU</a>
    </div>
  </div>
  <div class="announcement">
    <div class="announcement-container">
      <p class="caption">We have a new schedule!
      Starting February 19, 2024, we will operate from 8 AM to 12 AM.
      Will accept dine-ins, take-outs, and deliveries</p>
    </div>
  </div>
</form>

<?php include('partials/footer.php'); ?>


document.querySelectorAll('.editBtn1').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var contentId = button.getAttribute('data-content-id');
        
        var content_id = 1;

        handleEditButtonClick(contentId, content_id);
    });
});

document.querySelectorAll('.editBtn2').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var contentId = button.getAttribute('data-content-id');
        
        var content_id = 2;

        handleEditButtonClick(contentId, content_id);
    });
});

document.querySelectorAll('.editBtn3').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var contentId = button.getAttribute('data-content-id');
        
        var content_id = 3;

        handleEditButtonClick(contentId, content_id);
    });
});

document.querySelectorAll('.editBtn4').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var contentId = button.getAttribute('data-content-id');
        
        var content_id = 4;

        handleEditButtonClick(contentId, content_id);
    });
});

document.querySelectorAll('.editBtn5').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var contentId = button.getAttribute('data-content-id');
        
        var content_id = 5;
        
        handleEditButtonClick(contentId, content_id);
    });
});

//Function to handle edit button clicks
function handleEditButtonClick(contentId, content_id) {
  // console.log('contentID: ', contentId);
  // console.log('content_id: ', content_id);
  document.querySelector('input[name="content_id"]').value = content_id;
  document.querySelector('.bg-modal').style.display = 'flex';
}

document.querySelector('.close').addEventListener('click',
  function(){
    var label = document.querySelector('.custom-file-upload');
    label.textContent = '<?php echo $contents[$content_id]['content_image']; ?>';

    document.querySelector('.bg-modal').style.display = 'none';
  }
)

document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.edit-content').forEach(function(textarea) {
    ClassicEditor
      .create(textarea)
      .catch(function(error) {
        console.error(error);
      });
  });
});

document.getElementById('content_image').addEventListener('change', function() {
  var fileName = this.files[0].name;
  var label = document.querySelector('.custom-file-upload');
  label.textContent = fileName;
});

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>