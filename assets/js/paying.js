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
        document.getElementById('order-summary').textContent = ticketAmountText;
    }

    // event listners because listening to people and validating their feelings is a nice thing to do <3
    document.getElementById('normaal').addEventListener('change', updateTotalPrice);
    document.getElementById('kind').addEventListener('change', updateTotalPrice);
    document.getElementById('65').addEventListener('change', updateTotalPrice);

    // DISCCOOUUUNTTTTT (or not?!?!) (gone wrong) (NOT CLICKBAIT!!!111!!1 11111!!!!!)
    document.getElementById('apply-voucher').addEventListener('click', function(e) {
        e.preventDefault();

        let voucherCode = document.getElementById('voucher-code').value;

        //just a stand in voucher code for now since ion got time for that hehe :3
        if (voucherCode === '9yearanniverssary') {
            discount = 9.99; // Discount of 10 euros
            alert('Voucher applied!');
        } else {
            discount = 0;
            alert('Invalid voucher code');
        }

        updateTotalPrice(); //UPDATING THA HO'S PRICE CUZ SHE GOTTA AKNOW WHASSUUPP
    });
});