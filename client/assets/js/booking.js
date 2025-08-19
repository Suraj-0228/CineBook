document.addEventListener("DOMContentLoaded", function () {
    const showSelect = document.getElementById("show_id");
    const totalSeatSelect = document.getElementById("totalSeat");
    const ticketPriceInput = document.getElementById("ticketPrice");
    const amountInput = document.getElementById("amount");

    function updateAmount() {
        const selectedOption = showSelect.options[showSelect.selectedIndex];
        let price = 0;
        let seats = 0;

        if (selectedOption && selectedOption.value !== "") {
            price = parseFloat(selectedOption.getAttribute("data-price")) || 0;
        }

        if (totalSeatSelect.value !== "") {
            seats = parseInt(totalSeatSelect.value) || 0;
        }

        ticketPriceInput.value = price;
        amountInput.value = price * seats;
    }

    showSelect.addEventListener("change", updateAmount);
    totalSeatSelect.addEventListener("change", updateAmount);

    updateAmount();
});