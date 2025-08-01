# 📁 Estructura de Archivos JavaScript

Este directorio contiene todos los archivos JavaScript del proyecto Front Controller.

## 📋 Archivos JavaScript

### `main.js`
**Descripción:** Funcionalidades principales del sistema
**Contenido:**
- Inicialización del Front Controller
- Manejo de navegación activa
- Inicialización de componentes Bootstrap (tooltips, popovers)
- Funciones de utilidad generales

### `index.js`
**Descripción:** Funcionalidades específicas de la página de índice
**Contenido:**
- Validación de formularios
- Manejo de enlaces de navegación
- Animaciones de scroll
- Indicadores de carga

### `contact.js`
**Descripción:** Validación y funcionalidades del formulario de contacto
**Contenido:**
- Validación en tiempo real de campos
- Validación de email y teléfono
- Mensajes de error y éxito
- Animación del botón de envío
- Limpieza automática del formulario

## 🔧 Funcionalidades Principales

### Validación de Formularios
```javascript
// Validación de email
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Validación de teléfono
function isValidPhone(phone) {
    const phoneRegex = /^[\+]?[0-9\s\-\(\)]{7,}$/;
    return phoneRegex.test(phone);
}
```

### Manejo de Mensajes
```javascript
// Mostrar mensaje de éxito/error
function showMessage(message, type) {
    const messageDiv = document.createElement('div');
    messageDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
    // ... configuración del mensaje
}
```

### Animaciones
```javascript
// Animación de scroll
function handleScrollAnimations() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
            }
        });
    });
}
```

## 🎯 Uso de los Archivos

### Carga Automática
Los archivos se cargan automáticamente según la página:

- **Todas las páginas:** `main.js` (cargado en el layout principal)
- **Página de contacto:** `contact.js` (cargado específicamente)
- **Página de inicio:** `index.js` (cargado específicamente)

### Carga Manual
Si necesitas cargar un archivo específico:

```html
<script src="assets/js/contact.js"></script>
```

## 🚀 Mejores Prácticas

### 1. **Vanilla JavaScript**
- No dependemos de jQuery
- Uso de APIs modernas del navegador
- Compatibilidad con navegadores modernos

### 2. **Modularidad**
- Cada archivo tiene una responsabilidad específica
- Funciones reutilizables
- Fácil mantenimiento

### 3. **Validación**
- Validación en tiempo real
- Mensajes de error claros
- Feedback visual inmediato

### 4. **Performance**
- Carga diferida de scripts
- Uso de event delegation cuando es apropiado
- Minimización de reflows y repaints

## 🔄 Eventos Principales

### DOMContentLoaded
Todos los scripts esperan a que el DOM esté listo:

```javascript
document.addEventListener('DOMContentLoaded', function() {
    // Inicialización del código
});
```

### Eventos de Formulario
```javascript
// Submit del formulario
form.addEventListener('submit', function(e) {
    e.preventDefault();
    // Validación y envío
});

// Input en tiempo real
field.addEventListener('input', function() {
    // Validación en tiempo real
});
```

## 🎨 Integración con CSS

Los archivos JavaScript trabajan en conjunto con las clases CSS:

```javascript
// Agregar clase de error
field.classList.add('is-invalid');

// Remover clase de error
field.classList.remove('is-invalid');

// Agregar animación
element.classList.add('animate__animated', 'animate__fadeInUp');
```

## 🔧 Configuración

### Variables Globales
```javascript
// Configuración de animaciones
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

// Configuración de validación
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const phoneRegex = /^[\+]?[0-9\s\-\(\)]{7,}$/;
```

### Configuración de Mensajes
```javascript
const messages = {
    success: '¡Operación completada exitosamente!',
    error: 'Ha ocurrido un error. Por favor, intenta de nuevo.',
    validation: {
        required: 'Este campo es requerido.',
        email: 'Por favor, ingresa un email válido.',
        phone: 'Por favor, ingresa un teléfono válido.'
    }
};
```

## 🔄 Actualizaciones

Para agregar nuevas funcionalidades:

1. **Crear nuevo archivo:** `nueva-funcionalidad.js`
2. **Documentar:** Actualizar este README
3. **Integrar:** Agregar al controlador correspondiente
4. **Probar:** Verificar en diferentes navegadores

## 🐛 Debugging

### Console Logs
Los archivos incluyen logs informativos:

```javascript
console.log('Front Controller - Sistema cargado correctamente');
console.log('Inicializando funcionalidades...');
```

### Errores Comunes
- **$ is not defined:** Asegúrate de no usar jQuery
- **Script not found:** Verifica las rutas de los archivos
- **Validation errors:** Revisa la consola para detalles

## 📱 Compatibilidad

- **Navegadores modernos:** Chrome, Firefox, Safari, Edge
- **Versiones mínimas:** ES6+
- **Dispositivos:** Desktop, tablet, móvil 