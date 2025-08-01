# 📁 Estructura de Archivos CSS

Este directorio contiene todos los archivos CSS del proyecto Front Controller.

## 📋 Archivos CSS

### `main.css`
**Descripción:** Estilos principales y base del sistema
**Contenido:**
- Estilos de navegación (`.navbar-brand`, `.nav-link.active`)
- Estilos de secciones hero (`.hero-section`)
- Estilos de footer (`.footer`)
- Estilos de tarjetas (`.card`)
- Estilos de botones principales (`.btn-primary`)
- Estilos responsive
- Animaciones básicas
- Estilos para mensajes de error/éxito

### `components.css`
**Descripción:** Estilos específicos de componentes reutilizables
**Contenido:**
- Formularios de contacto (`.contact-form`)
- Botones especiales (`.btn-gradient`, `.btn-outline-gradient`)
- Tarjetas de características (`.feature-card`)
- Testimonios (`.testimonial-item`)
- Estadísticas (`.stats-section`)
- Paginación personalizada
- Alertas personalizadas
- Modales personalizados
- Tooltips personalizados
- Badges con gradiente
- Listas personalizadas
- Separadores
- Efectos hover para imágenes
- Texto con gradiente

## 🎨 Paleta de Colores

### Colores Principales
- **Primario:** `#667eea` (Azul)
- **Secundario:** `#764ba2` (Púrpura)
- **Gradiente Principal:** `linear-gradient(135deg, #667eea 0%, #764ba2 100%)`

### Colores de Estado
- **Éxito:** `#28a745` → `#20c997`
- **Advertencia:** `#ffc107` → `#fd7e14`
- **Peligro:** `#dc3545` → `#e83e8c`

## 🔧 Uso de Clases CSS

### Clases de Botones
```html
<!-- Botón principal -->
<button class="btn btn-primary">Botón Principal</button>

<!-- Botón con gradiente -->
<button class="btn btn-gradient">Botón Gradiente</button>

<!-- Botón outline con gradiente -->
<button class="btn btn-outline-gradient">Botón Outline</button>
```

### Clases de Tarjetas
```html
<!-- Tarjeta básica -->
<div class="card">Contenido</div>

<!-- Tarjeta de características -->
<div class="card feature-card">
    <div class="icon">
        <i class="fas fa-star"></i>
    </div>
    <h4>Título</h4>
    <p>Descripción</p>
</div>
```

### Clases de Formularios
```html
<!-- Formulario de contacto -->
<form class="contact-form">
    <input type="text" class="form-control" placeholder="Nombre">
    <button type="submit" class="btn btn-gradient">Enviar</button>
</form>
```

### Clases de Texto
```html
<!-- Texto con gradiente -->
<h1 class="text-gradient-primary">Título con Gradiente</h1>

<!-- Separador -->
<div class="divider divider-center"></div>
```

## 📱 Responsive Design

Los estilos incluyen media queries para dispositivos móviles:

```css
@media (max-width: 768px) {
    .hero-section {
        padding: 60px 0;
    }
    
    .section-padding {
        padding: 60px 0;
    }
    
    .navbar-brand {
        font-size: 1.2rem;
    }
}
```

## 🎭 Animaciones

### Animaciones CSS
- **Hover en tarjetas:** `transform: translateY(-5px)`
- **Hover en botones:** `transform: translateY(-2px)` o `translateY(-3px)`
- **Fade In Up:** Animación personalizada para elementos al hacer scroll

### Clases de Animación
```html
<!-- Elemento con animación al scroll -->
<div class="animate-on-scroll">Contenido</div>

<!-- Elemento con fade in up -->
<div class="fade-in-up">Contenido</div>
```

## 🚀 Mejores Prácticas

1. **Separación de Responsabilidades:**
   - `main.css` para estilos base y generales
   - `components.css` para componentes específicos

2. **Nomenclatura:**
   - Usar BEM (Block Element Modifier) cuando sea apropiado
   - Prefijos descriptivos (`.btn-`, `.card-`, `.form-`)

3. **Performance:**
   - Minimizar el uso de `!important`
   - Usar selectores específicos
   - Optimizar media queries

4. **Mantenibilidad:**
   - Comentarios descriptivos
   - Agrupación lógica de estilos
   - Variables CSS para colores y valores reutilizables

## 🔄 Actualizaciones

Para agregar nuevos estilos:

1. **Estilos base:** Agregar a `main.css`
2. **Componentes específicos:** Agregar a `components.css`
3. **Documentar:** Actualizar este README
4. **Probar:** Verificar en diferentes dispositivos y navegadores 