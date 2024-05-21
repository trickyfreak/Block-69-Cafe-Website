  <?php 
  session_start();
  include_once('partials/header.php'); ?>
  <link href="css/menu.css" rel="stylesheet">
  <script src="javascript/menu.js"></script>
  <script src="javascript/menuItems.js"></script>
  <script src="javascript/menuNav.js"></script>
  <script src="javascript/menuPopup.js"></script>
  <script src="javascript/menuQuantity.js"></script>

  <div class="sidebarAndContent">
    <div class="sidebar" id="sidebar">
      <ul>
        <li class="header1"><a href="#menu" onclick="showCategory('menu')">Menu</a></li><br><br>
        <li class="header2">Drinks</li>
        <li class="choice"><a href="#espresso" onclick="showCategory('espresso')">Espresso</a></li>
        <li class="choice"><a href="#brew" onclick="showCategory('brew')">Brew</a></li>
        <li class="choice"><a href="#ncat" onclick="showCategory('ncat')">Non-Coffee & Tea</a></li>
        <li class="choice"><a href="#matcha" onclick="showCategory('matcha')">Matcha</a></li>
        <li class="choice"><a href="#beverages" onclick="showCategory('beverages')">Beverages</a></li>
        <br><br>
        <li class="header2">Foods</li>
        <li class="choice"><a href="#adb" onclick="showCategory('adb')">All Day Breakfast</a></li>
        <li class="choice"><a href="#silog" onclick="showCategory('silog')">Silog</a></li>
        <li class="choice"><a href="#pasta" onclick="showCategory('pasta')">Pasta</a></li>
        <li class="choice"><a href="#bargainBites" onclick="showCategory('bargainBites')">Bargain Bites</a></li>
        <li class="choice"><a href="#sides&nibbles" onclick="showCategory('sides&nibbles')">Sides & Nibbles</a></li>
        <li class="choice"><a href="#carbs&caffeine" onclick="showCategory('carbs&caffeine')">Carbs N' Caffeine</a></li>
      </ul>
    </div>

    <div class="contents">
      <div id="menu" class="category">
        <div class="txtDrinks">
          <h2>Drinks</h2>
          <hr>
        </div>
        <div class="drinksOptions" id="drinksNav"></div>
        <div class="txtFoods">
          <h2>Foods</h2>
          <hr>
        </div>
        <div class="foodsOptions" id="foodsNav"></div>
      </div>
      <div id="espresso" class="category">
        <div id="espresso-container">
          <div class="txtEspresso" id="espresso-text">
            <h2>Espresso</h2> 
            <p>Iced/Hot</p> 
            <hr>
          </div>
          <div class="menuContainer" id="espressoMenuContainer"></div>
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
          <div class="menuContainer" id="brewMenuContainer"></div>
          <div class="txtSweetCream">
            <p>Sweet Cream:</p>
          </div>
          <div class="menuContainer" id="brewMenuContainerSC"></div>
        </div>
        <div class="popup" id="popup-brew"></div>
      </div>
      <div id="ncat" class="category">
        <div id="ncat-container">
          <div class="txtNcat">
            <h2>Non-Coffee & Tea</h2>
            <hr>
          </div>
          <div class="menuContainer" id="ncatMenuContainer"></div>
        </div>
        <div class="popup" id="popup-ncat"></div>
      </div>
      <div id="matcha" class="category">
        <div id="matcha-container">
          <div class="txtMatcha">
            <h2>Matcha</h2>
            <hr>
          </div>
          <div class="menuContainer" id="matchaMenuContainer"></div>
        </div>
        <div class="popup" id="popup-matcha"></div>
      </div>
      <div id="beverages" class="category">
        <div id="beverages-container">
          <div class="txtBeverages">
            <h2>Beverages</h2>
            <hr>
          </div>
          <div class="menuContainer" id="beveragesMenuContainer"></div>
        </div>
        <div class="popup" id="popup-beverages"></div>
      </div>
      <div id="adb" class="category">
        <div id="adb-container">
          <div class="txtAdb">
            <h2>All Day Breakfast</h2>
            <hr>
          </div>
          <div class="menuContainer" id="adbMenuContainer"></div>
        </div>
        <div class="popup" id="popup-adb"></div>
      </div>
      <div id="silog" class="category">
        <div id="silog-container">
          <div class="txtSilog">
            <h2>Silog</h2>
            <hr>
          </div>
          <div class="menuContainer" id="silogMenuContainer"></div>
        </div>
        <div class="popup" id="popup-silog"></div>
      </div>
      <div id="pasta" class="category">
        <div id="pasta-container">
          <div class="txtPasta">
            <h2>Pasta</h2>
            <hr>
          </div>
          <div class="menuContainer" id="pastaMenuContainer"></div>
        </div>
        <div class="popup" id="popup-pasta"></div>
      </div>
      <div id="bargainBites" class="category">
        <div id="bargainBites-container">
          <div class="txtBargainBites">
            <h2>Bargain Bites <span>(with rice)</span></h2>
            <hr>
          </div>
          <div class="menuContainer" id="bargainBitesMenuContainer"></div>
        </div>
        <div class="popup" id="popup-bargainBites"></div>
      </div>
      <div id="sides&nibbles" class="category">
        <div id="sidesAndNibbles-container">
          <div class="txtSides&nibbles">
            <h2>Sides & Nibbles</h2>
            <hr>
          </div>
          <div class="menuContainer" id="sides&NibblesMenuContainer"></div>
        </div>
        <div class="popup" id="popup-sidesAndNibbles"></div>
      </div>
      <div id="carbs&caffeine" class="category">
        <div id="carbsAndCaffeine-container">
          <div class="txtCarbs&caffeine">
            <h2>Carbs N' Caffeine</h2>
            <hr>
          </div>
          <div class="menuContainer" id="carbs&caffeineMenuContainer"></div>
          <div class="txtCroffle">
            <p>Croffle: </p>
          </div>
          <div class="menuContainer" id="carbs&caffeineCroffleMenuContainer"></div>
        </div>
        <div class="popup" id="popup-carbsAndCaffeine"></div>
      </div>
    </div>
  </div>

  <?php include('partials/footer.php'); ?>