// Get all the input fields for quantity
const quantityInputs = document.querySelectorAll('td input[type="number"]:nth-child(2)');

// Get the total price element
const totalPriceElement = document.querySelector('tfoot th[colspan="5"]');

// Function to calculate the total price
function calculateTotalPrice() {
  let totalPrice = 0;

  // Iterate through each product
  quantityInputs.forEach((input, index) => {
    const quantity = parseInt(input.value);
    const price = parseInt(document.querySelectorAll('td input[type="number"]:nth-child(3)')[index].value);
    const subtotal = quantity * price;
    document.querySelectorAll('td:last-child')[index].textContent = `${subtotal} €`;
    totalPrice += subtotal;
  });

  totalPriceElement.textContent = `Total = ${totalPrice} €`;
}

// Add event listeners to the quantity input fields
quantityInputs.forEach((input) => {
  input.addEventListener('input', calculateTotalPrice);
});

// Initial calculation of the total price
calculateTotalPrice();