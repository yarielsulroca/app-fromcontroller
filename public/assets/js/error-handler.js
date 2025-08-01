// error-handler.js - Manejador de errores para el Front Controller

(function() {
    'use strict';
    
    // Configuración de errores
    const ERROR_CONFIG = {
        ignorePatterns: [
            /runtime\.lastError/,
            /Could not establish connection/,
            /Receiving end does not exist/,
            /platform is not supported/,
            /google\.com.*404/,
            /preload\.js/
        ],
        logErrors: true,
        showUserFriendlyErrors: false
    };
    
    // Errores ignorados (no críticos)
    const IGNORED_ERRORS = [
        'runtime.lastError: Could not establish connection. Receiving end does not exist.',
        'platform is not supported',
        'GET https://www.google.com/assets/js/main.js net::ERR_ABORTED 404 (Not Found)',
        'GET https://www.google.com/assets/js/index.js net::ERR_ABORTED 404 (Not Found)'
    ];
    
    // Función para verificar si un error debe ser ignorado
    function shouldIgnoreError(error) {
        const errorString = error.toString();
        
        // Verificar patrones ignorados
        for (const pattern of ERROR_CONFIG.ignorePatterns) {
            if (pattern.test(errorString)) {
                return true;
            }
        }
        
        // Verificar errores específicos
        for (const ignoredError of IGNORED_ERRORS) {
            if (errorString.includes(ignoredError)) {
                return true;
            }
        }
        
        return false;
    }
    
    // Función para formatear errores
    function formatError(error) {
        return {
            message: error.message || error.toString(),
            filename: error.filename || error.sourceURL || 'unknown',
            lineno: error.lineno || error.lineNumber || 0,
            colno: error.colno || error.columnNumber || 0,
            stack: error.stack || '',
            timestamp: new Date().toISOString(),
            url: window.location.href,
            userAgent: navigator.userAgent
        };
    }
    
    // Función para loggear errores
    function logError(errorData) {
        if (!ERROR_CONFIG.logErrors) return;
        
        console.group('🚨 Error Detectado');
        console.error('Mensaje:', errorData.message);
        console.error('Archivo:', errorData.filename);
        console.error('Línea:', errorData.lineno);
        console.error('Columna:', errorData.colno);
        console.error('URL:', errorData.url);
        console.error('Timestamp:', errorData.timestamp);
        console.groupEnd();
        
        // En un entorno de producción, aquí enviarías el error a un servicio de logging
        // sendErrorToLoggingService(errorData);
    }
    
    // Función para mostrar errores amigables al usuario
    function showUserFriendlyError(errorData) {
        if (!ERROR_CONFIG.showUserFriendlyErrors) return;
        
        // Crear notificación de error
        const notification = document.createElement('div');
        notification.className = 'error-notification';
        notification.innerHTML = `
            <div class="error-notification-content">
                <i class="fas fa-exclamation-triangle"></i>
                <span>Ha ocurrido un error. Por favor, recarga la página.</span>
                <button onclick="this.parentElement.parentElement.remove()">×</button>
            </div>
        `;
        
        // Agregar estilos si no existen
        if (!document.getElementById('error-notification-styles')) {
            const styles = document.createElement('style');
            styles.id = 'error-notification-styles';
            styles.textContent = `
                .error-notification {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: #dc3545;
                    color: white;
                    padding: 15px;
                    border-radius: 5px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    z-index: 9999;
                    max-width: 300px;
                }
                .error-notification-content {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                }
                .error-notification button {
                    background: none;
                    border: none;
                    color: white;
                    font-size: 18px;
                    cursor: pointer;
                    margin-left: auto;
                }
            `;
            document.head.appendChild(styles);
        }
        
        document.body.appendChild(notification);
        
        // Auto-remover después de 10 segundos
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 10000);
    }
    
    // Manejador de errores globales
    function handleGlobalError(event) {
        const error = event.error || event;
        
        // Verificar si el error debe ser ignorado
        if (shouldIgnoreError(error)) {
            return;
        }
        
        const errorData = formatError(error);
        logError(errorData);
        showUserFriendlyError(errorData);
    }
    
    // Manejador de errores de recursos
    function handleResourceError(event) {
        const target = event.target;
        
        // Solo manejar errores de scripts, imágenes y CSS
        if (!['SCRIPT', 'IMG', 'LINK'].includes(target.tagName)) {
            return;
        }
        
        const resourceUrl = target.src || target.href;
        
        // Verificar si es un error de Google.com (común y no crítico)
        if (resourceUrl && resourceUrl.includes('google.com')) {
            return;
        }
        
        const errorData = {
            message: `Error al cargar recurso: ${resourceUrl}`,
            filename: resourceUrl,
            lineno: 0,
            colno: 0,
            stack: '',
            timestamp: new Date().toISOString(),
            url: window.location.href,
            userAgent: navigator.userAgent,
            resourceType: target.tagName.toLowerCase()
        };
        
        logError(errorData);
    }
    
    // Manejador de errores de promesas
    function handlePromiseError(event) {
        const error = event.reason;
        
        if (shouldIgnoreError(error)) {
            return;
        }
        
        const errorData = formatError(error);
        errorData.type = 'promise';
        logError(errorData);
        showUserFriendlyError(errorData);
    }
    
    // Función para interceptar console.error
    function interceptConsoleError() {
        const originalError = console.error;
        
        console.error = function(...args) {
            const errorMessage = args.join(' ');
            
            // Verificar si es un error que debe ser ignorado
            if (shouldIgnoreError(errorMessage)) {
                return;
            }
            
            // Llamar al console.error original
            originalError.apply(console, args);
            
            // Loggear el error
            const errorData = {
                message: errorMessage,
                filename: 'console',
                lineno: 0,
                colno: 0,
                stack: '',
                timestamp: new Date().toISOString(),
                url: window.location.href,
                userAgent: navigator.userAgent,
                type: 'console'
            };
            
            logError(errorData);
        };
    }
    
    // Función para verificar la salud del sistema
    function checkSystemHealth() {
        const health = {
            timestamp: new Date().toISOString(),
            url: window.location.href,
            userAgent: navigator.userAgent,
            errors: [],
            warnings: []
        };
        
        // Verificar si hay scripts de Google cargándose incorrectamente
        const googleScripts = document.querySelectorAll('script[src*="google.com"]');
        if (googleScripts.length > 0) {
            health.warnings.push(`Se detectaron ${googleScripts.length} scripts de Google que pueden causar errores`);
        }
        
        // Verificar si hay event handlers inline
        const inlineHandlers = document.querySelectorAll('[onclick], [onload], [onchange], [onsubmit]');
        if (inlineHandlers.length > 0) {
            health.warnings.push(`Se detectaron ${inlineHandlers.length} event handlers inline`);
        }
        
        // Verificar si jQuery está disponible pero no debería
        if (typeof $ !== 'undefined') {
            health.warnings.push('jQuery está disponible pero no debería estar cargado');
        }
        
        return health;
    }
    
    // Función para limpiar errores de la consola
    function clearConsoleErrors() {
        console.clear();
        console.log('🧹 Consola limpiada por el manejador de errores');
    }
    
    // Inicializar el manejador de errores
    function initErrorHandler() {
        // Interceptar errores globales
        window.addEventListener('error', handleGlobalError);
        
        // Interceptar errores de recursos
        window.addEventListener('error', handleResourceError, true);
        
        // Interceptar errores de promesas
        window.addEventListener('unhandledrejection', handlePromiseError);
        
        // Interceptar console.error
        interceptConsoleError();
        
        // Verificar salud del sistema al cargar
        setTimeout(() => {
            const health = checkSystemHealth();
            if (health.warnings.length > 0) {
                console.warn('⚠️ Advertencias del sistema:', health.warnings);
            }
        }, 1000);
        
        console.log('✅ Manejador de errores inicializado');
    }
    
    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initErrorHandler);
    } else {
        initErrorHandler();
    }
    
    // Exponer funciones para uso externo
    window.ErrorHandler = {
        checkSystemHealth,
        clearConsoleErrors,
        shouldIgnoreError,
        formatError,
        logError
    };
    
})(); 