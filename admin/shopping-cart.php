<?php 
  session_start();
  include('partials/header.php'); 
?>

<link href="css/shopping-cart.css" rel="stylesheet">

<div class="cart-container">
  <div class="cart-summary">
    <div class="column select-all-container">
      <input type="checkbox" id="select-all" class="select-all" value="products">
    </div>
    <div class="column summary-image"></div>
    <div class="column summary-product">
      <p>Product</p>
    </div>
    <div class="column customization">
      <p>Customization</p>
    </div>
    <div class="column summary-price">
      <p>Price</p>
    </div>
    <div class="column summary-quantity">
      <p>Quantity</p>
    </div>
    <div class="column summary-total-price">
      <p>Total Price</p>
    </div>
    <div class="column summary-actions">
      <p>Actions</p>
    </div>
  </div>

  <div class="cart-items-container">
    <div class="cart-items">
      <div class="column select-container">
        <input type="checkbox" id="select" class="select" value="product1">
      </div>
      <div class="column product-image">
        <img src="BLK/SPANISH LATTE.png">
      </div>
      <div class="column product-name">
        <h4>Spanish Latte</h4>
      </div>
      <div class="column product-customization">
        <p>12oz</p>
      </div>
      <div class="column product-price">
        <p>₱99</p>
      </div>
      <div class="column quantity-counter">
        <button class="btn-minus"">-</button>
        <input class="quantity-input" type="text" value="1" readonly>
        <button class="btn-add"">+</button>
      </div>
      <div class="column total-price">
        <p>₱198</p>
      </div>
      <div class="column delete-button">
        <a href="">Delete</a>
      </div>
    </div>
  </div>
  

  <div class="checkout-area">
    <div class="column select-all-checkout">
      <input type="checkbox" id="select-all-checkout" class="select-all-checkout" value="select-all-checkout">
    </div>
    <div class="column select-all-text">
      <p>Select All (1)</p>
    </div>
    <div class="column delete-checkout">
      <a href="">Delete</a>
    </div>
    <div class="column empty"></div>
    <div class="column empty"></div>
    <div class="column total-checkout">
      <p>Total (1 Item): <span>₱198</span></p>
    </div>
    <div class="column empty"></div>
    <div class="column checkout-button">
      <a href=""><button>Check Out</button></a>
    </div>
  </div>
</div>

<?php include('partials/footer.php'); ?>