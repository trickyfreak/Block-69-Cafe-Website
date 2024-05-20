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