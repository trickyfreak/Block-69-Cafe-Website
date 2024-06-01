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
      <div class="contact-number">
        <label>Phone Number </label>
        <input type="tel" id="phone" name="phone" placeholder="+63 966 564 0148" pattern="\+63[1-9]{10}" required>
      </div>
      <div class="address">
        <label>Address </label>
        <input type="text" id="address" name="address" placeholder="123 Main St, Apt 4B, Springfield, IL 62704, USA" required>
      </div>
    </div>
  </div>

  <div class="products-ordered-container">
    <div class="products-summary-container">
      <div class="products-ordered">
          <p>Products Ordered</p>
        </div>
      </div>
    <div class="checkout-info">
      <div class="orders">
        <div class="item-image">
          <img src="BLK/?.png">
        </div>
        <div class="item-name">
          <h4>?</h4>
        </div>
        <div class="item-customization">
          <p>?</p>
        </div>
        <div class="item-price">
          <p>₱<span>?</span></p>
        </div>
        <div class="item-quantity">
      
        </div>
        <div class="item-subtotal">
          <p>₱<span>?</span></p>
        </div>
      </div>

      <div class="shipping-container">
        <div class="shipping-fee">
          <p>Shipping Fee: <span>₱?</span></p>
        </div>
      </div>
      <div class="order-total-container">
        <div class="order-total">
          <p>Order Total:<span>₱?</span></p>
        </div>
      </div>
    </div>
  </div>

  <div class="mod-container">
    <div class="txt-payment">
      <p>Payment</p>
    </div>
    <div class="payment-info">
      <div class="subtotal">
        <p>Subtotal: <span>₱?</span></p>
      </div>
      <div class="shipping-total">
        <p>Shipping Total: <span>₱?</span></p>
      </div>
      <div class="total-payment">
        <p>Total Payment: <span>₱?</span></p>
      </div>
    </div>
    <div class="place-order">
      <button>Place Order</button>
    </div>
  </div>
</div>

<?php include('partials/footer.php'); ?>