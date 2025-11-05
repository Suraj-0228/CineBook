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

document.addEventListener("DOMContentLoaded", () => {
    const options = document.querySelectorAll(".payment-option");
    const forms = document.querySelectorAll(".payment-form");
    const methodInput = document.getElementById("payment_method");
    const confirmBtn = document.getElementById("confirmBookingBtn");

    const upiForm = document.getElementById("upiForm");
    const cardForm = document.getElementById("cardForm");
    const cashForm = document.getElementById("cashForm");

    const upiPayBtn = document.getElementById("upiPayBtn");
    const cardPayBtn = document.getElementById("cardPayBtn");
    const cashConfirmBtn = document.getElementById("cashConfirmBtn");

    // === Step 1: Handle Payment Option Selection ===
    options.forEach(option => {
        option.addEventListener("click", () => {
            const method = option.getAttribute("data-method");
            methodInput.value = method;

            // Hide all forms first
            forms.forEach(f => f.classList.add("d-none"));

            // Show selected payment form
            const activeForm = document.getElementById(method.toLowerCase() + "Form");
            if (activeForm) activeForm.classList.remove("d-none");

            // Disable booking button until payment confirmed
            confirmBtn.disabled = true;
        });
    });

    // === Step 2: Validate & Process UPI Payment ===
    upiPayBtn.addEventListener("click", () => {
        const upiId = document.getElementById("upiIdInput").value.trim();

        if (upiId === "" || !upiId.includes("@")) {
            alert("Please enter a valid UPI ID (example@upi)");
            return;
        }
        const modal = bootstrap.Modal.getInstance(document.getElementById("paymentModal"));
        modal.hide();

        // Auto submit form to PHP
        document.getElementById("bookingForm").submit();
    });

    // === Step 3: Validate & Process Card Payment ===
    cardPayBtn.addEventListener("click", () => {
        const cardNumber = document.getElementById("cardNumberInput").value.trim();
        const cardName = document.getElementById("cardHolderInput").value.trim();
        const cardExpiry = document.getElementById("cardExpiryInput").value.trim();
        const cardCVV = document.getElementById("cardCVVInput").value.trim();

        const cardNumberRegex = /^[0-9]{16}$/;
        const expiryRegex = /^(0[1-9]|1[0-2])\/[0-9]{2}$/;
        const cvvRegex = /^[0-9]{3}$/;

        if (!cardNumberRegex.test(cardNumber)) {
            alert("Invalid Card Number! Must be 16 digits.");
            return;
        }
        if (cardName === "") {
            alert("Please enter the Card Holder Name.");
            return;
        }
        if (!expiryRegex.test(cardExpiry)) {
            alert("Invalid Expiry Date! Use MM/YY format.");
            return;
        }
        if (!cvvRegex.test(cardCVV)) {
            alert("Invalid CVV! Must be 3 digits.");
            return;
        }
        const modal = bootstrap.Modal.getInstance(document.getElementById("paymentModal"));
        modal.hide();

        // Auto submit form to PHP
        document.getElementById("bookingForm").submit();
    });

    // === Step 4: Confirm Cash Payment ===
    cashConfirmBtn.addEventListener("click", () => {
        const modal = bootstrap.Modal.getInstance(document.getElementById("paymentModal"));
        modal.hide();

        // Auto submit form to PHP
        document.getElementById("bookingForm").submit();
    });

});
