// contact.js - Validación del formulario de contacto

document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');

    if (contactForm) {
        // Validación del formulario
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            if (validateForm()) {
                // Mostrar mensaje de éxito
                showMessage('¡Gracias por tu mensaje! Te contactaremos pronto.', 'success');

                // Limpiar el formulario
                contactForm.reset();

                // Remover clases de validación
                clearValidationErrors();
            } else {
                showMessage('Por favor, completa todos los campos requeridos correctamente.', 'error');
            }
        });

        // Remover clases de validación al escribir
        contactForm.querySelectorAll('input, textarea, select').forEach(field => {
            field.addEventListener('input', function() {
                this.classList.remove('is-invalid');
                const feedback = this.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.remove();
                }
            });
        });

        // Validación en tiempo real para email
        const emailField = contactForm.querySelector('#email');
        if (emailField) {
            emailField.addEventListener('blur', function() {
                if (this.value && !isValidEmail(this.value)) {
                    this.classList.add('is-invalid');
                    showFieldError(this, 'Por favor, ingresa un email válido.');
                }
            });
        }
    }

    // Función para validar el formulario
    function validateForm() {
        let isValid = true;
        const requiredFields = contactForm.querySelectorAll('[required]');

        // Limpiar errores previos
        clearValidationErrors();

        // Validar campos requeridos
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid');
                showFieldError(field, 'Este campo es requerido.');
            }
        });

        // Validar email
        const emailField = contactForm.querySelector('#email');
        if (emailField && emailField.value && !isValidEmail(emailField.value)) {
            isValid = false;
            emailField.classList.add('is-invalid');
            showFieldError(emailField, 'Por favor, ingresa un email válido.');
        }

        // Validar teléfono (opcional pero si se ingresa debe ser válido)
        const phoneField = contactForm.querySelector('#phone');
        if (phoneField && phoneField.value && !isValidPhone(phoneField.value)) {
            isValid = false;
            phoneField.classList.add('is-invalid');
            showFieldError(phoneField, 'Por favor, ingresa un teléfono válido.');
        }

        return isValid;
    }

    // Función para validar email
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Función para validar teléfono
    function isValidPhone(phone) {
        const phoneRegex = /^[\+]?[0-9\s\-\(\)]{7,}$/;
        return phoneRegex.test(phone);
    }

    // Función para mostrar error en campo específico
    function showFieldError(field, message) {
        const feedback = document.createElement('div');
        feedback.className = 'invalid-feedback';
        feedback.textContent = message;

        const parent = field.parentNode;
        parent.appendChild(feedback);
    }

    // Función para limpiar errores de validación
    function clearValidationErrors() {
        contactForm.querySelectorAll('.is-invalid').forEach(field => {
            field.classList.remove('is-invalid');
        });

        contactForm.querySelectorAll('.invalid-feedback').forEach(feedback => {
            feedback.remove();
        });
    }

    // Función para mostrar mensajes
    function showMessage(message, type) {
        // Remover mensajes previos
        const existingMessages = document.querySelectorAll('.alert');
        existingMessages.forEach(msg => msg.remove());

        // Crear elemento de mensaje
        const messageDiv = document.createElement('div');
        messageDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
        messageDiv.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        // Insertar antes del formulario
        const formContainer = contactForm.closest('.card-body');
        formContainer.insertBefore(messageDiv, contactForm);

        // Auto-remover después de 5 segundos
        setTimeout(() => {
            if (messageDiv.parentNode) {
                messageDiv.remove();
            }
        }, 5000);
    }

    // Función para animar el envío del formulario
    function animateSubmit() {
        const submitBtn = contactForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
        submitBtn.disabled = true;

        // Simular envío (en un caso real, aquí iría la llamada AJAX)
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 2000);
    }

    // Agregar animación al botón de envío
    const submitBtn = contactForm.querySelector('button[type="submit"]');
    if (submitBtn) {
        submitBtn.addEventListener('click', function() {
            if (validateForm()) {
                animateSubmit();
            }
        });
    }
});

// Exportar para uso como módulo (si es necesario)
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { validateForm, isValidEmail, isValidPhone };
} 