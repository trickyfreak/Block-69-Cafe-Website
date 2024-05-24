function generateMenuItems() {
  const espressoMenuContainer = document.getElementById("espressoMenuContainer"); // ESPRESSO
  const brewMenuContainer = document.getElementById("brewMenuContainer"); // BREW
  const brewMenuContainerSC = document.getElementById("brewMenuContainerSC"); // BREW: Sweet Cream
  const ncatMenuContainer = document.getElementById("ncatMenuContainer"); // NON-COFFEE & TEA
  const matchaMenuContainer = document.getElementById("matchaMenuContainer"); // MATCHA
  const beveragesMenuContainer = document.getElementById("beveragesMenuContainer"); // BEVERAGES
  const adbMenuContainer = document.getElementById("adbMenuContainer"); // ALL DAY BREAKFAST
  const silogMenuContainer = document.getElementById("silogMenuContainer"); // SILOG
  const pastaMenuContainer = document.getElementById("pastaMenuContainer"); // PASTA
  const bargainBitesMenuContainer = document.getElementById("bargainBitesMenuContainer"); // BARGAIN BITES
  const sidesAndNibblesMenuContainer = document.getElementById("sides&NibblesMenuContainer"); // SIDES & NIBBLES 
  const carbsAndCaffeineMenuContainer = document.getElementById("carbs&caffeineMenuContainer"); // CARBS N' CAFFEINE
  const carbsAndCaffeineCroffleMenuContainer = document.getElementById("carbs&caffeineCroffleMenuContainer"); // CARBS N' CAFFEINE: Croffle

  const espressoItems = [ // ESPRESSO
      "Spanish Latte",
      "White Choco Latte",
      "Mocha Latte",
      "Cinnamon Brown Latte",
      "Caramel-Vanilla Macchiato",
      "Cafe Latte",
      "Vanilla Cafe Latte",
      "Hazelnut Cafe Latte",
      "Salted Caramel Latte",
      "Americano",
      "Midnight Cherry",
      "Espresso Cloud"
  ];
  const brewItems = [ // BREW
    "Hot Brewed Coffee",
    "Cold Brew",
    "Iced Coffee",
  ];
  const brewItemsSC = [ // BREW
    "Vanilla",
    "Hazelnut",
    "Caramel",
  ];
  const ncatItems = [ // NON-COFFEE & TEA
    "Hot Chocolate",
    "Triple Chocolate",
    "Pink Paradise",
    "Tropical Cloud",
    "Caramel Candy",
    "Dark Berry",
    "Vanilla McDreamy",
    "Chamomile Tea",
    "Purple Bloom",
    "Lavender Tea",
    "Pure Green Tea",
    "English Breakfast Tea",
    "Wild Berry",
    "Hibiscus Tea",
    "Strawberry & Mango"
  ];
  const matchaItems = [ // MATCHA
    "Matcha Mango",
    "Nutty Green Tea",
    "Vanilla Kissed Matcha",
    "Spicy Matcha",
    "Tita Maggie's Matcha",
    "Whiteout Matcha",
    "Matcha Latte",
    "Dirty Matcha",
    "Green & Sweet",
    "Ichigo Matcha",
  ];
  const beveragesItems = [ // BEVERAGES
    "Mango Juice",
    "Cucumber Juice",
    "Iced Tea",
    "Coca-Cola Zero",
    "Regular Coca-Cola",
    "Pepsi"
  ];
  const adbItems = [ // ALL DAY BREAKFAST
    "Poffertjes",
    "Fluffy Pancakes",
    "French Toast",
    "Classic Waffles",
    "Marga's Fave",
    "Breakfast Platter"
  ];
  const silogItems = [ // SILOG
    "Chicksilog",
    "Tapsilog",
    "Luncheonsilog",
    "Bacsilog",
    "Carrot Rice",
    "Plain Rice"
  ];
  const pastaItems = [ // PASTA
    "Chicken Pesto",
    "Gourment Tuyo",
    "Aglio Olio",
    "Garlic Bread"
  ];
  const bargainBitesItems = [ // BARGAIN BITES
    "Chicken Poppers",
    "Chicken Teriyaki",
    "Pork Teriyaki",
    "Chicken Katsudon",
    "Pork Katsudon"
  ];
  const sidesAndNibblesItems = [ // SIDES & NIBBLES 
      "Fries",
      "Fries Before Guys",
      "Mozarella Balls",
      "Nachos Overload",
      "Chicken Balls",
      "Chicken Balls Mix",
      "Calamari",
      "Calamari Mix",
      "Hashbrown",
  ];
  const carbsAndCaffeineItems = [ // CARBS N' CAFFEINE
    "Clubhouse Sandwich",
    "Pain Au Chocolat",
    "Butter Croissant",
    "Croissanwich"
  ];
  const carbsAndCaffeineCroffleItems = [ // CARBS N' CAFFEINE: Croffle
    "Plain",
    "Strawberry Field",
    "Mango Tango",
    "Choco Traffle"
  ];

  espressoItems.forEach(function(item) { // ESPRESSO
    var imageName = item.toUpperCase()
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'espresso')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    espressoMenuContainer.innerHTML += menuItemHTML;
  });
  brewItems.forEach(function (item) { // BREW
    var imageName = item.toUpperCase()
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'brew')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    brewMenuContainer.innerHTML += menuItemHTML;
  });
  brewItemsSC.forEach(function (item) { // BREW: Sweet Cream
    var imageName = item.toUpperCase();
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'brew')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    brewMenuContainerSC.innerHTML += menuItemHTML;
  });
  ncatItems.forEach(function (item) { // NON-COFFEE & TEA
    var imageName = item.toUpperCase();
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'ncat')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    ncatMenuContainer.innerHTML += menuItemHTML;
  }); 
  matchaItems.forEach(function (item) { // MATCHA
    var imageName = item.toUpperCase();
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'matcha')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    matchaMenuContainer.innerHTML += menuItemHTML;
  });
  beveragesItems.forEach(function (item) { // BEVERAGES
    var imageName = item.toUpperCase();
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'beverages')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    beveragesMenuContainer.innerHTML += menuItemHTML;
  });
  adbItems.forEach(function (item) { // ALL DAY BREAKFAST
    var imageName = item.toUpperCase();
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'adb')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    adbMenuContainer.innerHTML += menuItemHTML;
  });
  silogItems.forEach(function (item) { // SILOG
    var imageName = item.toUpperCase();
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'silog')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    silogMenuContainer.innerHTML += menuItemHTML;
  });
  pastaItems.forEach(function (item) { // PASTA
    var imageName = item.toUpperCase();
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'pasta')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    pastaMenuContainer.innerHTML += menuItemHTML;
  });
  bargainBitesItems.forEach(function (item) { // BARGAIN BITES
    var imageName = item.toUpperCase();
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'bargainBites')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    bargainBitesMenuContainer.innerHTML += menuItemHTML;
  });
  sidesAndNibblesItems.forEach(function (item) { // SIDES & NIBBLES 
    var imageName = item.toUpperCase();
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'sides&nibbles')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    sidesAndNibblesMenuContainer.innerHTML += menuItemHTML;
  });
  carbsAndCaffeineItems.forEach(function (item) { // CARBS N' CAFFEINE
    var imageName = item.toUpperCase();
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'carbs&caffeine')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    carbsAndCaffeineMenuContainer.innerHTML += menuItemHTML;
  });
  carbsAndCaffeineCroffleItems.forEach(function (item) { // CARBS N' CAFFEINE: Croffle
    var imageName = item.toUpperCase();
    var menuItemHTML = `
      <div class="menu-options" id="${item}">
        <div class="menu-option" onclick="generatePopup('${item}', 'carbsAndCaffeine')">
          <img src="BLK/${imageName}.png" onclick="openPopup()">
          <p onclick="openPopup()">${item}</p>
        </div>
      </div>
    `;
    carbsAndCaffeineCroffleMenuContainer.innerHTML += menuItemHTML;
  });
}

// Call the function to generate menu items when the page loads
document.addEventListener("DOMContentLoaded", function() {
  generateMenuItems();
});