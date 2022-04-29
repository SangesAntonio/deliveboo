const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const accept = confirm(`Sei sicuro di voler cancellare questo prodotto?`);
        if (accept) e.target.submit();
    });
})