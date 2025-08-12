// resource-interceptor.js - Interceptor de recursos para el Front Controller

(function() {
    'use strict';

    // Configuración del interceptor
    const INTERCEPTOR_CONFIG = {
        enabled: true,
        logInterceptions: true,
        redirectToLocal: true,
        blockedDomains: [
            'google.com',
            'googleapis.com',
            'gstatic.com'
        ],
        localReplacements: {
            'https://www.google.com/assets/js/main.js': 'assets/js/main.js',
            'https://www.google.com/assets/js/index.js': 'assets/js/index.js',
            'https://www.google.com/assets/js/contact.js': 'assets/js/contact.js'
        }
    };

    // Función para loggear intercepciones
    function logInterception(originalUrl, newUrl = null) {
        if (!INTERCEPTOR_CONFIG.logInterceptions) return;

        const message = newUrl
            ? `🔄 Interceptado: ${originalUrl} → ${newUrl}`
            : `🚫 Bloqueado: ${originalUrl}`;

        console.log(`[Resource Interceptor] ${message}`);
    }

    // Función para verificar si una URL debe ser interceptada
    function shouldIntercept(url) {
        if (!url) return false;

        // Verificar dominios bloqueados
        for (const domain of INTERCEPTOR_CONFIG.blockedDomains) {
            if (url.includes(domain)) {
                return true;
            }
        }

        return false;
    }

    // Función para obtener la URL de reemplazo
    function getReplacementUrl(originalUrl) {
        // Verificar reemplazos específicos
        if (INTERCEPTOR_CONFIG.localReplacements[originalUrl]) {
            return INTERCEPTOR_CONFIG.localReplacements[originalUrl];
        }

        // Reemplazo genérico para archivos JS
        if (originalUrl.includes('/assets/js/')) {
            const fileName = originalUrl.split('/').pop();
            return `assets/js/${fileName}`;
        }

        // Reemplazo genérico para archivos CSS
        if (originalUrl.includes('/assets/css/')) {
            const fileName = originalUrl.split('/').pop();
            return `assets/css/${fileName}`;
        }

        return null;
    }

    // Interceptar creación de elementos script
    function interceptScriptCreation() {
        const originalCreateElement = document.createElement;

        document.createElement = function(tagName) {
            const element = originalCreateElement.call(document, tagName);

            if (tagName.toLowerCase() === 'script') {
                const originalSetAttribute = element.setAttribute;

                element.setAttribute = function(name, value) {
                    if (name === 'src' && shouldIntercept(value)) {
                        const replacement = getReplacementUrl(value);
                        if (replacement) {
                            logInterception(value, replacement);
                            value = replacement;
                        } else {
                            logInterception(value);
                            return; // No establecer el atributo
                        }
                    }

                    originalSetAttribute.call(this, name, value);
                };

                // Interceptar también la propiedad src
                Object.defineProperty(element, 'src', {
                    set: function(value) {
                        if (shouldIntercept(value)) {
                            const replacement = getReplacementUrl(value);
                            if (replacement) {
                                logInterception(value, replacement);
                                value = replacement;
                            } else {
                                logInterception(value);
                                return; // No establecer la propiedad
                            }
                        }
                        originalSetAttribute.call(this, 'src', value);
                    },
                    get: function() {
                        return this.getAttribute('src');
                    }
                });
            }

            return element;
        };
    }

    // Interceptar creación de elementos link
    function interceptLinkCreation() {
        const originalCreateElement = document.createElement;

        document.createElement = function(tagName) {
            const element = originalCreateElement.call(document, tagName);

            if (tagName.toLowerCase() === 'link') {
                const originalSetAttribute = element.setAttribute;

                element.setAttribute = function(name, value) {
                    if (name === 'href' && shouldIntercept(value)) {
                        const replacement = getReplacementUrl(value);
                        if (replacement) {
                            logInterception(value, replacement);
                            value = replacement;
                        } else {
                            logInterception(value);
                            return; // No establecer el atributo
                        }
                    }

                    originalSetAttribute.call(this, name, value);
                };

                // Interceptar también la propiedad href
                Object.defineProperty(element, 'href', {
                    set: function(value) {
                        if (shouldIntercept(value)) {
                            const replacement = getReplacementUrl(value);
                            if (replacement) {
                                logInterception(value, replacement);
                                value = replacement;
                            } else {
                                logInterception(value);
                                return; // No establecer la propiedad
                            }
                        }
                        originalSetAttribute.call(this, 'href', value);
                    },
                    get: function() {
                        return this.getAttribute('href');
                    }
                });
            }

            return element;
        };
    }

    // Interceptar fetch requests
    function interceptFetch() {
        const originalFetch = window.fetch;

        window.fetch = function(url, options) {
            if (shouldIntercept(url)) {
                const replacement = getReplacementUrl(url);
                if (replacement) {
                    logInterception(url, replacement);
                    url = replacement;
                } else {
                    logInterception(url);
                    // Retornar una respuesta vacía para evitar errores
                    return Promise.resolve(new Response('', { status: 404 }));
                }
            }

            return originalFetch.call(this, url, options);
        };
    }

    // Interceptar XMLHttpRequest
    function interceptXHR() {
        const originalOpen = XMLHttpRequest.prototype.open;

        XMLHttpRequest.prototype.open = function(method, url, ...args) {
            if (shouldIntercept(url)) {
                const replacement = getReplacementUrl(url);
                if (replacement) {
                    logInterception(url, replacement);
                    url = replacement;
                } else {
                    logInterception(url);
                    // No hacer la petición
                    return;
                }
            }

            return originalOpen.call(this, method, url, ...args);
        };
    }

    // Función para verificar recursos existentes
    function checkExistingResources() {
        const resources = [
            'assets/js/main.js',
            'assets/js/index.js',
            'assets/js/contact.js',
            'assets/js/error-handler.js',
            'assets/js/dev-config.js',
            'assets/css/main.css',
            'assets/css/components.css'
        ];

        resources.forEach(resource => {
            fetch(resource)
                .then(response => {
                    if (response.ok) {
                        console.log(`✅ Recurso local disponible: ${resource}`);
                    } else {
                        console.warn(`⚠️ Recurso local no encontrado: ${resource}`);
                    }
                })
                .catch(error => {
                    console.error(`❌ Error al verificar recurso: ${resource}`, error);
                });
        });
    }

    // Función para limpiar referencias problemáticas
    function cleanProblematicReferences() {
        // Buscar y limpiar scripts problemáticos
        const problematicScripts = document.querySelectorAll('script[src*="google.com"]');
        problematicScripts.forEach(script => {
            console.log(`🗑️ Eliminando script problemático: ${script.src}`);
            script.remove();
        });

        // Buscar y limpiar links problemáticos
        const problematicLinks = document.querySelectorAll('link[href*="google.com"]');
        problematicLinks.forEach(link => {
            console.log(`🗑️ Eliminando link problemático: ${link.href}`);
            link.remove();
        });
    }

    // Función para inicializar el interceptor
    function initResourceInterceptor() {
        if (!INTERCEPTOR_CONFIG.enabled) return;

        console.log('🛡️ Inicializando Resource Interceptor...');

        // Interceptar creación de elementos
        interceptScriptCreation();
        interceptLinkCreation();

        // Interceptar peticiones HTTP
        interceptFetch();
        interceptXHR();

        // Limpiar referencias problemáticas existentes
        cleanProblematicReferences();

        // Verificar recursos locales
        setTimeout(checkExistingResources, 1000);

        console.log('✅ Resource Interceptor inicializado');
    }

    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initResourceInterceptor);
    } else {
        initResourceInterceptor();
    }

    // Exponer funciones para uso externo
    window.ResourceInterceptor = {
        shouldIntercept,
        getReplacementUrl,
        checkExistingResources,
        cleanProblematicReferences,
        config: INTERCEPTOR_CONFIG
    };

})(); 