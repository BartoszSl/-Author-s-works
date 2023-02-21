const smallCard = document.querySelectorAll('main .miniInformationCard');
const bigCard = document.querySelector('.bigInformationCard');


smallCard.forEach((card) => {
	card.addEventListener('click', function () {
		card.classList.toggle('bigInformationCard');
	});
});
