# 🏗️ Front Controller con Sistema de Layouts - Guía de Construcción Paso a Paso

## 📋 Resumen del Proyecto

Este proyecto implementa el **patrón arquitectónico Front Controller** con un **sistema de layouts reutilizables** en PHP. Cada vista contiene solo su contenido específico, mientras que un layout principal maneja la estructura HTML común.

## 🎯 Características Principales

- ✅ **Front Controller Pattern** - Un punto de entrada único
- ✅ **Sistema de Layouts** - Plantilla madre reutilizable
- ✅ **Separación de CSS/JS** - Archivos externos organizados
- ✅ **Manejo de Errores** - Sistema robusto de debugging
- ✅ **CSP Configurado** - Content Security Policy para desarrollo
- ✅ **Interceptor de Recursos** - Manejo automático de referencias externas

---

## 📁 Estructura del Proyecto

```
app2/
├── public/                 # Directorio público (DocumentRoot)
│   ├── index.php          # Front Controller principal
│   ├── .htaccess          # Configuración Apache
│   ├── debug.php          # Debug PHP
│   ├── debug-js.html      # Debug JavaScript
│   ├── navegacion.html    # Página de navegación
│   └── assets/
│       ├── css/
│       │   ├── main.css
│       │   ├── components.css
│       │   └── README.md
│       └── js/
│           ├── main.js
│           ├── index.js
│           ├── contact.js
│           ├── error-handler.js
│           ├── dev-config.js
│           ├── resource-interceptor.js
│           ├── README.md
│           └── TROUBLESHOOTING.md
├── core/                  # Núcleo del sistema
│   ├── Router.php         # Manejador de rutas
│   └── Layout.php         # Sistema de layouts
├── controllers/           # Controladores
│   ├── HomeController.php
│   ├── ErrorController.php
│   ├── ServiceController.php
│   ├── ProductController.php
│   └── BlogController.php
├── views/                 # Vistas
│   ├── layouts/
│   │   └── main.php       # Layout principal
│   ├── home.php
│   ├── about.php
│   ├── contact.php
│   ├── error.php
│   ├── services.php
│   ├── products.php
│   └── blog.php
└── README.md              # Este archivo
```

---

## 🚀 Orden de Creación Paso a Paso

### **FASE 1: Estructura Base**

#### **Paso 1: Crear directorios**
```bash
mkdir public
mkdir public/assets
mkdir public/assets/css
mkdir public/assets/js
mkdir core
mkdir controllers
mkdir views
mkdir views/layouts
```

#### **Paso 2: Front Controller Principal**
**Archivo:** `public/index.php`
- Punto de entrada único
- Carga del Router y Layout
- Manejo de errores básico

#### **Paso 3: Configuración Apache**
**Archivo:** `public/.htaccess`
- URL rewriting
- Headers CSP
- Configuración de archivos estáticos

#### **Paso 4: Núcleo del Sistema**
**Archivo:** `core/Router.php`
- Mapeo de rutas
- Carga de controladores
- Manejo de errores

**Archivo:** `core/Layout.php`
- Sistema de layouts
- Inyección de contenido
- Métodos helper

### **FASE 2: Layout y Vistas Base**

#### **Paso 5: Layout Principal**
**Archivo:** `views/layouts/main.php`
- Estructura HTML base
- Navegación
- Footer
- Carga de CSS/JS

#### **Paso 6: Vistas Básicas**
**Archivo:** `views/home.php`
- Contenido de la página de inicio

**Archivo:** `views/about.php`
- Contenido de "Acerca de"

**Archivo:** `views/error.php`
- Página de errores

### **FASE 3: Controladores**

#### **Paso 7: Controlador Principal**
**Archivo:** `controllers/HomeController.php`
- Métodos: index(), about(), contact()
- Integración con Layout

#### **Paso 8: Controlador de Errores**
**Archivo:** `controllers/ErrorController.php`
- Manejo de errores 404, 500

#### **Paso 9: Controladores Adicionales**
**Archivo:** `controllers/ServiceController.php`
- Métodos: index(), detail()

**Archivo:** `controllers/ProductController.php`
- Métodos: index(), detail()

**Archivo:** `controllers/BlogController.php`
- Métodos: index(), post()

### **FASE 4: Vistas Adicionales**

#### **Paso 10: Vistas de Contenido**
**Archivo:** `views/contact.php`
- Formulario de contacto
- Información de contacto

**Archivo:** `views/services.php`
- Lista de servicios

**Archivo:** `views/products.php`
- Lista de productos

**Archivo:** `views/blog.php`
- Lista de posts del blog

### **FASE 5: Estilos CSS**

#### **Paso 11: CSS Principal**
**Archivo:** `public/assets/css/main.css`
- Estilos base
- Variables CSS
- Utilidades

#### **Paso 12: CSS de Componentes**
**Archivo:** `public/assets/css/components.css`
- Estilos de componentes específicos
- Animaciones
- Responsive design

#### **Paso 13: Documentación CSS**
**Archivo:** `public/assets/css/README.md`
- Guía de uso de CSS
- Paleta de colores
- Componentes disponibles

### **FASE 6: JavaScript**

#### **Paso 14: JS Principal**
**Archivo:** `public/assets/js/main.js`
- Funcionalidades generales
- Inicialización del sistema

#### **Paso 15: JS de Páginas Específicas**
**Archivo:** `public/assets/js/index.js`
- Funcionalidades de la página de inicio

**Archivo:** `public/assets/js/contact.js`
- Validación del formulario de contacto

#### **Paso 16: Sistema de Manejo de Errores**
**Archivo:** `public/assets/js/error-handler.js`
- Interceptación de errores
- Filtrado de errores de extensiones
- Logs detallados

#### **Paso 17: Configuración de Desarrollo**
**Archivo:** `public/assets/js/dev-config.js`
- Configuración CSP
- Detección de entorno
- Logs de desarrollo

#### **Paso 18: Interceptor de Recursos**
**Archivo:** `public/assets/js/resource-interceptor.js`
- Redirección de peticiones a Google.com
- Interceptación de creación de elementos
- Limpieza de referencias problemáticas

#### **Paso 19: Documentación JavaScript**
**Archivo:** `public/assets/js/README.md`
- Guía de uso de JavaScript
- Funcionalidades disponibles
- Mejores prácticas

### **FASE 7: Herramientas de Debug**

#### **Paso 20: Debug PHP**
**Archivo:** `public/debug.php`
- Verificación de PHP
- Estado del sistema
- Información de rutas

#### **Paso 21: Debug JavaScript**
**Archivo:** `public/debug-js.html`
- Verificación de archivos JS/CSS
- Console output en tiempo real
- Pruebas de funcionalidad

#### **Paso 22: Página de Navegación**
**Archivo:** `public/navegacion.html`
- Enlaces a todas las rutas
- Descripción de funcionalidades

### **FASE 8: Documentación Final**

#### **Paso 23: Guía de Solución de Problemas**
**Archivo:** `public/assets/js/TROUBLESHOOTING.md`
- Errores comunes y soluciones
- Herramientas de diagnóstico
- Checklist de verificación

---

## 🔧 Comandos de Verificación

### **Después de cada fase, verifica:**

```bash
# Verificar estructura de directorios
tree app2/

# Verificar archivos PHP
php -l public/index.php
php -l core/Router.php
php -l core/Layout.php

# Verificar sintaxis CSS
# (Usar un validador online)

# Verificar sintaxis JavaScript
# (Usar las herramientas de desarrollador del navegador)
```

---

## 🎯 Puntos de Control

### **Después de la Fase 1:**
- ✅ El proyecto debe cargar sin errores PHP
- ✅ Las rutas básicas deben funcionar

### **Después de la Fase 2:**
- ✅ El layout debe mostrarse correctamente
- ✅ La navegación debe funcionar

### **Después de la Fase 3:**
- ✅ Todos los controladores deben cargar
- ✅ Las rutas deben responder correctamente

### **Después de la Fase 4:**
- ✅ Todas las páginas deben mostrarse
- ✅ El contenido debe ser específico de cada vista

### **Después de la Fase 5:**
- ✅ Los estilos deben aplicarse correctamente
- ✅ El diseño debe ser responsive

### **Después de la Fase 6:**
- ✅ JavaScript debe funcionar sin errores
- ✅ La validación de formularios debe funcionar

### **Después de la Fase 7:**
- ✅ Las herramientas de debug deben funcionar
- ✅ No debe haber errores en la consola

### **Después de la Fase 8:**
- ✅ Documentación completa
- ✅ Sistema listo para producción

---

## 🚨 Errores Comunes y Soluciones

### **Error: "Class not found"**
- Verificar que el archivo del controlador existe
- Verificar que la clase tiene el nombre correcto
- Verificar que el archivo está en el directorio correcto

### **Error: "View not found"**
- Verificar que el archivo de vista existe
- Verificar la ruta del archivo
- Verificar permisos de archivo

### **Error: "404 on assets"**
- Verificar que los archivos CSS/JS existen
- Verificar la configuración de .htaccess
- Verificar las rutas en el layout

### **Error: "CSP violation"**
- Verificar que no hay scripts inline
- Verificar la configuración CSP en .htaccess
- Usar archivos externos para JavaScript

---

## 📚 Recursos Adicionales

- **Patrón Front Controller:** [Wikipedia](https://en.wikipedia.org/wiki/Front_controller)
- **Content Security Policy:** [MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP)
- **PHP Best Practices:** [PHP Documentation](https://www.php.net/manual/en/)

---

*Esta guía te permitirá construir el proyecto paso a paso, verificando cada fase antes de continuar con la siguiente.*

## 🤔 **¿Por qué no tiene modelos actualmente?**

### **1. Enfoque Educativo**
- El proyecto está diseñado para enseñar el **patrón Front Controller**
- Se centra en la **separación de responsabilidades** entre controladores y vistas
- El **sistema de layouts** es el foco principal

### **2. Complejidad Controlada**
- Para estudiantes, es más fácil entender el patrón sin agregar la capa de datos
- Los controladores manejan datos estáticos/simulados
- Se evita la complejidad de bases de datos y ORM

### **3. Demostración del Patrón**
- El Front Controller se demuestra claramente sin distracciones
- El sistema de layouts se muestra de manera pura
- Los controladores son simples y fáciles de entender

## 🏗️ **¿Cómo agregaríamos modelos?**

Si quisiéramos agregar modelos, la estructura sería:

```
app2/
├── models/                 # Capa de modelos
│   ├── User.php
│   ├── Product.php
│   ├── Service.php
│   ├── BlogPost.php
│   └── Database.php       # Conexión a BD
├── controllers/
│   ├── HomeController.php
│   ├── UserController.php
│   ├── ProductController.php
│   └── BlogController.php
└── views/
    ├── user/
    │   ├── index.php
    │   ├── show.php
    │   └── edit.php
    └── product/
        ├── index.php
        ├── show.php
        └── edit.php
```

## 🎯 **¿Quieres que agregue modelos?**

Si quieres que agregue modelos al proyecto, podría:

### **Opción 1: Modelos Simples (Sin BD)**
- Modelos con datos estáticos
- Demostrar la estructura MVC completa
- Fácil de entender para estudiantes

### **Opción 2: Modelos con Base de Datos**
- Conexión real a MySQL/PostgreSQL
- CRUD completo
- Más realista pero más complejo

### **Opción 3: Modelos con ORM**
- Usar un ORM como Doctrine o Eloquent
- Más avanzado pero más profesional

## 📚 **Ejemplo de cómo se vería con modelos:**

```php
<code_block_to_apply_changes_from>
```

## 🤷‍♂️ **¿Qué prefieres?**

1. **Mantener el proyecto actual** (solo Front Controller + Layouts)
2. **Agregar modelos simples** (datos estáticos, fácil de entender)
3. **Agregar modelos con BD** (más realista, más complejo)
4. **Crear una versión separada** con modelos

¿Cuál opción te parece mejor para tus estudiantes?
