const rows = 10;
const cols = 8;
const seatMap = []; // 2D array for seat layout
const seatMapContainer = document.getElementById('seat-map');

// setting up tha seat map :3
for (let i = 0; i < rows; i++) {
    const row = [];
    for (let j = 0; j < cols; j++) {
        row.push({ reserved: false, selected: false });
    }
    seatMap.push(row);
}

// the function for the seating n stuff
function renderSeatMap() {
    seatMapContainer.innerHTML = ''; // clearing the existing map
    seatMapContainer.style.gridTemplateColumns = `repeat(${rows}, 1fr)`
    seatMap.forEach((row, rowIndex) => {
        row.forEach((seat, colIndex) => {
            const seatElement = document.createElement('div');
            seatElement.classList.add('seat');
            seatElement.dataset.row = rowIndex;
            seatElement.dataset.col = colIndex;

            // Add class to seats
            if (seat.reserved) {
                seatElement.classList.add('reserved');
            } else if (seat.selected) {
                seatElement.classList.add('selected');
            }

            if (!seat.reserved) {
                seatElement.addEventListener('click', () => toggleSeatSelection(rowIndex, colIndex));
            }

            seatMapContainer.appendChild(seatElement);
        });
    });

    // Haalt de seeeaattss YASSS en laat de rows n columns zien yk how it isss
    const selectedSeats = getSelectedSeats();
    const rowsDisplay = selectedSeats.map(seat => seat.row + 1).join(', ') || '-'; // de - is wat ie doet als er niks geselecteerd is.
    const colsDisplay = selectedSeats.map(seat => seat.col + 1).join(', ') || '-';

    document.getElementById('selected-seats-rows').textContent = `Rij ${rowsDisplay}`;
    document.getElementById('selected-seats-columns').textContent = `stoel ${colsDisplay}`;
}

// Toggle voor de stoel selecctie
function toggleSeatSelection(row, col) {
    const seat = seatMap[row][col];
    seat.selected = !seat.selected; // de toggle
    renderSeatMap();
    console.log(seatMap);
}

// Get a list of the seats
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

renderSeatMap();

// laat de geselecteerde stoelen zien in de console
console.log(seatMap);
