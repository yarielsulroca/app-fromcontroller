# 🔧 Guía de Solución de Problemas - Front Controller

## 🚨 Errores Comunes y Soluciones

### 1. **Errores de Extensiones del Navegador**

#### Problema:
```
runtime.lastError: Could not establish connection. Receiving end does not exist.
platform is not supported
```

#### Causa:
Estos errores provienen de extensiones del navegador (Chrome, Firefox) que intentan comunicarse con el contenido de la página.

#### Solución:
- ✅ **Automática:** El sistema ya filtra estos errores automáticamente
- ✅ **No afectan la funcionalidad:** Son errores de extensiones, no de tu aplicación
- ✅ **Puedes ignorarlos:** No requieren acción del desarrollador

---

### 2. **Errores CSP (Content Security Policy)**

#### Problema:
```
Refused to execute inline event handler because it violates the following Content Security Policy directive
Refused to load the image 'data:image/svg+xml...' because it violates the following Content Security Policy directive
```

#### Causa:
El navegador bloquea scripts inline o recursos que violan las políticas de seguridad.

#### Solución:
- ✅ **CSP Configurado:** El sistema incluye CSP permisivo para desarrollo
- ✅ **Archivos Externos:** Todo JavaScript está en archivos externos
- ✅ **Headers del Servidor:** `.htaccess` configura CSP automáticamente

---

### 3. **Errores 404 de Google.com**

#### Problema:
```
GET https://www.google.com/assets/js/main.js net::ERR_ABORTED 404 (Not Found)
GET https://www.google.com/assets/js/index.js net::ERR_ABORTED 404 (Not Found)
```

#### Causa:
Algún script o extensión intenta cargar archivos desde Google.com en lugar de tu servidor local.

#### Solución:
- ✅ **Interceptor Automático:** `resource-interceptor.js` redirige estas peticiones
- ✅ **Archivos Locales:** Todos los archivos JS están disponibles localmente
- ✅ **Logs Informativos:** El sistema muestra cuando intercepta estas peticiones

---

## 🛠️ Herramientas de Diagnóstico

### 1. **Página de Debug**
Accede a: `http://app2.test/public/debug-js.html`

**Funcionalidades:**
- ✅ Verificación de archivos JS/CSS
- ✅ Detección de errores
- ✅ Console output en tiempo real
- ✅ Pruebas de funcionalidad
- ✅ Enlaces de prueba

### 2. **Manejador de Errores**
Archivo: `public/assets/js/error-handler.js`

**Funcionalidades:**
- ✅ Filtrado automático de errores no críticos
- ✅ Logs detallados de errores reales
- ✅ Notificaciones amigables al usuario
- ✅ Interceptación de errores globales

### 3. **Configuración de Desarrollo**
Archivo: `public/assets/js/dev-config.js`

**Funcionalidades:**
- ✅ Detección automática de entorno
- ✅ Configuración CSP para desarrollo
- ✅ Limpieza de errores de extensiones
- ✅ Reportes de diagnóstico

### 4. **Interceptor de Recursos**
Archivo: `public/assets/js/resource-interceptor.js`

**Funcionalidades:**
- ✅ Redirección automática de peticiones a Google.com
- ✅ Interceptación de creación de elementos
- ✅ Limpieza de referencias problemáticas
- ✅ Verificación de recursos locales

---

## 📋 Checklist de Verificación

### ✅ **Antes de Reportar un Error:**

1. **Verifica la consola del navegador:**
   - Abre las herramientas de desarrollador (F12)
   - Ve a la pestaña "Console"
   - Busca errores que NO estén en la lista de ignorados

2. **Usa la página de debug:**
   - Accede a `http://app2.test/public/debug-js.html`
   - Revisa el estado de todos los archivos
   - Ejecuta las pruebas de funcionalidad

3. **Verifica el entorno:**
   - Confirma que estás en `app2.test`
   - Verifica que todos los archivos JS existen
   - Comprueba que no hay extensiones interfiriendo

4. **Revisa los logs del sistema:**
   - Busca mensajes que empiecen con `[DEV INFO]`
   - Verifica los logs del Resource Interceptor
   - Revisa los logs del Error Handler

---

## 🔍 **Errores que se Manejan Automáticamente**

### ✅ **Errores de Extensiones (Ignorados):**
- `runtime.lastError`
- `Could not establish connection`
- `Receiving end does not exist`
- `platform is not supported`

### ✅ **Errores de Recursos (Redirigidos):**
- Peticiones a `google.com`
- Peticiones a `googleapis.com`
- Peticiones a `gstatic.com`

### ✅ **Errores CSP (Resueltos):**
- Scripts inline
- Imágenes SVG inline
- Event handlers inline

---

## 🚀 **Comandos Útiles para Debug**

### **Verificar archivos locales:**
```bash
# Verificar que todos los archivos JS existen
ls -la public/assets/js/

# Verificar que todos los archivos CSS existen
ls -la public/assets/css/
```

### **Verificar configuración del servidor:**
```bash
# Verificar que .htaccess está funcionando
curl -I http://app2.test/assets/js/main.js

# Verificar headers CSP
curl -I http://app2.test/
```

### **Limpiar cache del navegador:**
- Chrome: `Ctrl + Shift + R` (Hard Refresh)
- Firefox: `Ctrl + F5` (Hard Refresh)
- Safari: `Cmd + Option + R` (Hard Refresh)

---

## 📞 **Cuándo Contactar Soporte**

### **Contacta si encuentras:**
- ❌ Errores que NO están en la lista de ignorados
- ❌ Funcionalidad que no funciona correctamente
- ❌ Archivos que no se cargan (404 reales)
- ❌ Problemas de rendimiento significativos

### **NO contactes por:**
- ✅ Errores de extensiones del navegador
- ✅ Errores 404 de Google.com (ya se manejan)
- ✅ Errores CSP (ya se resuelven automáticamente)
- ✅ Logs informativos del sistema

---

## 📚 **Recursos Adicionales**

- **Documentación del Front Controller:** `README.md`
- **Documentación de CSS:** `public/assets/css/README.md`
- **Documentación de JavaScript:** `public/assets/js/README.md`
- **Página de Debug:** `public/debug-js.html`
- **Debug PHP:** `public/debug.php`

---

*Última actualización: Julio 2025* 