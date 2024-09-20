document.addEventListener('DOMContentLoaded', function () {
    //establishing them prices like im a house renter looking for new victims
    const ticketPrices = {
        normaal: 9.00,
        kind: 5.00,
        '65': 7.00
    };

    let totalPrice = 0;
    let discount = 0;
    let selectedSeatsCount = 0;
    let maxSeats = 0;

    // Functioning society updates the total price <3
    function updateTotalPrice() {
        let normaalQty = parseInt(document.getElementById('normaal').value) || 0;
        let kindQty = document.getElementById('kind') ? parseInt(document.getElementById('kind').value) || 0 : 0;
        let seniorQty = parseInt(document.getElementById('65').value) || 0;

        totalPrice = (normaalQty * ticketPrices.normaal) +
            (kindQty * ticketPrices.kind) +
            (seniorQty * ticketPrices['65']);

        totalPrice -= discount; // DISCCCOOUNTTTTT

        //sets the element with the id 'total-price' as the stuff u give it
        document.getElementById('total-price').textContent = `€${totalPrice.toFixed(2)}`;
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

    // DISCCOOUUUNTTTTT (or not?!?!) (gone wrong) (NOT CLICKBAIT!!!111!!1 11111!!!!!)
    document.getElementById('code-input').addEventListener('click', function (e) {
        e.preventDefault();

        let voucherCode = document.getElementById('voucher-input').value.trim();

        if (voucherCode === '9yearanniverssary') {
            discount += 9.99; // Hehehhe undertale reference
            alert('Voucher gebruikt!');
        } else if (voucherCode === 'bloxybingo20') {
            discount += 2.20;
            alert('Voucher gebruikt!');
        } else if (voucherCode === 'sans') {
            discount += 1;
            alert('Voucher gebruikt!');
        } else {
            discount = 0;
            alert('Ongeldige vouchercode');
        }

        updateTotalPrice(); // UPDATING THA HO'S PRICE CUZ SHE GOTTA AKNOW WHASSUUPP
    });

    // Update date and time display
    function updateDateTimeDisplay() {
        let selectedDate = document.getElementById('date').value;
        let selectedTime = document.getElementById('time').value;

        document.getElementById('selected-date').textContent = selectedDate;
        document.getElementById('selected-time').textContent = selectedTime;
    }

    // Event listeners for date and time changes
    document.getElementById('date').addEventListener('change', updateDateTimeDisplay);
    document.getElementById('time').addEventListener('change', updateDateTimeDisplay);

    function updateMaxSeats() {
        let normaalQty = parseInt(document.getElementById('normaal').value) || 0;
        let kindQty = document.getElementById('kind') ? parseInt(document.getElementById('kind').value) || 0 : 0;
        let seniorQty = parseInt(document.getElementById('65').value) || 0;

        maxSeats = normaalQty + kindQty + seniorQty;
        renderSeatMap();
    }

    document.getElementById('normaal').addEventListener('change', function() {
        updateMaxSeats();
        updateTotalPrice();
    });
    if (document.getElementById('kind')) {
        document.getElementById('kind').addEventListener('change', function() {
            updateMaxSeats();
            updateTotalPrice();
        });
    }
    document.getElementById('65').addEventListener('change', function() {
        updateMaxSeats();
        updateTotalPrice();
    });

    const rows = 11;
    const cols = 10;
    const seatMap = [];
    const seatMapContainer = document.getElementById('seat-map');

    for (let i = 0; i < rows; i++) {
        const row = [];
        for (let j = 0; j < cols; j++) {
            row.push({ reserved: false, selected: false });
        }
        seatMap.push(row);
    }

    function renderSeatMap() {
        seatMapContainer.innerHTML = '';
        seatMapContainer.style.gridTemplateColumns = `repeat(${cols}, 1fr)`;

        seatMap.forEach((row, rowIndex) => {
            row.forEach((seat, colIndex) => {
                const seatElement = document.createElement('div');
                seatElement.classList.add('seat');
                seatElement.dataset.row = rowIndex;
                seatElement.dataset.col = colIndex;

                if (seat.reserved) {
                    seatElement.classList.add('reserved');
                }
                if (seat.selected) {
                    seatElement.classList.add('selected');
                }

                if (!seat.reserved) {
                    seatElement.addEventListener('click', () => toggleSeatSelection(rowIndex, colIndex));
                }

                seatMapContainer.appendChild(seatElement);
            });
        });

        updateSelectedSeatsDisplay();
    }

    function updateSelectedSeatsDisplay() {
        const selectedSeats = getSelectedSeats();
        const rowsDisplay = selectedSeats.map(seat => seat.row + 1).join(', ') || '-';
        const colsDisplay = selectedSeats.map(seat => seat.col + 1).join(', ') || '-';

        document.getElementById('selected-seats-rows').textContent = `Rij ${rowsDisplay}`;
        document.getElementById('selected-seats-columns').textContent = `stoel ${colsDisplay}`;
    }

    function toggleSeatSelection(row, col) {
        const seat = seatMap[row][col];
        if (seat.reserved) return;

        if (seat.selected) {
            seat.selected = false;
            selectedSeatsCount--;
        } else if (selectedSeatsCount < maxSeats) {
            seat.selected = true;
            selectedSeatsCount++;
        } else {
            alert('Je kunt niet meer stoelen selecteren dan het aantal tickets.');
            return;
        }
        renderSeatMap();
    }

    function getSelectedSeats() {
        const selectedSeats = [];
        seatMap.forEach((row, rowIndex) => {
            row.forEach((seat, colIndex) => {
                if (seat.selected) {
                    selectedSeats.push({ row: rowIndex, col: colIndex });
                }
            });
        });
        return selectedSeats;
    }

    document.getElementById('checkingOut').addEventListener('click', function (event) {
        event.preventDefault();

        const firstName = document.getElementById('firstName') ? document.getElementById('firstName').value.trim() : '';
        const lastName = document.getElementById('lastName') ? document.getElementById('lastName').value.trim() : '';
        const email = document.getElementById('email') ? document.getElementById('email').value.trim() : '';
        const emailConfirm = document.getElementById('emailConfirm') ? document.getElementById('emailConfirm').value.trim() : '';

        const movieTitle = document.querySelector('.overview-text h2.gray') ? document.querySelector('.overview-text h2.gray').textContent.trim() : '';
        const selectedDate = document.getElementById('selected-date') ? document.getElementById('selected-date').textContent.trim() : '';
        const selectedTime = document.getElementById('selected-time') ? document.getElementById('selected-time').textContent.trim() : '';
        const selectedSeatsRows = document.getElementById('selected-seats-rows') ? document.getElementById('selected-seats-rows').textContent.trim() : '';
        const selectedSeatsColumns = document.getElementById('selected-seats-columns') ? document.getElementById('selected-seats-columns').textContent.trim() : '';
        const ticketSummary = document.getElementById('order-summary-1') ? document.getElementById('order-summary-1').textContent.trim() : '';
        const totalPrice = document.getElementById('total-price') ? document.getElementById('total-price').textContent.trim() : '';

        const paymentMethods = Array.from(document.querySelectorAll('input[name="paymentMethod"]:checked')).map(input => input.value);
        const termsAccepted = document.getElementById('terms') ? document.getElementById('terms').checked : false;

        console.log('Form values:', {
            firstName,
            lastName,
            email,
            emailConfirm,
            movieTitle,
            selectedDate,
            selectedTime,
            selectedSeatsRows,
            selectedSeatsColumns,
            ticketSummary,
            totalPrice,
            paymentMethods,
            termsAccepted
        });

        if (!firstName || !lastName || !email || !emailConfirm || !movieTitle ||
            selectedDate === '-' || selectedTime === '-' || selectedSeatsRows === 'Rij -' || selectedSeatsColumns === 'stoel -' ||
            ticketSummary === 'Geen tickets geselecteerd' || totalPrice === '€0,00') {
            alert('Niet alle velden zijn ingevuld. Vul deze in om verder te gaan.');
            return;
        } else if (email !== emailConfirm) {
            alert('E-mailadressen komen niet overeen.');
            return;
        } else if (paymentMethods.length === 0) {
            alert('Selecteer een betalingsmethode.');
            return;
        } else if (!termsAccepted) {
            alert('Je moet akkoord gaan met onze voorwaarden om door te gaan.');
            return;
        }

        const selectedSeats = getSelectedSeats();
        if (selectedSeats.length > 0) {
            selectedSeats.forEach(seat => {
                seatMap[seat.row][seat.col].reserved = true;

                console.log(seatMap[seat.row][seat.col].reserved);
            });
            renderSeatMap();
        }

        alert('Bestelling bevestigd! Bedankt voor je aankoop.');
        // window.location.reload();
    });
    renderSeatMap();
});