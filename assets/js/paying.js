document.addEventListener('DOMContentLoaded', function () {
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
    document.getElementById('code-input').addEventListener('click', function (e) {
        e.preventDefault();

        let voucherCode = document.getElementById('voucher-input').value;

        // just a stand in voucher code for now since ion got time for that hehe :3
        if (voucherCode === '9yearanniverssary') {
            discount = discount + 9.99; // Hehehhe undertale reference
            alert('Voucher applied!');
        } else if (voucherCode === 'bloxybingo20') {
            discount = discount + 2.20;
            alert('Voucher applied!');
        } else if (voucherCode === 'sans') {
            discount = discount + 1;
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

    let selectedSeats = 0; // To keep track of seats selected
    let maxSeats = 0; // counter for the maximum seats

    function updateMaxSeats() {
        let normaalQty = parseInt(document.getElementById('normaal').value);
        let kindQty = parseInt(document.getElementById('kind').value);
        let seniorQty = parseInt(document.getElementById('65').value);

        maxSeats = normaalQty + kindQty + seniorQty;

        // Zou ervoor moeten zorgen dat hoevel stoelen je selecteerd wordt ge update maar werkt voor nu nog niet
        document.querySelectorAll('.seat').forEach(function (seat) {
            seat.addEventListener('click', function () {
                if (selectedSeats < maxSeats || seat.classList.contains('selected')) {
                    seat.classList.toggle('selected');
                    selectedSeats = document.querySelectorAll('.seat.selected').length;
                } else {
                    alert('Je kunt niet meer stoelen selecteren dan het aantal tickets.');
                }
            });
        });
    }

    // the function them h2o's call to update their hgs about the drama
    document.getElementById('normaal').addEventListener('change', updateMaxSeats);
    document.getElementById('kind').addEventListener('change', updateMaxSeats);
    document.getElementById('65').addEventListener('change', updateMaxSeats);


    document.getElementById('checkingOut').addEventListener('click', function (event) {
        event.preventDefault(); // prevent default form submission

        const firstNameElement = document.getElementById('firstName');
        const lastNameElement = document.getElementById('lastName');
        const emailElement = document.getElementById('email');
        const emailConfirmElement = document.getElementById('emailConfirm');

          // console.log voor debuggen n shit, zal later weg gaan.
          console.log("firstNameElement:", firstNameElement);
          console.log("lastNameElement:", lastNameElement);
          console.log("emailElement:", emailElement);
          console.log("emailConfirmElement:", emailConfirmElement);

        // Getting them values
        const firstName = firstNameElement ? firstNameElement.value.trim() : '';
        const lastName = lastNameElement ? lastNameElement.value.trim() : '';
        const email = emailElement ? emailElement.value.trim() : '';
        const emailConfirm = emailConfirmElement ? emailConfirmElement.value.trim() : '';

        const paymentMethods = Array.from(document.querySelectorAll('input[name="paymentMethod"]:checked')).map(input => input.value);
        const termsAccepted = document.getElementById('terms') ? document.getElementById('terms').checked : false;

        if (!firstName || !lastName || !email || !emailConfirm) {
            alert('Niet alle velden zijn ingevuld. Vul deze in om verder te gaan.');
            return;
        }


        if (email !== emailConfirm) {
            alert('E-mailadressen komen niet overeen.');
            return;
        }

        if (!termsAccepted) {
            alert('Je moet akkoord gaan met onze voorwaarden om door te gaan.');
            return;
        }

        if (paymentMethods.length === 0) {
            alert('Selecteer een betalingsmethode.');
            return;
        }

        // this is when we process the data, will probbably have to send an alert n say yo order was made or sum n reload the page idk yet
        console.log('Form data:', {
            firstName,
            lastName,
            email,
            emailConfirm,
            paymentMethods,
            termsAccepted
        });
    });
});