document.addEventListener('DOMContentLoaded', function () {
    const timeSlots = document.querySelectorAll('.time-slot');
    const bookingModal = new bootstrap.Modal(document.getElementById('bookingModal'));
    const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));

    timeSlots.forEach(slot => {
        slot.addEventListener('click', () => {
            const theater = slot.getAttribute('data-theater');
            const time = slot.getAttribute('data-time');

            document.getElementById('modalTheater').textContent = theater;
            document.getElementById('modalTime').textContent = time;
            document.getElementById('inputTheater').value = theater;
            document.getElementById('inputTime').value = time;

            bookingModal.show();
        });
    });

    document.getElementById('proceedToPayment').addEventListener('click', () => {
        // Collect selected seats
        const selectedSeats = Array.from(document.querySelectorAll('input[name="seats"]:checked'))
            .map(seat => seat.value)
            .join(', ');

        if (selectedSeats.length === 0) {
            alert("Please, Select At Least One Seat!!!");
            return;
        }

        document.getElementById('inputSeats').value = selectedSeats;
        bookingModal.hide();
        paymentModal.show();
    });

    // Payment form display based on selected method
    document.getElementById('paymentMethod').addEventListener('change', function () {
        const method = this.value;
        document.getElementById('paymentForms').style.display = "block";

        document.querySelectorAll('.payment-form').forEach(form => form.style.display = 'none');

        if (method === "upi") document.getElementById('upiForm').style.display = 'block';
        else if (method === "card") document.getElementById('cardForm').style.display = 'block';
        else if (method === "netbanking") document.getElementById('netbankingForm').style.display = 'block';
    });
});