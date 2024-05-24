<?php

?>

<dialog>
  <button class="close">Close</button>
  <p>This modal dialog has a groovy backdrop!</p>
</dialog>

<button class="show">Show the dialog</button>

<script>

  const dialog = document.querySelector("dialog");
  const showButton = document.querySelector(".show");
  const closeButton = document.querySelector(".close");

  // "Show the dialog" button opens the dialog modally
  showButton.addEventListener("click", () => {
    dialog.showModal();
  });

  // "Close" button closes the dialog
  closeButton.addEventListener("click", () => {
    dialog.close();
  });

</script>
