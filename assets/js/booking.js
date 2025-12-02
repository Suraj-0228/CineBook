document.addEventListener("DOMContentLoaded", function () {
    // Only real seat buttons, ignore legend seats
    const seats = document.querySelectorAll(".seat:not(.legend)");
    const seatRowInput = document.getElementById("seatRow");
    const totalSeatInput = document.getElementById("totalSeat");
    const selectedLabel = document.getElementById("selectedSeatsLabel");
    const ticketPriceInput = document.getElementById("ticketPrice");
    const amountInput = document.getElementById("amount");
    const showSelect = document.getElementById("show_id");

    function recalcAmount() {
        const price = parseFloat(ticketPriceInput.value) || 0;

        // Count seats from seatRow string itself
        const seatsCount = seatRowInput.value
            ? seatRowInput.value.split(",").filter(s => s.trim() !== "").length
            : 0;

        totalSeatInput.value = seatsCount;

        if (seatsCount > 0 && price > 0) {
            amountInput.value = (price * seatsCount).toFixed(2);
        } else {
            amountInput.value = "";
        }
    }

    function updateSeatSelection() {
        // Only selected seat buttons, ignore legends
        const selectedSeats = Array.from(
            document.querySelectorAll(".seat.selected:not(.legend)")
        );

        const seatCodes = [];

        selectedSeats.forEach(seat => {
            const row = seat.dataset.row;                 // e.g. "A" or "B"
            const text = seat.textContent.trim();        // visible number, e.g. "1", "02"

            // Skip any invalid seat (no row or number)
            if (!row || !text) return;

            const num = text.padStart(2, "0");           // "1" -> "01"
            seatCodes.push(row + num);                   // "A01"
        });

        // Save to hidden input for backend
        seatRowInput.value = seatCodes.join(", ");

        // Show in label
        selectedLabel.textContent = seatCodes.length
            ? seatCodes.join(", ")
            : "None";

        recalcAmount();
    }

    // Click handler for each valid seat
    seats.forEach(seat => {
        seat.addEventListener("click", () => {
            if (seat.classList.contains("booked")) return; // locked seat
            seat.classList.toggle("selected");
            updateSeatSelection();
        });
    });

    // When show changes, update ticket price & recalc total
    if (showSelect) {
        showSelect.addEventListener("change", function () {
            const opt = this.options[this.selectedIndex];
            const price = opt.getAttribute("data-price") || "";
            ticketPriceInput.value = price;
            recalcAmount();
        });
    }
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

            forms.forEach(f => f.classList.add("d-none"));

            const activeForm = document.getElementById(method.toLowerCase() + "Form");
            if (activeForm) activeForm.classList.remove("d-none");

            confirmBtn.disabled = true;
        });
    });

    // === Step 2: Validate & Process UPI Payment ===
    upiPayBtn.addEventListener("click", () => {

        const upiId = document.getElementById("upiIdInput").value.trim();
        const errorTag = document.getElementById("upiError");
        const upiPattern = /^[a-zA-Z0-9.\-_]{2,}@[a-zA-Z]{2,}$/;

        if (
            upiId === "" ||
            upiId === "@" ||
            upiId.toLowerCase() === "upi" ||
            !upiPattern.test(upiId)
        ) {
            errorTag.innerText = "Please enter a valid UPI ID (Example: yourname@upi)";
            errorTag.classList.remove("d-none");
            return;
        }

        errorTag.classList.add("d-none");

        const modal = bootstrap.Modal.getInstance(document.getElementById("paymentModal"));
        modal.hide();

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

        document.getElementById("bookingForm").submit();
    });

    // === Step 4: Confirm Cash Payment ===
    cashConfirmBtn.addEventListener("click", () => {
        const modal = bootstrap.Modal.getInstance(document.getElementById("paymentModal"));
        modal.hide();

        document.getElementById("bookingForm").submit();
    });

});
