<?php 

  include_once './config/connect.php';
  include_once './config/functions.php';
  include_once './config/content-manage.php';

  session_start(); 
  $conn = get_connection();
  $user_data = check_login($conn);
  $user_type = check_usertype($conn);
  //GETTING content
  $all_content = get_content($conn);
?>

<?php include('partials/header.php'); ?>
<link rel="stylesheet" href="css/home.css">

<?php 
  while($row = mysqli_fetch_assoc($all_content)):
  
    $content_id = $row['content_id']; 

    if($user_type == 'admin'){
      echo '
      <div><button class="editBtn1" data-content-id="' . $content_id . '">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
      ';
    }
?>

<form action="home.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="content_id" value="<?php echo $content_id ?>">
  <!-- Start of Modal -->
  <div class="bg-modal">
    <div class="modal-content">
      <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
      <p class="modal-title">TITLE</p>
      <textarea class="edit-content" name="content_title"></textarea>
      <p class="modal-caption">CAPTION</p>
      <textarea class="edit-content" name="content_caption"></textarea>
      <div>
        <label for="content_image" class="custom-file-upload">Upload Content Image</label>
        <input type="file" id="content_image" name="content_image" class="inputfile"/>
      </div>
      <input class="saveBtn" type="submit" name="submit"></input>
    </div>
  </div>
  <!-- End of Modal -->
<?php echo $content_id?>
  <div class="first-content">
    <div class="content">
      <div class="title">
        <?php echo $row['content_title']; ?>
      </div>
      <p class="caption">
      <?php echo $row['content_caption']; ?>
      </p>
      <a class="view-menu" href="menu.html">VIEW MENU</a>
    </div>
    <?php echo $row['content_image']; ?>
  </div>

  <div class="second-content">
    <img src="Homepage Products/Workshop.jpg" alt="">
    <?php 
      if($user_type == 'admin'){
        echo '
          <div><button class="editBtn2" data-content-id="' . $content_id . '">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
          ';
          }
    ?>
    <?php echo $content_id?>
    <div class="content">
      <p class="title">A perfect blend of art, flavors, and fun!
        Which workshop would you like to join next?
      </p>
      <p class="caption">Embarked on a <span style="font-weight: bold; color: #e0bb5e;">successful</span> tote bag
        painting extravaganza today, fueled by the delightful combination of coffee and non-coffee,
        scrumptious food, and an abundance of creative joy.</p>
      <a class="view-menu" href="#">LEARN MORE</a>
    </div>
  </div>
  </div>
  <div class="third-content">
    <img src="Homepage Products/latte.jpg" alt="">
    <div class="content">
      <span class="title">Keep an eye out on Block 69's latte.</span>
      <p class="caption">Embark on a <span style="font-weight: bold; color: #e0bb5e;">journey</span>
        through the heart of these vibrant cafes,
        where every cup holds a tale and each corner whispers cozy conversations.</p>
      <a class="view-menu" href="menu.html">VIEW MENU</a>
    </div>
  </div>
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

<?php endwhile; ?>
<?php include('partials/footer.php'); ?>

<script>
document.querySelectorAll('.editBtn1').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var contentId = button.getAttribute('data-content-id');
        handleEditButtonClick(contentId);
    });
});

document.querySelectorAll('.editBtn2').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var contentId = button.getAttribute('data-content-id');
        handleEditButtonClick(contentId);
    });
});

//Function to handle edit button clicks
function handleEditButtonClick(contentId) {
    document.querySelector('input[name="content_id"]').value = contentId;
    document.querySelector('.bg-modal').style.display = 'flex';
}

document.querySelector('.close').addEventListener('click',
  function(){
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