// main.js - Archivo JavaScript principal
// Este archivo se crea para evitar errores 404 en el navegador

console.log('Front Controller - Sistema de Layouts cargado correctamente');

// Función para inicializar el sistema
function initFrontController() {
    console.log('Inicializando Front Controller...');
    
    // Agregar clases activas a la navegación
    const currentRoute = new URLSearchParams(window.location.search).get('route') || 'home';
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href && href.includes('route=' + currentRoute)) {
            link.classList.add('active');
        }
    });
    
    // Inicializar tooltips de Bootstrap si están disponibles
    if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
    
    // Inicializar popovers de Bootstrap si están disponibles
    if (typeof bootstrap !== 'undefined' && bootstrap.Popover) {
        const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    }
}

// Ejecutar cuando el DOM esté listo
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initFrontController);
} else {
    initFrontController();
}

// Exportar para uso como módulo (si es necesario)
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { initFrontController };
} 