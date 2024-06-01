function showCategory(categoryID) {
  // Get all elements with class "category"
  const categories = document.getElementsByClassName('category');
  // Loop through each category element
  for (let i = 0; i < categories.length; i++) {
      const category = categories[i];
      if (category.id === categoryID) {
          // If the category's ID matches the provided categoryId, display it
          category.style.display = 'block';
      } else {
          // Otherwise, hide it
          category.style.display = 'none';
      }
  }
}   

function openPopup(itemId) {
  const elementsToBlur = [
    document.getElementById("mainNav"),
    document.getElementById("sidebar"),
    document.getElementById("espresso-container"),
    document.getElementById("brew-container"),
    document.getElementById("noncoffeeandtea-container"),
    document.getElementById("matcha-container"),
    document.getElementById("beverages-container"),
    document.getElementById("alldaybreakfast-container"),
    document.getElementById("silog-container"),
    document.getElementById("pasta-container"),
    document.getElementById("bargainbites-container"),
    document.getElementById("sidesandnibbles-container"),
    document.getElementById("carbsandcaffeine-container"),
    document.getElementById("footer"),
    document.getElementById("privacy")
  ];
  
  const popup = document.getElementById(`popup-${itemId}`);
  const overlay = document.getElementById("overlay");
  
  if (popup) {
    popup.classList.add("open-popup");
    overlay.style.display = 'block';
    elementsToBlur.forEach(element => element.classList.add("blur-background"));

    // Disable clicks outside the popup
    document.body.style.pointerEvents = 'none';
    popup.style.pointerEvents = 'auto';
  }
}
function closePopup(itemId) {
  event.preventDefault(); // Prevent form submission
  
  const elementsToBlur = [
  document.getElementById("mainNav"),
  document.getElementById("sidebar"),
  document.getElementById("espresso-container"),
  document.getElementById("brew-container"),
  document.getElementById("noncoffeeandtea-container"),
  document.getElementById("matcha-container"),
  document.getElementById("beverages-container"),
  document.getElementById("alldaybreakfast-container"),
  document.getElementById("silog-container"),
  document.getElementById("pasta-container"),
  document.getElementById("bargainbites-container"),
  document.getElementById("sidesandnibbles-container"),
  document.getElementById("carbsandcaffeine-container"),
  document.getElementById("footer"),
  document.getElementById("privacy")
  ];

  const popup = document.getElementById(`popup-${itemId}`);

  if (popup) {
  popup.classList.remove("open-popup");
  overlay.style.display = 'none';
  elementsToBlur.forEach(element => element && element.classList.remove("blur-background"));
  
  // Enable clicks again
  document.body.style.pointerEvents = 'auto';
  }
}

function updateQuantity(change, popupId) {
  event.preventDefault(); // Prevent form submission
  const popup = document.getElementById(popupId);
  const quantityInput = popup.querySelector('.quantity-input');
  const currentQuantity = parseInt(quantityInput.value);
  let newQuantity = currentQuantity + change;

  if (newQuantity < 1) {
    newQuantity = 1;
  }

  quantityInput.value = newQuantity;
  updateTotalPrice(popupId);
}

function updateTotalPrice(popupId) {
  const popup = document.getElementById(popupId);
  const quantityInput = popup.querySelector('.quantity-input');
  const totalPriceInput = popup.querySelector('.total-price');
  const selectedSize = popup.querySelector('input[name="itemprice"]:checked');
  const totalPriceElement = popup.querySelector('.totalPrice span');

  if (selectedSize) {
    const intPrice = parseInt(selectedSize.value);
    const quantity = parseInt(quantityInput.value);
    const totalPrice = intPrice * quantity;
    
    totalPriceElement.textContent = "₱" + totalPrice;
    totalPriceInput.value = totalPrice;
  } else {
    totalPriceElement.textContent = "₱0";
    totalPriceInput.value = 0;
  }
}
// Determine the value of itemid and itemcustomization
function updateCustomization(sizeRadio) {
  const popup = sizeRadio.closest('.popup');
  const customizationInput = popup.querySelector('input[name="itemcustomization"]');
  const itemIdInput = popup.querySelector('input[name="itemid"]');
  const category = popup.querySelector('input[name="itemcategory"]').value;

  let customizationValue;

  if (category.includes("All Day Breakfast") || category.includes("Silog") || category.includes("Pasta") ||  
      category.includes("Bargain Bites") || category.includes("Sides And Nibbles") || category.includes("Carbs And Caffeine")) {
    if (sizeRadio.nextSibling.textContent.includes('Solo')) {
      customizationValue = 'Solo';
    } else {
      customizationValue = 'Savor';
    }
  } else {
    if (sizeRadio.nextSibling.textContent.includes('12oz')) {
      customizationValue = '12oz';
    } else {
      customizationValue = '16oz';
    }
  }

  // Define the pattern to match existing customization values
  const customizationPattern = /Solo|Savor|12oz|16oz/;

  // Replace existing customization value or append if not present
  if (customizationPattern.test(itemIdInput.value)) {
    itemIdInput.value = itemIdInput.value.replace(customizationPattern, customizationValue);
  } else {
    itemIdInput.value += customizationValue;
  }

  // Update customization input value
  customizationInput.value = customizationValue;

  updateTotalPrice(popup.id);
}
