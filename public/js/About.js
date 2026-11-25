
document.addEventListener('DOMContentLoaded', function () {

    const missionCards = document.querySelectorAll('.mission-card');
    missionCards.forEach(function (card) {
        card.addEventListener('click', function () {
            const label = card.querySelector('.mc-label');
            const value = card.querySelector('.mc-value');
            console.log(
                'Mission card clicked:',
                label ? label.textContent.trim() : '',
                '—',
                value ? value.textContent.trim() : ''
            );
        });
    });

    const valueCards = document.querySelectorAll('.value-card');
    valueCards.forEach(function (card) {
        card.addEventListener('click', function () {
            const title = card.querySelector('.value-title');
            console.log('Value card clicked:', title ? title.textContent.trim() : '');
        });
    });

    const teamCards = document.querySelectorAll('.team-card');
    teamCards.forEach(function (card) {
        card.addEventListener('click', function () {
            const name = card.querySelector('.team-name');
            console.log('Team card clicked:', name ? name.textContent.trim() : '');
        });
    });

});