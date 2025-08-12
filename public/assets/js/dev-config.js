// dev-config.js - Configuración para desarrollo

(function() {
    'use strict';

    // Configuración de desarrollo
    const DEV_CONFIG = {
        debugMode: true,
        logLevel: 'info', // 'error', 'warn', 'info', 'debug'
        ignoreExtensionErrors: true,
        showPerformanceMetrics: false,
        enableErrorReporting: true
    };

    // Función para loggear mensajes de desarrollo
    function devLog(message, level = 'info') {
        if (!DEV_CONFIG.debugMode) return;

        const levels = ['error', 'warn', 'info', 'debug'];
        const currentLevel = levels.indexOf(DEV_CONFIG.logLevel);
        const messageLevel = levels.indexOf(level);

        if (messageLevel <= currentLevel) {
            const timestamp = new Date().toLocaleTimeString();
            const prefix = `[DEV ${level.toUpperCase()}]`;

            switch (level) {
                case 'error':
                    console.error(`${prefix} ${timestamp}: ${message}`);
                    break;
                case 'warn':
                    console.warn(`${prefix} ${timestamp}: ${message}`);
                    break;
                case 'debug':
                    console.debug(`${prefix} ${timestamp}: ${message}`);
                    break;
                default:
                    console.log(`${prefix} ${timestamp}: ${message}`);
            }
        }
    }

    // Función para verificar el entorno
    function checkEnvironment() {
        const isLocalhost = window.location.hostname === 'localhost' ||
            window.location.hostname === '127.0.0.1' ||
            window.location.hostname.includes('test');

        const isDevelopment = isLocalhost || window.location.hostname.includes('dev');

        devLog(`Entorno detectado: ${isDevelopment ? 'Desarrollo' : 'Producción'}`, 'info');
        devLog(`Hostname: ${window.location.hostname}`, 'debug');
        devLog(`URL: ${window.location.href}`, 'debug');

        return {
            isDevelopment,
            isLocalhost,
            hostname: window.location.hostname,
            protocol: window.location.protocol
        };
    }

    // Función para verificar extensiones del navegador
    function checkBrowserExtensions() {
        const extensions = [];

        // Detectar extensiones comunes que pueden causar errores
        if (window.chrome && window.chrome.runtime) {
            extensions.push('Chrome Extension API');
        }

        if (window.browser && window.browser.runtime) {
            extensions.push('Firefox Extension API');
        }

        // Verificar si hay scripts de extensiones
        const extensionScripts = document.querySelectorAll('script[src*="chrome-extension"], script[src*="moz-extension"]');
        if (extensionScripts.length > 0) {
            extensions.push(`${extensionScripts.length} scripts de extensiones detectados`);
        }

        if (extensions.length > 0) {
            devLog(`Extensiones detectadas: ${extensions.join(', ')}`, 'warn');
        } else {
            devLog('No se detectaron extensiones del navegador', 'info');
        }

        return extensions;
    }

    // Función para verificar recursos externos
    function checkExternalResources() {
        const externalResources = [];

        // Verificar scripts externos
        const scripts = document.querySelectorAll('script[src]');
        scripts.forEach(script => {
            const src = script.src;
            if (src.includes('google.com') || src.includes('googleapis.com')) {
                externalResources.push(`Script de Google: ${src}`);
            }
        });

        // Verificar CSS externos
        const stylesheets = document.querySelectorAll('link[rel="stylesheet"]');
        stylesheets.forEach(link => {
            const href = link.href;
            if (href.includes('google.com') || href.includes('googleapis.com')) {
                externalResources.push(`CSS de Google: ${href}`);
            }
        });

        if (externalResources.length > 0) {
            devLog(`Recursos externos detectados: ${externalResources.length}`, 'info');
            externalResources.forEach(resource => {
                devLog(`  - ${resource}`, 'debug');
            });
        }

        return externalResources;
    }

    // Función para verificar performance
    function checkPerformance() {
        if (!DEV_CONFIG.showPerformanceMetrics) return;

        if (window.performance && window.performance.timing) {
            const timing = window.performance.timing;
            const loadTime = timing.loadEventEnd - timing.navigationStart;

            devLog(`Tiempo de carga: ${loadTime}ms`, 'info');

            if (loadTime > 3000) {
                devLog('⚠️ Tiempo de carga lento detectado', 'warn');
            }
        }
    }

    // Función para configurar CSP en desarrollo
    function configureCSP() {
        const env = checkEnvironment();

        if (env.isDevelopment) {
            devLog('Configurando CSP para desarrollo', 'info');

            // En desarrollo, podemos ser más permisivos
            const meta = document.createElement('meta');
            meta.httpEquiv = 'Content-Security-Policy';
            meta.content = "default-src 'self' 'unsafe-inline' 'unsafe-eval' https: http: data:; script-src 'self' 'unsafe-inline' 'unsafe-eval' https: http:; style-src 'self' 'unsafe-inline' https: http:; img-src 'self' data: https: http:;";

            // Solo agregar si no existe ya
            if (!document.querySelector('meta[http-equiv="Content-Security-Policy"]')) {
                document.head.appendChild(meta);
                devLog('CSP configurado para desarrollo', 'info');
            }
        }
    }

    // Función para limpiar errores de extensiones
    function cleanExtensionErrors() {
        if (!DEV_CONFIG.ignoreExtensionErrors) return;

        // Interceptar errores de extensiones
        const originalError = console.error;
        console.error = function(...args) {
            const errorMessage = args.join(' ');

            // Ignorar errores comunes de extensiones
            const extensionErrors = [
                'runtime.lastError',
                'Could not establish connection',
                'Receiving end does not exist',
                'platform is not supported'
            ];

            const shouldIgnore = extensionErrors.some(error =>
                errorMessage.includes(error)
            );

            if (shouldIgnore) {
                devLog(`Error de extensión ignorado: ${errorMessage}`, 'debug');
                return;
            }

            // Llamar al console.error original
            originalError.apply(console, args);
        };
    }

    // Función para generar reporte de diagnóstico
    function generateDiagnosticReport() {
        const report = {
            timestamp: new Date().toISOString(),
            environment: checkEnvironment(),
            extensions: checkBrowserExtensions(),
            externalResources: checkExternalResources(),
            userAgent: navigator.userAgent,
            url: window.location.href,
            viewport: {
                width: window.innerWidth,
                height: window.innerHeight
            },
            localStorage: typeof localStorage !== 'undefined',
            sessionStorage: typeof sessionStorage !== 'undefined',
            cookies: navigator.cookieEnabled
        };

        devLog('Reporte de diagnóstico generado', 'info');
        console.table(report);

        return report;
    }

    // Función para inicializar la configuración de desarrollo
    function initDevConfig() {
        devLog('Inicializando configuración de desarrollo', 'info');

        // Configurar CSP
        configureCSP();

        // Limpiar errores de extensiones
        cleanExtensionErrors();

        // Verificar entorno
        const env = checkEnvironment();

        // Verificar extensiones
        checkBrowserExtensions();

        // Verificar recursos externos
        checkExternalResources();

        // Verificar performance
        checkPerformance();

        // Generar reporte inicial
        if (env.isDevelopment) {
            setTimeout(() => {
                generateDiagnosticReport();
            }, 2000);
        }

        devLog('Configuración de desarrollo completada', 'info');
    }

    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDevConfig);
    } else {
        initDevConfig();
    }

    // Exponer funciones para uso externo
    window.DevConfig = {
        checkEnvironment,
        checkBrowserExtensions,
        checkExternalResources,
        generateDiagnosticReport,
        devLog,
        config: DEV_CONFIG
    };

})(); 