<?php 
    session_start();
    include_once('config/functions.php');
    include_once('partials/header.php'); 
    include_once('config/functions.php');
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
    $brewsweetcream_items = get_items($conn, $brewsweetcream);
    $noncoffeeandtea_items = get_items($conn, $noncoffeeandtea);
    $matcha_items = get_items($conn, $matcha);
    $beverages_items = get_items($conn, $beverages);
    $alldaybreakfast_items = get_items($conn, $alldaybreakfast);
    $silog_items = get_items($conn, $silog);
    $pasta_items = get_items($conn, $pasta);
    $block69bargainbites_items = get_items($conn, $block69bargainbites);
    $sidesandnibbles_items = get_items($conn, $sidesandnibbles);
    $carbsandcaffeine_items = get_items($conn, $carbsandcaffeine);
    $carbsandcaffeinecroffle_items = get_items($conn, $carbsandcaffeinecroffle);
  ?>
  
  <link href="css/menu.css" rel="stylesheet">
  <script src="javascript/menu.js"></script>
  <!-- <script src="javascript/menuItems.js"></script> -->
  <!-- <script src="javascript/menuNav.js"></script> -->
  <script src="javascript/menuPopup.js"></script>
  <script src="javascript/menuQuantity.js"></script>

  <form action="menu.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="content_id">
    <div class="sidebarAndContent">
      <div class="sidebar" id="sidebar">
        <ul>
          <li class="header1"><a href="#menu" onclick="showCategory('menu')">Menu</a></li><br><br>
          <li class="header2">Drinks</li>
          <li class="choice"><a href="#espresso" onclick="showCategory('espresso')">Espresso</a></li>
          <li class="choice"><a href="#brew" onclick="showCategory('brew')">Brew</a></li>
          <li class="choice"><a href="#noncoffeeandtea" onclick="showCategory('noncoffeeandtea')">Non-Coffee And Tea</a></li>
          <li class="choice"><a href="#matcha" onclick="showCategory('matcha')">Matcha</a></li>
          <li class="choice"><a href="#beverages" onclick="showCategory('beverages')">Beverages</a></li>
          <br><br>
          <li class="header2">Foods</li>
          <li class="choice"><a href="#adb" onclick="showCategory('alldaybreakfast')">All Day Breakfast</a></li>
          <li class="choice"><a href="#silog" onclick="showCategory('silog')">Silog</a></li>
          <li class="choice"><a href="#pasta" onclick="showCategory('pasta')">Pasta</a></li>
          <li class="choice"><a href="#bargainBites" onclick="showCategory('block69bargainbites')">Bargain Bites</a></li>
          <li class="choice"><a href="#sides&nibbles" onclick="showCategory('sidesandnibbles')">Sides & Nibbles</a></li>
          <li class="choice"><a href="#carbs&caffeine" onclick="showCategory('carbsandcaffeine')">Carbs N' Caffeine</a></li>
        </ul>
      </div>
      <?php
        echo '
          <div class="contents">
            <div id="menu" class="category">
              <div class="txtDrinks">
                <h2>Drinks</h2>'; 
        if($user_type == 'admin') {
          echo '<div class="cms-add"><button class="add-cms" name="add-cms" value="drinks"><i class="fa-solid fa-plus"></i> Add content</button></div>';
        }
        echo '
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
          <!-- End of Modal -->';
        echo' </div>
              <hr>
              <div class="drinksOptions" id="drinksNav">
        ';
        foreach($drinks_content as $category) {
          $productId = 'product_id'.$category['product_id'];
          $productImage = 'product_image'.$category['product_id'];
          $productName = 'product_name'.$category['product_id'];
          $productSubname = 'product_subname'.$category['product_id'];
          
          if($user_type == 'admin') {
            echo '
              <div class="options" id="'.$productId.'" name="'.$category['product_name'].'">
                <div class="option">
                  <a href="#'.strtolower(str_replace(' ', '', $category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $category['product_name'])).'\')"><img src="'.$category['product_image'].'"></a>
                  <a href="#'.strtolower(str_replace(' ', '', $category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $category['product_name'])).'\')"><p>'.$category['product_name']."<br>".$category['product_subname'].'</p></a>
                  <div class="cms-edit-delete"><button class="delete-cms" name="edit-btn" data-content-id="'.$category['product_id'].'"><i class="fa-regular fa-trash-can"></i></button> <button class="edit-cms"><i class="fa-regular fa-pen-to-square"></i></button></button></div>
                </div>
              </div>';
          } else {
            echo '
              <div class="options" id="'.$productId.'" name="'.$category['product_name'].'">
                <div class="option">
                  <a href="#'.strtolower(str_replace(' ', '', $category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $category['product_name'])).'\')"><img src="'.$category['product_image'].'"></a>
                  <a href="#'.strtolower(str_replace(' ', '', $category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $category['product_name'])).'\')"><p>'.$category['product_name']."<br>".$category['product_subname'].'</p></a>
                </div>
              </div>';
          }
        }
        echo'
            </div>
            <div class="txtFoods">
              <h2>Foods</h2>'; 
        if($user_type == 'admin') {
          echo '<div class="cms-add"><button class="add-cms" name="add-cms" value="foods"><i class="fa-solid fa-plus"></i> Add content</button> </div>';
        }
        echo '
            </div>
            <hr>
            <div class="foodsOptions" id="foodsNav">
        ';
        
        foreach($foods_content as $category) {
          $productId = 'product_id'.$category['product_id'];
          $productImage = 'product_image'.$category['product_id'];
          $productName = 'product_name'.$category['product_id'];
          $productSubname = 'product_subname'.$category['product_id'];
          
          if($user_type == 'admin') {
            echo '
              <div class="options" id="'.$productId.'" name="'.$category['product_name'].'">
                <div class="option">
                  <a href="#'.strtolower(str_replace(' ', '', $category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $category['product_name'])).'\')"><img src="'.$category['product_image'].'"></a>
                  <a href="#'.strtolower(str_replace(' ', '', $category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $category['product_name'])).'\')"><p>'.$category['product_name']."<br>".$category['product_subname'].'</p></a>
                  <div class="cms-edit-delete"><button class="delete-cms" name="edit-btn" data-content-id="'.$category['product_id'].'"><i class="fa-regular fa-trash-can"></i></button> <button class="edit-cms"><i class="fa-regular fa-pen-to-square"></i></button></button></div>
                </div>
              </div>';
          } else {
            echo '
              <div class="options" id="'.$productId.'" name="'.$category['product_name'].'">
                <div class="option">
                  <a href="#'.strtolower(str_replace(' ', '', $category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $category['product_name'])).'\')"><img src="'.$category['product_image'].'"></a>
                  <a href="#'.strtolower(str_replace(' ', '', $category['product_name'])).'" onclick="showCategory(\''.strtolower(str_replace(' ', '', $category['product_name'])).'\')"><p>'.$category['product_name']."<br>".$category['product_subname'].'</p></a>
                </div>
              </div>';
          }
        }
        echo '</div>
            </div>
            <div id="espresso" class="category">
              <div id="espresso-container">
                <div class="txtEspresso" id="espresso-text">
                  <h2>Espresso</h2> 
                  <p>Iced/Hot</p> 
                  <hr>
                </div>
                <div class="menuContainer" id="espressoMenuContainer">';
        foreach($espresso_items as $item){
          $item_id = 'item_id'.$item['item_id'];
          $item_image = 'item_image'.$item['item_id'];
          $item_name = 'item_name'.$item['item_id'];
          $item_subname = 'item_subname'.$item['item_id'];

        echo '
          <div class="menu-options" id="'.$item_id.'">
            <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'espresso\')">
              <img src="'.$item['item_image'].'" onclick="openPopup()">
              <p onclick="openPopup()">'.$item['item_name'].'</p>
            </div>
          </div>
        ';
      }
      echo '
              </div>
            </div>
            <div class="popup" id="popup-espresso"></div>
          </div>
          <div id="brew" class="category">
            <div id="brew-container">
              <div class="txtBrew" id="brew-text">
                <h2>Brew</h2> 
                <p>Iced/Hot</p>
                <hr>
              </div>
              <div class="menuContainer" id="brewMenuContainer">';
      
      foreach($brew_items as $item){
        $item_id = 'item_id'.$item['item_id'];
        $item_image = 'item_image'.$item['item_id'];
        $item_name = 'item_name'.$item['item_id'];
        $item_subname = 'item_subname'.$item['item_id'];

        echo '
          <div class="menu-options" id="'.$item_id.'">
            <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'brew\')">
              <img src="'.$item['item_image'].'" onclick="openPopup()">
              <p onclick="openPopup()">'.$item['item_name'].'</p>
            </div>
          </div>
        ';
      }
      
      echo '
              </div>
              <div class="txtSweetCream">
                <p>Sweet Cream:</p>
              </div>
              <div class="menuContainer" id="brewMenuContainerSC">';
      foreach($brewsweetcream_items as $item){
        $item_id = 'item_id'.$item['item_id'];
        $item_image = 'item_image'.$item['item_id'];
        $item_name = 'item_name'.$item['item_id'];
        $item_subname = 'item_subname'.$item['item_id'];

        echo '
          <div class="menu-options" id="'.$item_id.'">
            <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'brew\')">
              <img src="'.$item['item_image'].'" onclick="openPopup()">
              <p onclick="openPopup()">'.$item['item_name'].'</p>
            </div>
          </div>
        ';
      }      
      echo 
             '</div>
            </div>
            <div class="popup" id="popup-brew"></div>
          </div>
          <div id="noncoffeeandtea" class="category">
            <div id="ncat-container">
              <div class="txtNcat">
                <h2>Non-Coffee And Tea</h2>
                <hr>
              </div>
              <div class="menuContainer" id="ncatMenuContainer">';
      foreach($noncoffeeandtea_items as $item){
        $item_id = 'item_id'.$item['item_id'];
        $item_image = 'item_image'.$item['item_id'];
        $item_name = 'item_name'.$item['item_id'];
        $item_subname = 'item_subname'.$item['item_id'];

        echo '
          <div class="menu-options" id="'.$item_id.'">
            <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'noncoffeeandtea\')">
              <img src="'.$item['item_image'].'" onclick="openPopup()">
              <p onclick="openPopup()">'.$item['item_name'].'</p>
            </div>
          </div>
        ';
      }
      echo
             '</div>
            </div>
            <div class="popup" id="popup-ncat"></div>
          </div>
          <div id="matcha" class="category">
            <div id="matcha-container">
              <div class="txtMatcha">
                <h2>Matcha</h2>
                <hr>
              </div>
              <div class="menuContainer" id="matchaMenuContainer">';
      foreach($matcha_items as $item){
        $item_id = $item['item_id'];
        $item_image = $item['item_image'];
        $item_name = $item['item_name'];
        $item_subname = $item['item_subname'];

        echo '
          <div class="menu-options" id="'.$item_id.'">
            <div class="menu-option" onclick="generatePopup(\''.$item_name.'\', \'matcha\')">
              <img src="'.$item_image.'" onclick="openPopup()">
              <p onclick="openPopup()">'.$item_name.'</p>
            </div>
          </div>
        ';
      }
      echo '</div>
            </div>
            <div class="popup" id="popup-matcha"></div>
          </div>
          <div id="beverages" class="category">
            <div id="beverages-container">
              <div class="txtBeverages">
                <h2>Beverages</h2>
                <hr>
              </div>
              <div class="menuContainer" id="beveragesMenuContainer">'; 
      foreach($beverages_items as $item){
        $item_id = $item['item_id'];
        $item_image = $item['item_image'];
        $item_name = $item['item_name'];
        $item_subname = $item['item_subname'];

        echo '
          <div class="menu-options" id="'.$item_id.'">
            <div class="menu-option" onclick="generatePopup(\''.$item_name.'\', \'beverages\')">
              <img src="'.$item_image.'" onclick="openPopup()">
              <p onclick="openPopup()">'.$item_name.'</p>
            </div>
          </div>
        ';
      }      
      echo  '</div>
            </div>
            <div class="popup" id="popup-beverages"></div>
          </div>
          <div id="alldaybreakfast" class="category">
            <div id="adb-container">
              <div class="txtAdb">
                <h2>All Day Breakfast</h2>
                <hr>
              </div>
              <div class="menuContainer" id="adbMenuContainer">'; 
      foreach($alldaybreakfast_items as $item){
        $item_id = $item['item_id'];
        $item_image = $item['item_image'];
        $item_name = $item['item_name'];
        $item_subname = $item['item_subname'];

          if($user_type == 'admin') {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'alldaybreakfast\')">
                  <div class="cms-edit-delete"><button class="delete-cms"><i class="fa-regular fa-trash-can"></i></button> <button class="edit-cms"><i class="fa-regular fa-pen-to-square"></i></button></button></div>
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          } else {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'alldaybreakfast\')">
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          }
        }   
        echo '</div>
              </div>
              <div class="popup" id="popup-adb"></div>
            </div>
            <div id="silog" class="category">
              <div id="silog-container">
                <div class="txtSilog">
                  <h2>Silog</h2>
                  <hr>
                </div>
                <div class="menuContainer" id="silogMenuContainer">'; 
        foreach($silog_items as $item){
          $item_id = $item['item_id'];
          $item_image = $item['item_image'];
          $item_name = $item['item_name'];
          $item_subname = $item['item_subname'];

          if($user_type == 'admin') {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'silog\')">
                  <div class="cms-edit-delete"><button class="delete-cms"><i class="fa-regular fa-trash-can"></i></button> <button class="edit-cms"><i class="fa-regular fa-pen-to-square"></i></button></button></div>
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          } else {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'silog\')">
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          }
        }         
        echo '</div>
              </div>
              <div class="popup" id="popup-silog"></div>
            </div>
            <div id="pasta" class="category">
              <div id="pasta-container">
                <div class="txtPasta">
                  <h2>Pasta</h2>
                  <hr>
                </div>
                <div class="menuContainer" id="pastaMenuContainer">'; 
        foreach($pasta_items as $item){
          $item_id = $item['item_id'];
          $item_image = $item['item_image'];
          $item_name = $item['item_name'];
          $item_subname = $item['item_subname'];

          if($user_type == 'admin') {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'pasta\')">
                  <div class="cms-edit-delete"><button class="delete-cms"><i class="fa-regular fa-trash-can"></i></button> <button class="edit-cms"><i class="fa-regular fa-pen-to-square"></i></button></button></div>
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          } else {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'pasta\')">
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          }
        }
        echo '</div>
              </div>
              <div class="popup" id="popup-pasta"></div>
            </div>
            <div id="block69bargainbites" class="category">
              <div id="bargainBites-container">
                <div class="txtBargainBites">
                  <h2>Bargain Bites <span>(with rice)</span></h2>
                  <hr>
                </div>
                <div class="menuContainer" id="bargainBitesMenuContainer">'; 
        foreach($block69bargainbites_items as $item){
          $item_id = $item['item_id'];
          $item_image = $item['item_image'];
          $item_name = $item['item_name'];
          $item_subname = $item['item_subname'];

          if($user_type == 'admin') {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'block69bargainbites\')">
                  <div class="cms-edit-delete"><button class="delete-cms"><i class="fa-regular fa-trash-can"></i></button> <button class="edit-cms"><i class="fa-regular fa-pen-to-square"></i></button></button></div>
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          } else {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'block69bargainbites\')">
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          }
        }      
        echo '</div>
              </div>
              <div class="popup" id="popup-bargainBites"></div>
            </div>
            <div id="sidesandnibbles" class="category">
              <div id="sidesAndNibbles-container">
                <div class="txtSides&nibbles">
                  <h2>Sides And Nibbles</h2>
                  <hr>
                </div>
                <div class="menuContainer" id="sides&NibblesMenuContainer">'; 
        foreach($sidesandnibbles_items as $item){
          $item_id = $item['item_id'];
          $item_image = $item['item_image'];
          $item_name = $item['item_name'];
          $item_subname = $item['item_subname'];

          if($user_type == 'admin') {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'sidesandnibbles\')">
                  <div class="cms-edit-delete"><button class="delete-cms"><i class="fa-regular fa-trash-can"></i></button> <button class="edit-cms"><i class="fa-regular fa-pen-to-square"></i></button></button></div>
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          } else {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'sidesandnibbles\')">
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          }
        }        
        echo '</div>
              </div>
              <div class="popup" id="popup-sidesAndNibbles"></div>
            </div>
            <div id="carbsandcaffeine" class="category">
              <div id="carbsAndCaffeine-container">
                <div class="txtCarbs&caffeine">
                  <h2>Carbs And Caffeine</h2>
                  <hr>
                </div>
                <div class="menuContainer" id="carbs&caffeineMenuContainer">'; 
        foreach($carbsandcaffeine_items as $item){
          $item_id = $item['item_id'];
          $item_image = $item['item_image'];
          $item_name = $item['item_name'];
          $item_subname = $item['item_subname'];

          if($user_type == 'admin') {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'carbsandcaffeine\')">
                  <div class="cms-edit-delete"><button class="delete-cms"><i class="fa-regular fa-trash-can"></i></button> <button class="edit-cms"><i class="fa-regular fa-pen-to-square"></i></button></button></div>
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          } else {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'carbsandcaffeine\')">
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          }
        }        
        echo '</div>
                <div class="txtCroffle">
                  <p>Croffle: </p>
                </div>
                <div class="menuContainer" id="carbs&caffeineCroffleMenuContainer">'; 
        foreach($carbsandcaffeinecroffle_items as $item){
          $item_id = $item['item_id'];
          $item_image = $item['item_image'];
          $item_name = $item['item_name'];
          $item_subname = $item['item_subname'];

          if($user_type == 'admin') {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'carbsandcaffeine\')">
                  <div class="cms-edit-delete"><button class="delete-cms"><i class="fa-regular fa-trash-can"></i></button> <button class="edit-cms"><i class="fa-regular fa-pen-to-square"></i></button></button></div>
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          } else {
            echo '
              <div class="menu-options" id="'.$item_id.'" name="'.$item['item_name'].'">
                <div class="menu-option" onclick="generatePopup(\''.$item['item_name'].'\', \'carbsandcaffeine\')">
                  <img src="'.$item['item_image'].'" onclick="openPopup()">
                  <p onclick="openPopup()">'.$item['item_name'].'</p>
                </div>
              </div>';
          }
        }        
        echo '</div>
              </div>
              <div class="popup" id="popup-carbsAndCaffeine"></div>
            </div>
          </div>
        ';
      ?>
    </div>
  </form>

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
  </script>

  <?php include('partials/footer.php'); ?>