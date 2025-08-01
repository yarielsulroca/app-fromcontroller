// index.js - Archivo JavaScript de índice
// Este archivo se crea para evitar errores 404 en el navegador

console.log('Front Controller - Index JS cargado correctamente');

// Función para manejar formularios
function handleForms() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            // Validación básica de formularios
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Por favor, completa todos los campos requeridos.');
            }
        });
    });
}

// Función para manejar enlaces de navegación
function handleNavigation() {
    const navLinks = document.querySelectorAll('a[href*="route="]');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Agregar indicador de carga
            const originalText = this.textContent;
            this.textContent = 'Cargando...';
            this.disabled = true;
            
            // Restaurar después de un breve delay
            setTimeout(() => {
                this.textContent = originalText;
                this.disabled = false;
            }, 1000);
        });
    });
}

// Función para animaciones de scroll
function handleScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
            }
        });
    }, observerOptions);
    
    // Observar elementos con clase 'animate-on-scroll'
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
}

// Inicializar todas las funciones
function initIndexJS() {
    console.log('Inicializando funcionalidades de index.js...');
    handleForms();
    handleNavigation();
    handleScrollAnimations();
}

// Ejecutar cuando el DOM esté listo
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initIndexJS);
} else {
    initIndexJS();
}

// Exportar para uso como módulo (si es necesario)
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { 
        handleForms, 
        handleNavigation, 
        handleScrollAnimations,
        initIndexJS 
    };
} 