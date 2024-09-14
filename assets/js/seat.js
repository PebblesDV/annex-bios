// script.js
const rows = 10;
const cols = 8;
const seatMap = []; // 2D array to represent the seating layout
const seatMapContainer = document.getElementById('seat-map');

// Initialize seat map (0 = available, 1 = reserved)
for (let i = 0; i < rows; i++) {
    const row = [];
    for (let j = 0; j < cols; j++) {
        row.push({ reserved: false, selected: false });
    }
    seatMap.push(row);
}

// Render the seat map
function renderSeatMap() {
    seatMapContainer.innerHTML = ''; // Clear existing seat map
    seatMapContainer.style.gridTemplateColumns = `repeat(${rows}, 1fr)`
    seatMap.forEach((row, rowIndex) => {
        row.forEach((seat, colIndex) => {
            const seatElement = document.createElement('div');
            seatElement.classList.add('seat');
            seatElement.dataset.row = rowIndex;
            seatElement.dataset.col = colIndex;

            // Add class based on seat state
            if (seat.reserved) {
                seatElement.classList.add('reserved');
            } else if (seat.selected) {
                seatElement.classList.add('selected');
            }

            // Add click event listener if seat is not reserved
            if (!seat.reserved) {
                seatElement.addEventListener('click', () => toggleSeatSelection(rowIndex, colIndex));
            }

            seatMapContainer.appendChild(seatElement);
        });
    });
}

// Toggle seat selection
function toggleSeatSelection(row, col) {
    const seat = seatMap[row][col];
    seat.selected = !seat.selected; // Toggle selection state
    renderSeatMap();
}

// Get a list of selected seats
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
