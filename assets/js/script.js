// Fonction pour valider un formulaire
function validateForm(formId) {
    const form = document.getElementById(formId);
    form.addEventListener('submit', function(event) {
        let isValid = true;
        const inputs = form.querySelectorAll('[required]');
        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });
        if (!isValid) {
            event.preventDefault();
            alert('Veuillez remplir tous les champs obligatoires.');
        }
    });
}

// Fonction pour confirmer la suppression
function confirmDeletion(event, message = 'Êtes-vous sûr ?') {
    if (!confirm(message)) {
        event.preventDefault();
    }
}

// Initialisation des écouteurs d'événements
document.addEventListener('DOMContentLoaded', function() {
    // Validation des formulaires
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        validateForm(form.id);
    });

    // Confirmation de suppression
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            confirmDeletion(event);
        });
    });
});
