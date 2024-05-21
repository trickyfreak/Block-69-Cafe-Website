  <?php 

  session_start();
  include_once('partials/header.php'); 
  
  ?>
  
  <link href="css/menu.css" rel="stylesheet">
  <script src="javascript/menu.js"></script>

  <div class="container">
    <div class="sidebar">
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
        <div class="drinksOptions">
          <div class="options">
            <div class="option">
              <a href="#espresso" onclick="showCategory('espresso')"><img src="BLK/VANILLA CAFE LATTE.png"></a>
              <a href="#espresso" onclick="showCategory('espresso')"><p>Espresso <br> <span>Iced/Hot</span></p></a>
            </div>
          </div>
          <div class="options">
            <div class="option">
              <a href="#brew" onclick="showCategory('brew')"><img src="BLK/Vanilla Sweet Cream.png"></a>
              <a href="#brew" onclick="showCategory('brew')"><p>Brew <br> <span>Iced/Hot</span></p></a>
            </div>
          </div>
          <div class="options">
            <div class="option">
              <a href="#ncat" onclick="showCategory('ncat')"><img src="BLK//PINK PARADISE.png"></a>
              <a href="#ncat" onclick="showCategory('ncat')"><p>Non-Coffee & tea</p></a>
            </div>
          </div>
          <div class="options">
            <div class="option">
              <a href="#matcha" onclick="showCategory('matcha')"><img src="BLK/Matcha Mango.png"></a>
              <a href="#matcha" onclick="showCategory('matcha')"><p>Matcha</p></a>
            </div>
          </div>
          <div class="options">
            <div class="option">
              <a href="#beverages" onclick="showCategory('beverages')"><img src="BLK/COLDHOT BREW.png"></a>
              <a href="#beverages" onclick="showCategory('beverages')"><p>Beverages</p></a>
            </div>
          </div>
        </div>

        <div class="txtFoods">
          <h2>Foods</h2>
          <hr>
        </div>
        <div class="foodsOptions">
          <div class="options">
            <div class="option">
              <a href="#adb" onclick="showCategory('adb')"><img src="BLK/French Toast.jpg"></a>
              <a href="#adb" onclick="showCategory('adb')"><p>All Day Breakfast</p></a>
            </div>
          </div>
          <div class="options">
            <div class="option">
              <a href="#silog" onclick="showCategory('silog')"><img src="BLK/none.png"></a>
              <a href="#silog" onclick="showCategory('silog')"><p>Silog</p></a>
            </div>
          </div>
          <div class="options">
            <div class="option">
              <a href="#pasta" onclick="showCategory('pasta')"><img src="BLK/AGLIO OLIO.png"></a>
              <a href="#pasta" onclick="showCategory('pasta')"><p>Pasta</p></a>
            </div>
          </div>
          <div class="options">
            <div class="option">
              <a href="#bargainBites" onclick="showCategory('bargainBites')"><img src="BLK/Chicken Katsudon.png"></a>
              <a href="#bargainBites" onclick="showCategory('bargainBites')"><p>Block 69 Bargain Bites <br> <span>(with rice)</span></p></a>
            </div>
          </div>
          <div class="options">
            <div class="option">
              <a href="#sides&nibbles" onclick="showCategory('sides&nibbles')"><img src="BLK/none.png"></a>
              <a href="#sides&nibbles" onclick="showCategory('sides&nibbles')"><p>Sides & Nibbles</p></a>
            </div>
          </div>
          <div class="options">
            <div class="option">
              <a href="#carbs&caffeine" onclick="showCategory('carbs&caffeine')"><img src="BLK/Clubhouse Sandwich.png"></a>
              <a href="#carbs&caffeine" onclick="showCategory('carbs&caffeine')"><p>Carbs N' Caffeine</p></a>
            </div>
          </div>
        </div>
      </div>
      <div id="espresso" class="category">
        <div class="txtEspresso">
          <h2>Espresso</h2> 
          <p>Iced/Hot</p>
          <hr>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/SPANISH LATTE.png">
              <p>Spanish Latte</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/WHITE CHOCO LATTE.png">
              <p>White Choco Latte</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/MOCHA LATTE.png">
              <p>Mocha Latte</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/CINNAMON BROWN LATTE.png">
              <p>Cinnamon Brown Latte</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/CARAMEL VANILLA MACCHIATO.png">
              <p>Caramel-Vanilla Macchiato</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/PINK DRINK.png">
              <p>Pink Drink</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/CAFE LATTE.png">
              <p>Cafe Latte</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/VANILLA CAFE LATTE.png">
              <p>Vanilla Cafe Latte</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/HAZELNUT CAFE LATTE.png">
              <p>Hazelnut Cafe Latte</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/SALTED CARAMEL LATTE.png">
              <p>Salted Caramel Latte</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/PINK PARADISE.png">
              <p>Americano</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/Midnight Cherry.png">
              <p>Midnight Cherry</p>
            </div>
          </div>
        </div>
      </div>
      <div id="brew" class="category">
        <div class="txtBrew">
          <h2>Brew</h2> 
          <p>Iced/Hot</p>
          <hr>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/COLDHOT BREW.png">
              <p>Hot Brewed Coffee</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/cold brew.png">
              <p>Cold Brew</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/iced coffee.png">
              <p>Iced Coffee</p>
              <p><span>brewed coffee w/ milk</span></p>
            </div>
          </div>
        </div>
        <div class="txtSweetCream">
          <p>Sweet Cream:</p>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/Vanilla Sweet Cream.png">
              <p>Vanilla</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/Hazelnut Sweetcream.png">
              <p>Hazelnut</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/CARAMEL SWEET CREAM.png">
              <p>Caramel</p>
            </div>
          </div>
        </div>
      </div>
      <div id="ncat" class="category">
        <div class="txtNcat">
          <h2>Non-Coffee & Tea</h2>
          <hr>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/HOT CHOCOLATE.png">
              <p>Hot Chocolate</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/TRIPLE CHOCO (1).png">
              <p>Ice Triple Chocolate</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/PINK PARADISE.png">
              <p>Pink Paradise</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/TROPICAL CLOUD.png">
              <p>Tropical Cloud</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/Caramel Candy.png">
              <p>Caramel Candy</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/dark berry.png">
              <p>Dark Berry</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/Vanilla Mcdreamy (1).png">
              <p>Vanilla McDreamy</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/chamomile.png">
              <p>Chamomile Tea</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/purple bloom.png">
              <p>Purple Bloom</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/lavender.png">
              <p>Lavender tea</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/green tea.png">
              <p>Pure Green Tea</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/english breakfast.png">
              <p>English Breakfast Tea</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/wild berry.png">
              <p>Wild Berry</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/HIBISCUS TEA.png">
              <p>Hibiscus Tea</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/Strawberry Mango Tea.png">
              <p>Strawberry & Mango</p>
            </div>
          </div>
        </div>
      </div>
      <div id="matcha" class="category">
        <div class="txtMatcha">
          <h2>Matcha</h2>
          <hr>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/Matcha Mango.png">
              <p>Matcha Mango</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Nutty Green Tea</p>
              <p><span>hazelnut & matcha</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Vanilla Kissed Matcha</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/SPICY MATCHA.png">
              <p>Spicy Matcha</p>
              <p><span>cinnamon & matcha</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Tita Maggie's Matcha</p>
              <p><span>caramel & matcha</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/whiteout matcha.png">
              <p>Whiteout Matcha</p>
              <p><span>white chocolate & matcha</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/MATCHA LATTE.png">
              <p>Matcha Latte</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/Dirty Matcha Shot .png">
              <p>Dirty Matcha</p>
              <p><span>espresso shot & matcha</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Green & Sweet</p>
              <p><span>chocolate & matcha</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/ICHIGO MATCHA.png">
              <p>Ichigo Matcha</p>
              <p><span>wild berry & matcha</span></p>
            </div>
          </div>
        </div>
      </div>
      <div id="beverages" class="category">
        <div class="txtBeverages">
          <h2>Beverages</h2>
          <hr>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/COLDHOT BREW.png">
              <p>Mango Juice</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/COLDHOT BREW.png">
              <p>Cucumber Juice</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/COLDHOT BREW.png">
              <p>Iced Tea</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/COLDHOT BREW.png">
              <p>Coca-Cola Zero</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/COLDHOT BREW.png">
              <p>Regular Coca-Cola</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/COLDHOT BREW.png">
              <p>Pepsi</p>
            </div>
          </div>
        </div>
      </div>
      <div id="adb" class="category">
        <div class="txtAdb">
          <h2>All Day Breakfast</h2>
          <hr>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/Poffertjes.png">
              <p>Poffertjes</p>
              <p><span>(7 pcs. mini pancakes)</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Fluffy Pancakes</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/French Toast.jpg">
              <p>French Toast</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Classic Waffles</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Marga's Fave</p>
              <p><span>(eggs, toasted bread, pesto paste, bacon, & 12 oz any espresso)</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Breakfast Platter</p>
              <p><span>(hash brown, egg, bacon, 3 pcs, pancake, luncheon meat and brewed coffee)</span></p>
            </div>
          </div>
        </div>
      </div>
      <div id="silog" class="category">
        <div class="txtSilog">
          <h2>Silog</h2>
          <hr>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Chicksilog</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Tapsilog</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Luncheonsilog</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Bacsilog</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Carrot Rice</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Plain Rice</p>
            </div>
          </div>
        </div>
      </div>
      <div id="pasta" class="category">
        <div class="txtPasta">
          <h2>Pasta</h2>
          <hr>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/CHICKEN PESTO.png">
              <p>Chicken Pesto</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/Gourmet Tuyo.png">
              <p>Gourment Tuyo</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/AGLIO OLIO.png">
              <p>Aglio Olio</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Garlic Bread <br> <span>(3pcs.)</span></p>
            </div>
          </div>
        </div>
      </div>
      <div id="bargainBites" class="category">
        <div class="txtBargainBites">
          <h2>Bargain Bites <span>(with rice)</span></h2>
          <hr>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/CHICKEN PESTO.png">
              <p>Chicken Pesto</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/Gourmet Tuyo.png">
              <p>Gourment Tuyo</p>
            </div>
          </div>
          <div class="foods-options">
            <div class="menu-options">
              <div class="menu-option">
                <img src="BLK/AGLIO OLIO.png">
                <p>Aglio Olio</p>
              </div>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Garlic Bread <br> <span>(3pcs.)</span></p>
            </div>
          </div>
        </div>
      </div>
      <div id="sides&nibbles" class="category">
        <div class="txtSides&nibbles">
          <h2>Sides & Nibbles</h2>
          <hr>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Fries <br> <span>(original, cheese, barbeque, or sour cream)</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Fries Before Guys <br> <span>(cheesy bacon)</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Mozzarella Balls <br> <span>(12 pcs.)</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Nachos Overload</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Chicken Balls</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Chicken Balls Mix <br> <span>(w/ fries)</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Calamari</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Calamari Mix <br> <span>(w/ fries)</span></p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Hashbrown</p>
            </div>
          </div>
        </div>
      </div>
      <div id="carbs&caffeine" class="category">
        <div class="txtCarbs&caffeine">
          <h2>Carbs N' Caffeine</h2>
          <hr>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/Clubhouse Sandwich.png">
              <p>Clubhouse Sandwich</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Pain Au Chocolat</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Butter Croissant</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Croissanwich</p>
            </div>
          </div>
        </div>
        <div class="txtCroffle">
          <p>Croffle: </p>
        </div>
        <div class="menuContainer">
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Plain</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Strawberry Field</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Mango Tango</p>
            </div>
          </div>
          <div class="menu-options">
            <div class="menu-option">
              <img src="BLK/none.png">
              <p>Choco Traffle</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('partials/footer.php'); ?>