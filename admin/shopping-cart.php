<?php 
  session_start();
  include_once('config/functions.php');
  include_once('partials/header.php'); 
  $conn = get_connection();
  
  // Handle delete operation
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_item_id"])) {
    $delete_item_id = $_POST["delete_item_id"];
    $delete_query = "DELETE FROM cartcontent WHERE item_id='$delete_item_id'";
    if(mysqli_query($conn, $delete_query)) {
      // Successfully deleted, redirect to avoid form resubmission
      header("Location: shopping-cart.php");
      exit();
    } else {
      echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
    }
  }

  // Handle insert operation
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["itemid"])) {
    $itemid = $_POST["itemid"];
    $itemcategory = $_POST["itemcategory"];
    $itemimage = $_POST["itemimage"];
    $itemname = $_POST["itemname"];
    $itemcustomization = $_POST["itemcustomization"];
    $itemprice = $_POST["itemprice"];
    $itemquantity = $_POST["itemquantity"];
    $itemtotalprice = $_POST["itemtotalprice"];

    $query = "INSERT INTO cartcontent (item_id, item_category, item_image, item_name, item_customization, item_price, item_quantity, item_totalprice) 
              VALUES ('$itemid', '$itemcategory', '$itemimage', '$itemname', '$itemcustomization', '$itemprice', '$itemquantity', '$itemtotalprice')";

    if(mysqli_query($conn, $query)) {
      echo '
      <script>
          if (window.history.replaceState) {
              window.history.replaceState(null, null, window.location.href);
          }
      </script>
      ';
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
  }
  
  // Fetch all cart items
  $query = "SELECT * FROM cartcontent";
  $result = mysqli_query($conn, $query);
  $cartItems = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

  <?php if (!empty($cartItems)): ?>
    <?php foreach ($cartItems as $item): ?>
      <div class="cart-items-container" id="cartitem-<?php echo $item['item_id']; ?>">
        <div class="cart-items">
          <div class="column select-container">
            <input type="checkbox" id="select" class="select" value="item-<?php echo $item['item_name']; ?>">
          </div>
          <div class="column product-image">
            <img src="<?php echo $item['item_image']; ?>">
          </div>
          <div class="column product-name">
            <h4><?php echo $item['item_name']; ?></h4>
          </div>
          <div class="column product-customization">
            <p><?php echo $item['item_customization']; ?></p>
          </div>
          <div class="column product-price">
            <p>₱<span><?php echo $item['item_price']; ?></span></p>
          </div>
          <div class="column quantity-counter">
            <p><?php echo $item['item_quantity']; ?></p>
          </div>
          <div class="column total-price">
            <p>₱<span><?php echo $item['item_totalprice']; ?></span></p>
          </div>
          <div class="column delete-button">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
              <input type="hidden" name="delete_item_id" value="<?php echo $item['item_id']; ?>">
              <button type="submit">Delete</button>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: 
    header("Location: cart.php");
  endif; ?>
  
  <div class="checkout-area">
    <div class="column select-all-checkout">
      <input type="checkbox" id="select-all-checkout" class="select-all-checkout" value="select-all-checkout">
    </div>
    <div class="column select-all-text">
      <p>Select All (?)</p>
    </div>
    <div class="column delete-checkout">
      <a href="">Delete</a>
    </div>
    <div class="column empty"></div>
    <div class="column empty"></div>
    <div class="column total-checkout">
      <p>Total (? Item): <span>₱?</span></p>
    </div>
    <div class="column empty"></div>
    <div class="column checkout-button">
      <a href=""><button>Check Out</button></a>
    </div>
  </div>
</div>

<?php include('partials/footer.php'); ?>

<!-- Hide the nav buttons -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
      var nav = document.getElementById("mainNav");

      var listItems = nav.getElementsByTagName("li");

      for (var i = 0; i < listItems.length; i++) {
          listItems[i].style.display = "none";

          listItems[0].style.display = "block";
          listItems[0].innerHTML = "<span style='font-weight: lighter;'>|</span>" + "<span style='margin-left: 1em;'>Shopping Cart</span>";
          listItems[0].style.fontWeight = "bold";
          listItems[0].style.fontFamily = "League Spartan";
          listItems[0].style.fontSize = "30px";
      }
      document.getElementById('Cart').style.display = "none";
  });
</script>