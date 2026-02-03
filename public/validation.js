// Contrôle de saisie complet
class FormValidator {
    constructor() {
        this.init();
    }

    init() {
        this.setupFormValidation();
        this.setupRealTimeValidation();
        this.setupCustomValidations();
    }

    setupFormValidation() {
        const forms = document.querySelectorAll('form.needs-validation');
        
        forms.forEach(form => {
            form.addEventListener('submit', (event) => {
                event.preventDefault();
                event.stopPropagation();
                
                if (form.checkValidity() && this.validateCustom(form)) {
                    // If form is valid, submit it
                    form.submit();
                } else {
                    this.showAllErrors(form);
                    form.classList.add('was-validated');
                }
            }, false);
        });
    }

    setupRealTimeValidation() {
        // Validate on blur
        document.addEventListener('blur', (event) => {
            if (event.target.matches('.form-control, .form-select, input[type="date"]')) {
                this.validateField(event.target);
            }
        }, true);

        // Clear validation on input
        document.addEventListener('input', (event) => {
            if (event.target.matches('.form-control, .form-select')) {
                this.clearFieldError(event.target);
            }
        }, true);
    }

    setupCustomValidations() {
        // Date validation
        const dateInputs = document.querySelectorAll('input[type="date"]');
        dateInputs.forEach(input => {
            input.addEventListener('change', () => this.validateDates());
        });

        // Progress validation
        const progressInput = document.querySelector('input[name*="[progressGoa]"]');
        if (progressInput) {
            progressInput.addEventListener('input', () => this.validateProgress(progressInput));
        }
    }

    validateField(field) {
        const isValid = field.checkValidity();
        const feedbackId = `${field.id}-feedback`;
        let feedback = document.getElementById(feedbackId);
        
        if (!feedback && field.nextElementSibling && field.nextElementSibling.classList.contains('invalid-feedback')) {
            feedback = field.nextElementSibling;
        }
        
        if (!feedback) {
            feedback = document.createElement('div');
            feedback.className = 'invalid-feedback';
            feedback.id = feedbackId;
            field.parentNode.appendChild(feedback);
        }

        if (isValid) {
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
            feedback.style.display = 'none';
        } else {
            field.classList.remove('is-valid');
            field.classList.add('is-invalid');
            feedback.textContent = this.getErrorMessage(field);
            feedback.style.display = 'block';
        }
        
        return isValid;
    }

    getErrorMessage(field) {
        if (field.validity.valueMissing) {
            return 'Ce champ est obligatoire.';
        } else if (field.validity.tooShort) {
            return `Doit contenir au moins ${field.minLength} caractères.`;
        } else if (field.validity.tooLong) {
            return `Ne doit pas dépasser ${field.maxLength} caractères.`;
        } else if (field.validity.rangeUnderflow) {
            return `La valeur minimum est ${field.min}.`;
        } else if (field.validity.rangeOverflow) {
            return `La valeur maximum est ${field.max}.`;
        } else if (field.validity.typeMismatch) {
            if (field.type === 'email') return 'Format d\'email invalide.';
            if (field.type === 'url') return 'Format d\'URL invalide.';
        }
        return 'Valeur invalide.';
    }

    clearFieldError(field) {
        field.classList.remove('is-invalid', 'is-valid');
        const feedback = field.nextElementSibling;
        if (feedback && feedback.classList.contains('invalid-feedback')) {
            feedback.style.display = 'none';
        }
    }

    validateDates() {
        const startDateInput = document.querySelector('input[name*="[dateDebutGoa]"]');
        const endDateInput = document.querySelector('input[name*="[dateFinalGoa]"]');
        let isValid = true;
        
        if (startDateInput && endDateInput && startDateInput.value && endDateInput.value) {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            
            if (startDate > endDate) {
                endDateInput.setCustomValidity('La date de fin doit être après la date de début');
                this.validateField(endDateInput);
                isValid = false;
            } else {
                endDateInput.setCustomValidity('');
                this.validateField(endDateInput);
            }
        }
        
        return isValid;
    }

    validateProgress(input) {
        const value = parseFloat(input.value);
        let isValid = true;
        
        if (input.value && (isNaN(value) || value < 0 || value > 100)) {
            input.setCustomValidity('La progression doit être entre 0 et 100%');
            isValid = false;
        } else {
            input.setCustomValidity('');
        }
        
        this.validateField(input);
        return isValid;
    }

    validateCustom(form) {
        let isValid = true;
        
        // Validate dates
        if (!this.validateDates()) {
            isValid = false;
        }
        
        // Validate progress
        const progressInput = form.querySelector('input[name*="[progressGoa]"]');
        if (progressInput && progressInput.value && !this.validateProgress(progressInput)) {
            isValid = false;
        }
        
        return isValid;
    }

    showAllErrors(form) {
        const invalidFields = form.querySelectorAll('.form-control:invalid, .form-select:invalid');
        invalidFields.forEach(field => {
            this.validateField(field);
        });
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new FormValidator();
    
    // Show server-side errors
    const serverErrors = document.querySelectorAll('.is-invalid');
    serverErrors.forEach(field => {
        const validator = new FormValidator();
        validator.validateField(field);
    });
});