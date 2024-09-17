document.addEventListener('DOMContentLoaded', function() {
    //establishing them prices like im a house renter looking for new victims
    const ticketPrices = {
        normaal: 9.00,
        kind: 5.00,
        '65': 7.00
    };

    let totalPrice = 0;
    let discount = 0;

    // Functioning society updates the total price <3
    function updateTotalPrice() {
        let normaalQty = parseInt(document.getElementById('normaal').value);
        let kindQty = parseInt(document.getElementById('kind').value);
        let seniorQty = parseInt(document.getElementById('65').value);

        totalPrice = (normaalQty * ticketPrices.normaal) +
            (kindQty * ticketPrices.kind) +
            (seniorQty * ticketPrices['65']);

        totalPrice -= discount; // DISCCCOOUNTTTTT

        //sets the element with the id 'total-price' as the stuff u give it
        document.getElementById('total-price').textContent = ` €${totalPrice.toFixed(2)}`;
        //ON TO THE TICKET AMOUNT UPDATINGGGG HEHEEEEE (along w values u give inside the () n everythanggg)
        updateTicketAmount(normaalQty, kindQty, seniorQty);
    }

    // FUNCTIONING SOCIETY UPDATES THE TICKET AMOUNTTTT
    function updateTicketAmount(normaalQty, kindQty, seniorQty) {
        let ticketAmountText = '';
        if (normaalQty > 0) {
            ticketAmountText += `${normaalQty}x Normaal `;
        }
        if (kindQty > 0) {
            ticketAmountText += `${kindQty}x Kind `;
        }
        if (seniorQty > 0) {
            ticketAmountText += `${seniorQty}x 65+ `;
        }
        if (ticketAmountText === '') {
            ticketAmountText = 'Geen tickets geselecteerd';
        }

        //sets tha ho UUUPPP
        document.getElementById('order-summary-1').textContent = ticketAmountText;
        document.getElementById('order-summary-2').textContent = ticketAmountText;
    }

    // event listners because listening to people and validating their feelings is a nice thing to do <3
    document.getElementById('normaal').addEventListener('change', updateTotalPrice);
    document.getElementById('kind').addEventListener('change', updateTotalPrice);
    document.getElementById('65').addEventListener('change', updateTotalPrice);

    // DISCCOOUUUNTTTTT (or not?!?!) (gone wrong) (NOT CLICKBAIT!!!111!!1 11111!!!!!)
    document.getElementById('voucher-input').addEventListener('click', function(e) {
        e.preventDefault();

        let voucherCode = document.getElementById('code-input').value;

        // just a stand in voucher code for now since ion got time for that hehe :3
        if (voucherCode === '9yearanniverssary') {
            discount = 9.99; // Hehehhe undertale reference
            alert('Voucher applied!');
        } else {
            discount = 0;
            alert('Invalid voucher code');
        }

        updateTotalPrice(); // UPDATING THA HO'S PRICE CUZ SHE GOTTA AKNOW WHASSUUPP
    });

    // Update date and time display
    function updateDateTimeDisplay() {
        let selectedDate = document.getElementById('date').options[document.getElementById('date').selectedIndex].value;
        let selectedTime = document.getElementById('time').options[document.getElementById('time').selectedIndex].value;
    
        document.getElementById('selected-date').textContent = selectedDate;
        document.getElementById('selected-time').textContent = selectedTime;
    }
    
    // Event listeners for date and time changes
    document.getElementById('date').addEventListener('change', updateDateTimeDisplay);
    document.getElementById('time').addEventListener('change', updateDateTimeDisplay);
    
});