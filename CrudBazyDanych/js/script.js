const smallCard = document.querySelectorAll('main .miniInformationCard');
const bigCard = document.querySelector('.bigInformationCard');
const insertForm = document.querySelector('.insert .insertForm')
const faPen = document.querySelectorAll('#aktualizuj');

smallCard.forEach((card) => {
	card.addEventListener('click', function () {
		card.classList.toggle('bigInformationCard');
	});
});

faPen.forEach((card => {
	card.addEventListener('click', function () {
		insertForm.classList.toggle('updateForm');
	});
}))
