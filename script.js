let chosenLocation = '';

function nextPage(pageId) {
    const currentCard = document.querySelector('.card.show');
    currentCard.classList.remove('show');
    setTimeout(() => {
        currentCard.style.display = 'none';
        document.getElementById(pageId).style.display = 'block';
        document.getElementById(pageId).classList.add('show');
    }, 300);
}

function showPage(pageId) {
    const currentCard = document.querySelector('.card.show');
    currentCard.classList.remove('show');
    setTimeout(() => {
        currentCard.style.display = 'none';
        document.getElementById(pageId).style.display = 'block';
        document.getElementById(pageId).classList.add('show');
    }, 300);
}

function showFinalPage() {
    nextPage('page5');
}

function moveNoButton() {
    const button = document.getElementById('noButton');
    button.style.top = Math.random() * 300 + 'px';
    button.style.left = Math.random() * 300 + 'px';
}

function chooseLocation(location) {
    chosenLocation = location;
    document.getElementById('selectedLocation').textContent = `You chose ${location}. Now, tell us your name, date, and time for the date!`;
    nextPage('page7');
}

const submitButton = document.getElementById('submitButton');
const nameInput = document.getElementById('nameInput');
const dateInput = document.getElementById('dateInput');
const timeInput = document.getElementById('timeInput');

[nameInput, dateInput, timeInput].forEach(input => {
    input.addEventListener('input', () => {
        if (nameInput.value && dateInput.value && timeInput.value) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    });
});

function submitDateDetails() {
    const name = nameInput.value;
    const date = dateInput.value;
    const time = timeInput.value;

    const finalMessage = `Yay! ${name}, we're going to ${chosenLocation} on ${date} at ${time}. Can't wait! ❤️`;
    document.getElementById('romanticCaption').textContent = finalMessage;
    
    nextPage('page8');
}

	function chooseLocation(location) {
    document.getElementById("locationInput").value = location;
    showPage('page7'); // Move to the next page after selecting location
}

