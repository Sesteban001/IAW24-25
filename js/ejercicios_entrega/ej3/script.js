// Seleccionar todos los botones de más y menos
document.querySelectorAll('.btn').forEach(button => {
    button.addEventListener('click', function () {
        const row = this.closest('tr'); // Obtener la fila actual
        const quantityInput = row.querySelector('input[type="number"]'); // Input de cantidad
        const priceInput = row.querySelector('td input[type="number"]'); // Input de precio
        const subtotalCell = row.querySelector('td.text-end'); // Celda de subtotal

        let quantity = parseInt(quantityInput.value); // Obtener cantidad actual
        const price = parseFloat(priceInput.value); // Obtener precio actual

        // Incrementar o decrementar cantidad según el botón presionado
        if (this.textContent === '+') quantity++;
        if (this.textContent === '-' && quantity > 0) quantity--;

        // Actualizar el valor del input de cantidad
        quantityInput.value = quantity;

        // Calcular y mostrar el subtotal
        const subtotal = quantity * price;
        subtotalCell.textContent = `${subtotal.toFixed(2)} €`;

        // Actualizar el total general
        updateTotal();
    });
});

// Función para actualizar el total general
function updateTotal() {
    let total = 0;

    // Sumar todos los subtotales
    document.querySelectorAll('td.text-end').forEach(cell => {
        total += parseFloat(cell.textContent.replace('€', '')) || 0;
    });
    // Calcular gastos de envío
    let shippingCost = 0;
    if (total > 0 && total <= 50) {
        shippingCost = 6.50; // Añadir gastos de envío si el total es menor o igual a 50€
    }

    // Mostrar el total con gastos de envío
    const totalWithShipping = total + shippingCost;
    document.querySelector('tfoot th').textContent = `Total = ${totalWithShipping.toFixed(2)}€`;

    // Mostrar mensaje sobre gastos de envío
    const shippingMessage = document.querySelector('#shipping-message');
    if (shippingCost === 0) {
        shippingMessage.textContent = '¡Envío gratuito!';
    } else {
        shippingMessage.textContent = `Gastos de envío: ${shippingCost.toFixed(2)}€`;
    }
}

// Actualizar subtotales y total si se cambia el precio manualmente
document.querySelectorAll('td input[type="number"]').forEach(input => {
    input.addEventListener('input', function () {
        const row = this.closest('tr'); // Obtener la fila actual
        const quantityInput = row.querySelector('input[type="number"]'); // Input de cantidad
        const subtotalCell = row.querySelector('td.text-end'); // Celda de subtotal

        const quantity = parseInt(quantityInput.value); // Obtener cantidad actual
        const price = parseFloat(this.value); // Obtener precio actual

        // Calcular y mostrar el subtotal
        const subtotal = quantity * price;
        subtotalCell.textContent = `${subtotal.toFixed(2)} €`;

        // Actualizar el total general
        updateTotal();
    });
});
