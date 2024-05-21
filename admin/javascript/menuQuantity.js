function updateQuantity(change, popupId) {
  const popup = document.getElementById(popupId);
  const quantityInput = popup.querySelector('.quantityInput');
  const currentQuantity = parseInt(quantityInput.value);
  const stringPrice = popup.querySelector('input[name="size"]:checked');
  let newQuantity = 0;

  if(!stringPrice) {
    newQuantity = 1;
  } else {
    newQuantity = currentQuantity + change;
  }
  if (newQuantity < 1) {
    newQuantity = 1;
  }

  quantityInput.value = newQuantity;
  
  const total = popup.querySelector('.totalPrice span');

  if(total && stringPrice) {
    const intPrice = parseInt(stringPrice.value);
    let totalPrice = intPrice * newQuantity;
    total.textContent = "₱" + totalPrice;
  } 
}