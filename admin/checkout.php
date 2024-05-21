<?php 
  session_start();
  include('partials/header.php'); 
?>

<link href="css/checkout.css" rel="stylesheet">

<div class="checkout-container">
  <div class="address-container">
    <div class="address-text">
      <p><img src="">Delivery Address</p>
    </div>
    <div class="address-info">
      
    </div>
  </div>

  <div class="products-ordered-container">
    <div class="products-summary-container"></div>
    
    <div class="checkout-info">
      <div class="orders">
        <div class="order">
          <div class="order1"></div>
        </div>
      </div>

      <div class="message-shipping-container"></div>
      <div class="order-total-container"></div>
    </div>
  </div>

  <div class="mod-container"></div>
</div>

<?php include('partials/footer.php'); ?>