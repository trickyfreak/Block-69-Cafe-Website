function generateMenuOptions() {
  const drinksNav = document.getElementById("drinksNav"); // Drinks Options
  const foodsNav = document.getElementById("foodsNav"); // Foods Options

  const drinksOptions = [ // Drinks
    {
      option: "espresso",
      name: "Espresso",
      image: "VANILLA CAFE LATTE"
    }, 
    {
      option: "brew",
      name: "Brew",
      image: "COLD BREW"
    }, 
    {
      option: "ncat",
      name: "Non-Coffee & Tea",
      image: "PINK PARADISE"
    }, 
    {
      option: "matcha",
      name: "Matcha",
      image: "MATCHA MANGO"
    }, 
    {
      option: "beverages",
      name: "Beverages",
      image: "NONE"
    }
  ];
  const foodsOptions = [ // Foods
    {
      option: "adb",
      name: "All Day Breakfast",
      image: "FRENCH TOAST"
    }, 
    {
      option: "silog",
      name: "Silog",
      image: "NONE"
    }, 
    {
      option: "pasta",
      name: "Pasta",
      image: "AGLIO OLIO"
    }, 
    {
      option: "bargainBites",
      name: "Block 69 Bargain Bites",
      image: "CHICKEN KATSUDON"
    }, 
    {
      option: "sides&nibbles",
      name: "Sides & Nibbles",
      image: "NONE"
    },
    {
      option: "carbs&caffeine",
      name: "Carbs N' Caffeine",
      image: "CLUBHOUSE SANDWICH"
    }
  ];

  drinksOptions.forEach(function (drinks) { // Drinks
    const subName = (drinks.name === "Espresso" || drinks.name === "Brew") ? "Iced/Hot" : ''; // for Espresso & Brew
    const subNameHTML = subName ? `<br> <span>${subName}</span>` : '';
    // Drinks
    const drinksOptionHTML = ` 
      <div class="options">
        <div class="option">
          <a href="#${drinks.option}}" onclick="showCategory('${drinks.option}')"><img src="BLK/${drinks.image}.png"></a>
          <a href="#${drinks.option}" onclick="showCategory('${drinks.option}')"><p>${drinks.name}${subNameHTML}</p></a>
        </div>
      </div>
    `;
    drinksNav.innerHTML += drinksOptionHTML; 
  });

  foodsOptions.forEach(function (foods) { // Foods
    const subName = (foods.name === "Block 69 Bargain Bites") ? "(with rice)" : ''; // for Block 69 Bargain Bites
    const subNameHTML = subName ? `<br> <span>${subName}</span>` : '';
    const foodsOptionsHTML = `
      <div class="options">
        <div class="option">
          <a href="#${foods.option}}" onclick="showCategory('${foods.option}')"><img src="BLK/${foods.image}.png"></a>
          <a href="#${foods.option}" onclick="showCategory('${foods.option}')"><p>${foods.name}${subNameHTML}</p></a>
        </div>
      </div>
    `;
    foodsNav.innerHTML += foodsOptionsHTML; 
  });
}

// Call the function to generate menu items when the page loads
document.addEventListener("DOMContentLoaded", function() {
  generateMenuOptions();
});