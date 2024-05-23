<?php
session_start();

include_once './config/connect.php';
include_once './config/functions.php';
include_once './config/content-manage.php';
include_once './form/gallery.php';

$conn = get_connection();
$user_data = check_login($conn);
$user_type = check_usertype($conn);
$content_images = get_galleryimage($conn);

// echo $content_images;

// for ($i=0; $i < count($content_images); $i++) { 
//     echo $content_images[$i]['img_ID'] . "<br>";
// }

?>


<?php
for ($i=0; $i < count($content_images); $i++) { 
  $dialog_class = "dialog " . $content_images[$i]['img_ID'];
  $dialog_show_class = "dialog-show " . $content_images[$i]['img_ID'];
  $dialog_close_class = "dialog-close " . $content_images[$i]['img_ID'];
  $img_url = $content_images[$i]['img'];
  $img_id = $content_images[$i]['img_ID'];

      echo "
        <dialog class='$dialog_class'>
        <button class='$dialog_close_class'>Close</button>
        hello $img_url

        <img src='$img_url' >

  form is here
        <form method='POST' action='./gallery-2.php' enctype='multipart/form-data'>
          <input type='file' name='file-img' />
          <input hidden name='img_ID' value='$img_id' />

          <button type='submit'>Submit</button>
        </form>
        </dialog>
        <button class='$dialog_show_class'>Show the dialog</button>
      ";
    }
?>


<script>

  const dialog = document.querySelectorAll(".dialog");
  const showButtons = document.querySelectorAll(".dialog-show");
  const closeButtons = document.querySelectorAll(".dialog-close");

  // "Show the dialog" button opens the dialog modally
  showButtons.forEach((el, idx) => {
    el.addEventListener('click', () => {
      dialog[idx].showModal();
    });
  });

  closeButtons.forEach((el, idx) => {
    el.addEventListener('click', () => {
      dialog[idx].close();
    });
  });

  // "Close" button closes the dialog
  // closeButton.addEventListener("click", () => {
  //   dialog.close();
  // });

</script>
