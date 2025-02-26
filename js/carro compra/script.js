document.addEventListener("DOMContentLoaded", () => {
    const table = document.querySelector("table");
    const totalElement = document.querySelector("tfoot th");

    table.addEventListener("click", (event) => {
        if (event.target.classList.contains("btn-outline-dark")) {
            const row = event.target.closest("tr");
            const quantityInput = row.querySelector("input[type='number']");
            const priceInput = row.querySelector("input[type='number']:nth-of-type(2)");
            const subtotalElement = row.querySelector("td.text-end");

            let quantity = parseInt(quantityInput.value);
            const price = parseFloat(priceInput.value);

            if (event.target.textContent === "+") {
                quantity++;
            } else if (event.target.textContent === "-" && quantity > 0) {
                quantity--;
            }

            quantityInput.value = quantity;
            const subtotal = quantity * price;
            subtotalElement.textContent = `${subtotal.toFixed(2)} €`;

            updateTotal();
        }
    });

    function updateTotal() {
        let total = 0;
        const subtotals = document.querySelectorAll("td.text-end");
        subtotals.forEach(subtotalElement => {
            const subtotal = parseFloat(subtotalElement.textContent);
            total += subtotal;
        });
        totalElement.textContent = `Total = ${total.toFixed(2)}€`;
    }
});