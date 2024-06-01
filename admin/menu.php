<?php 
  session_start();
  include_once('config/functions.php');
  include_once('partials/header.php'); 
  include_once('config/menu-cms.php'); 
  
  $conn = get_connection();
  $user_data = check_login($conn);
  $user_type = check_usertype($conn);
  $content_id = 0;
  // Fetch content for drinks and foods separately
  $drinks_content = get_content($conn, $drink_categories);
  $foods_content = get_content($conn, $food_categories);
  $espresso_items = get_items($conn, $espresso);
  $brew_items = get_items($conn, $brew);
  $noncoffeeandtea_items = get_items($conn, $noncoffeeandtea);
  $matcha_items = get_items($conn, $matcha);
  $beverages_items = get_items($conn, $beverages);
  $alldaybreakfast_items = get_items($conn, $alldaybreakfast);
  $silog_items = get_items($conn, $silog);
  $pasta_items = get_items($conn, $pasta);
  $bargainbites_items = get_items($conn, $bargainbites);
  $sidesandnibbles_items = get_items($conn, $sidesandnibbles);
  $carbsandcaffeine_items = get_items($conn, $carbsandcaffeine);
?>
  
  <link href="css/menu.css" rel="stylesheet">
  <script src="javascript/menu.js"></script>

  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="content_id">
    <!-- Sidebar -->
    <div class="sidebarAndContent">
      <div class="sidebar" id="sidebar">
        <ul>
          <li class="header1"><a href="#menu" onclick="showCategory('menu')">Menu</a></li><br><br>
          <li class="header2">Drinks</li>
          <?php
          foreach($drinks_content as $drink_category) {
              echo '<li class="choice"><a href="#'.strtolower(str_replace(' ', '', $drink_category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $drink_category['product_name'])).'\')">'.$drink_category['product_name'].'</a></li>';
          }
          ?>
          <br><br>
          <li class="header2">Foods</li>
          <?php 
          foreach($foods_content as $food_category) {
            echo '<li class="choice"><a href="#'.strtolower(str_replace(' ', '', $food_category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $food_category['product_name'])).'\')">'.$food_category['product_name'].'</a></li>';
          }
          ?>
        </ul>
      </div>

      <!-- Disabling click events -->
      <div class="overlay" id="overlay"></div>

      <div class="contents">
        <div id="menu" class="category">
          <!-- Display drinks options -->
          <div class="txtDrinks">
            <h2>Drinks</h2>
            <?php if($user_type == 'admin') echo '<div class="cms-add"><button class="add-cms" name="add-cms" value="drinks"><i class="fa-solid fa-plus"></i> Add content</button></div>'; ?>
            <!-- Start of Add Modal -->
            <div class="bg-modal-add">
              <div class="modal-content-add">
                <div class="close"><i class="fa-solid fa-square-xmark" style="color: black;"></i></div>
                <p class="modal-title">Product Name</p>
                <textarea class="edit-content" name="content_title"></textarea>
                <p class="modal-caption">Product Subname</p>
                <textarea class="edit-content" name="content_caption"></textarea>
                <div>
                  <label for="image" class="custom-file-upload">Upload Image</label>
                  <input type="file" id="image" class="inputfile" name="content_image" required>
                </div>
                <input class="saveBtn" type="submit" name="submit">
              </div>
            </div>
            <!-- End of Modal -->
          </div>
          <hr>
          <div class="drinksOptions" id="drinksNav">
            <?php 
              foreach($drinks_content as $category) {
                echo '
                    <div class="options" id="'.$category['product_id'].'" name="'.$category['product_name'].'">
                      <div class="option">
                        <a href="#'.strtolower(str_replace(' ', '', $category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $category['product_name'])).'\')"><img src="'.$category['product_image'].'"></a>
                        <a href="#'.strtolower(str_replace(' ', '', $category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $category['product_name'])).'\')"><p>'.$category['product_name']."<br>".$category['product_subname'].'</p></a>';
                if($user_type == 'admin') echo '<div class="cms-edit-delete"><button class="delete-cms" name="edit-btn" data-content-id="'.$category['product_id'].'"><i class="fa-regular fa-trash-can"></i></button> <button class="edit-cms"><i class="fa-regular fa-pen-to-square"></i></button></button></div>';     
                echo '</div></div>';
              }
            ?>
          </div>
          <!-- Display foods options -->
          <div class="txtFoods">
            <h2>Foods</h2>
            <?php if($user_type == 'admin') echo '<div class="cms-add"><button class="add-cms" name="add-cms" value="drinks"><i class="fa-solid fa-plus"></i> Add content</button></div>'; ?>
        
          </div>
          <hr>
          <div class="foodsOptions" id="foodsNav">
            <?php
              foreach($foods_content as $category) {
                echo '
                    <div class="options" id="'.$category['product_id'].'" name="'.$category['product_name'].'">
                      <div class="option">
                        <a href="#'.strtolower(str_replace(' ', '', $category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $category['product_name'])).'\')"><img src="'.$category['product_image'].'"></a>
                        <a href="#'.strtolower(str_replace(' ', '', $category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $category['product_name'])).'\')"><p>'.$category['product_name']."<br>".$category['product_subname'].'</p></a>';
                if($user_type == 'admin') echo '<div class="cms-edit-delete"><button class="delete-cms" name="edit-btn" data-content-id="'.$category['product_id'].'"><i class="fa-regular fa-trash-can"></i></button> <button class="edit-cms"><i class="fa-regular fa-pen-to-square"></i></button></button></div>';     
                echo '</div></div>';
              }
            ?>
          </div>
        </div>

        <!-- Other categories section -->
        <?php    
          // Array of categories with corresponding items
          $categories = [
            'espresso' => $espresso_items,
            'brew' => $brew_items,
            'noncoffeeandtea' => $noncoffeeandtea_items,
            'matcha' => $matcha_items,
            'beverages' => $beverages_items,
            'alldaybreakfast' => $alldaybreakfast_items,
            'silog' => $silog_items,
            'pasta' => $pasta_items,
            'bargainbites' => $bargainbites_items,
            'sidesandnibbles' => $sidesandnibbles_items,
            'carbsandcaffeine' => $carbsandcaffeine_items
          ]; 
          // Create sections for each Category
          foreach($categories as $category => $items) {
            echo '
              <div id="'.$category.'" class="category">
              <div id="'.$category.'-container">
                <div class="txt'.ucfirst($category).'" id="'.$category.'-text">
                  <h2>'.ucfirst($category).'</h2> 
                  <p>Iced/Hot</p> 
                  <hr>
                </div>
                <div class="menuContainer" id="'.$category.'MenuContainer">';
                // All items depends on Category
                foreach($items as $item) {
                  echo '
                    <div class="menu-options" id="'.$item['item_id'].'">
                      <div class="menu-option">';
                  if($user_type == 'admin') echo '<div class="cms-edit-delete"><button class="delete-cms"><i class="fa-regular fa-trash-can"></i></button> <button class="edit-cms"><i class="fa-regular fa-pen-to-square"></i></button></button></div>';    
                  echo '
                        <img src="'.$item['item_image'].'" onclick="openPopup(\''.$item["item_name"].$item['item_id'].'\')">
                        <p onclick="openPopup(\''.$item["item_name"].$item['item_id'].'\')">'.$item['item_name'].'</p>
                      </div>
                    </div>';
                }
                echo '
                  </div>
                    </div>'; 
        ?> 
        </form>
        <?php   // Popup for items
                foreach($items as $item) {
                  echo'
                    <form action="shopping-cart.php" method="POST" enctype="multipart/form-data">
                      <div class="popup" id="popup-'.$item["item_name"].$item['item_id'].'">
                        <input type="hidden" name="itemid" value="'.$item['item_id'].'">
                        <input type="hidden" name="itemcategory" value="'.$item['item_category'].'">
                        <div class="popupImage">
                          <input type="hidden" name="itemimage" value="'.$item['item_image'].'">
                          <img src="'.$item['item_image'].'">
                        </div>
                        <div class="popupContent">
                          <div class="btnClose">
                            <button onclick="closePopup(\''.$item["item_name"].$item['item_id'].'\')"><img src="icons/x.png"></button>
                          </div>
                          <div class="productName">
                            <input type="hidden" name="itemcategory" value="'.$item['item_category'].'">
                            <input type="hidden" name="itemname" value="'.$item['item_name'].'">
                            <h1>'.$item['item_name'].'</h1>
                          </div>
                          <div class="description">
                            <p>Enjoy our creamy '.$item['item_name'].', made with premium espresso, sweetened condensed milk, and whole milk. Perfectly balanced for a smooth, sweet coffee experience.</p>
                          </div>
                          <div class="price">
                            <div class="txt-price"><p>Price:</p></div>
                            <div class="price-list">
                              <input type="hidden" name="itemcustomization" value=" ">
                              <p>'; 
                              // Drinks: 12oz/16oz customization | Foods: Solo/Savor customization 
                              if($item['item_category'] == 'All Day Breakfast' || $item['item_category'] == 'Silog' || $item['item_category'] == 'Pasta' || $item['item_category'] == 'Bargain Bites' ||
                                $item['item_category'] == 'Sides And Nibbles' || $item['item_category'] == 'Carbs And Caffeine') {
                                echo '
                                  <input type="radio" name="itemprice" value="'.$item['item_priceoption1'].'" onclick="updateCustomization(this)"> Solo: <span>₱'.$item['item_priceoption1'].'</span> &nbsp | &nbsp 
                                  <input type="radio" name="itemprice" value="'.$item['item_priceoption2'].'" onclick="updateCustomization(this)"> Savor: <span>₱'.$item['item_priceoption2'].'</span>';
                              } else {
                                echo '
                                  <input type="radio" name="itemprice" value="'.$item['item_priceoption1'].'" onclick="updateCustomization(this)"> 12oz: <span>₱'.$item['item_priceoption1'].'</span> &nbsp | &nbsp 
                                  <input type="radio" name="itemprice" value="'.$item['item_priceoption2'].'" onclick="updateCustomization(this)"> 16oz: <span>₱'.$item['item_priceoption2'].'</span>';
                              }   
                            echo '
                              </p>
                            </div>
                          </div>
                          <div class="quantity">
                            <div><p>Quantity:</p></div>
                            <div class="addMinus">
                              <button class="btnMinus" onclick="updateQuantity(-1, \'popup-'.$item["item_name"].$item['item_id'].'\')">-</button>
                              <input class="quantity-input" type="text" name="itemquantity"; value="1" readonly>
                              <button class="btnAdd" onclick="updateQuantity(1, \'popup-'.$item["item_name"].$item['item_id'].'\')">+</button>
                            </div>
                          </div>
                          <div class="total">
                            <input type="hidden" class="total-price" name="itemtotalprice" value="0">
                            <p class="totalPrice">Total: <span></span></p>
                          </div>
                          <div class="add-buy">
                            <input type="submit" class="addCart" name="add-buy" value="Add to Cart">
                            <input type="submit" class="buyNow" name="add-buy" value="Buy Now">
                          </div>
                        </div>
                      </div>
                    </form>'; 
                }
                echo '
                  </div>';
          }
        ?>
      </div>
    </div>

<?php
  include('partials/footer.php');
?>

  <script>
    document.querySelectorAll('.cms-add').forEach(function(button) {
      button.addEventListener('click', function(event) {
          event.preventDefault();
          document.querySelector('.bg-modal-add').style.display = 'flex';
          handleAddButtonClick();
      });
    });

    document.querySelectorAll('.close').forEach(function(element) {
      element.addEventListener('click', function() {
        // document.querySelector('.bg-modal.'+modalClass).style.display = 'none';
        document.querySelector('.bg-modal-add').style.display = 'none';
      });
    });

    document.querySelectorAll('.delete-cms').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var contentId = button.getAttribute('data-content-id');
        if (confirm('Are you sure you want to delete this content?')) {
            var form = document.createElement('form');
            form.method = 'post';
            form.action = 'menu.php';
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'delete_content_id';
            input.value = contentId;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    });
    });

    // const dialog = document.getElementById(`popup-${itemId}`);
    // const wrapper = document.querySelector(".wrapper");
    // const showPopup = (show) => show ? dialog.showModal() : dialog.close()
    // dialog.addEventListener('click', (e) => !wrapper.contains(e.target) && dialog.close())
  </script>