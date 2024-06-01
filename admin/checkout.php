<?php 
  session_start();
  include('partials/header.php'); 
  include_once('config/functions.php');
  $conn = get_connection();

  // Handle checkout operation
  if(isset($_POST["checkout"]) && isset($_POST["checkout"])) {
    $checkout_query = "INSERT INTO checkoutcontent (item_id, item_category, item_image, item_name, item_customization, item_price, item_quantity, item_totalprice)
                      SELECT item_id, item_category, item_image, item_name, item_customization, item_price, item_quantity, item_totalprice FROM cartcontent";
    if (mysqli_query($conn, $checkout_query)) {
      echo '<script>alert("Checkout successful!");</script>';
        // // Successfully inserted into checkoutcontent, now clear the cart
        // $clear_cart_query = "DELETE FROM cartcontent";
        // if (mysqli_query($conn, $clear_cart_query)) {
        //     // Successfully cleared the cart, redirect to a confirmation page or the checkout page
        //     // header("Location: checkout.php");
        //     exit();
        // } else {
        //     echo "Error: " . $clear_cart_query . "<br>" . mysqli_error($conn);
        // }
    } else {
        echo "Error: " . $checkout_query . "<br>" . mysqli_error($conn);
    }
  }

  // // Handle insert operation
  // if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["checkout"])) {
  //   $itemid = mysqli_real_escape_string($conn, $_POST['item_id']);
  //   $itemcategory = $_POST["itemcategory"];
  //   $itemimage = $_POST["itemimage"];
  //   $itemname = $_POST["itemname"];
  //   $itemcustomization = $_POST["itemcustomization"];
  //   $itemprice = $_POST["itemprice"];
  //   $itemquantity = $_POST["itemquantity"];
  //   $itemtotalprice = $_POST["itemtotalprice"];

  //   // Check if the item with the same id and customization already exists
  //   $check_query = "SELECT * FROM checkoutcontent WHERE item_id='$itemid' AND item_customization='$itemcustomization'";
  //   $result = mysqli_query($conn, $check_query);

  //   if (mysqli_num_rows($result) > 0) {
  //     // Item with the same id and customization exists, update it
  //     $existing_item = mysqli_fetch_assoc($result);
  //     $new_quantity = $existing_item['item_quantity'] + $itemquantity;
  //     $new_totalprice = $existing_item['item_totalprice'] + $itemtotalprice;
  //     $update_query = "UPDATE checkoutcontent SET item_quantity='$new_quantity', item_totalprice='$new_totalprice' WHERE item_id='$itemid' AND item_customization='$itemcustomization'";
  //     if (mysqli_query($conn, $update_query)) {
  //       echo '<script>if (window.history.replaceState) {window.history.replaceState(null, null, window.location.href);}</script>';
  //     } else {
  //       echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
  //     }
  //   } else {
  //     // Item does not exist, insert it
  //     $insert_query = "INSERT INTO checkoutcontent (item_id, item_category, item_image, item_name, item_customization, item_price, item_quantity, item_totalprice) 
  //                      VALUES ('$itemid', '$itemcategory', '$itemimage', '$itemname', '$itemcustomization', '$itemprice', '$itemquantity', '$itemtotalprice')";
  //     if (mysqli_query($conn, $insert_query)) {
  //       echo '<script>if (window.history.replaceState) {window.history.replaceState(null, null, window.location.href);}</script>';
  //     } else {
  //       echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
  //     }
  //   }
  // }

  // Fetch all checkout items
  $query = "SELECT * FROM checkoutcontent";
  $result = mysqli_query($conn, $query);
  $checkoutItems = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <?php if (!empty($checkoutItems)): ?>
      <?php foreach ($checkoutItems as $item): ?>
        <div class="orders" id="checkoutitem-<?php echo $item['item_id']; ?>">
          <div class="column item-image">
            <img src="<?php echo $item['item_image']; ?>">
          </div>
          <div class="column item-name">
            <h4><?php echo $item['item_name']; ?></h4>
          </div>
          <div class="column item-customization">
            <p><?php echo $item['item_customization']; ?></p>
          </div>
          <div class="column item-price">
            <p>₱<span><?php echo $item['item_price']; ?></span></p>
          </div>
          <div class="column item-quantity">
            <p><?php echo $item['item_quantity']; ?></p>
          </div>
          <div class="column item-subtotal">
            <p>₱<span><?php echo $item['item_totalprice']; ?></span></p>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: 
      //header("Location: empty-cart.php");
    endif; ?>

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
      <div>
        <p>Payment Method</p>
      </div>
      <div class="payment-method">
        <P>?</P>
      </div>
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