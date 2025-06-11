# MEMORIA DEL PROYECTO DE DESARROLLO DE APLICACIONES WEB

## CAFETERÍA CLMSKILLS 2025

### Datos del Proyecto
- **Alumno**: Pablo Montañana
- **Correo electrónico**: pablomontanana@gmail.com
- **Título del Proyecto**: Sistema Web de Gestión para Cafetería CLMSkills 2025
- **Ciclo Formativo**: Desarrollo de Aplicaciones Web
- **Centro**: IES Amparo Sanz
- **Curso**: 2024/2025
- **Tutor**: Carlos Roncero Parra

---

## ÍNDICE

1. [Introducción](#1-introducción)
2. [Estado del Arte](#2-estado-del-arte)
3. [Estudio de Viabilidad](#3-estudio-de-viabilidad)
4. [Análisis de Requisitos](#4-análisis-de-requisitos)
5. [Diseño](#5-diseño)
6. [Codificación](#6-codificación)
7. [Despliegue](#7-despliegue)
8. [Herramientas de Apoyo](#8-herramientas-de-apoyo)
9. [Gestión de Pruebas](#9-gestión-de-pruebas)
10. [Conclusiones](#10-conclusiones)
11. [Bibliografía](#11-bibliografía)

---

## 1. INTRODUCCIÓN

### 1.1 Descripción del Proyecto
El proyecto consiste en el desarrollo de una aplicación web completa para la gestión integral de una cafetería, diseñada específicamente para su presentación en las CLMSkills 2025. La aplicación permite a los clientes explorar el catálogo de productos, realizar reservas de mesas y gestionar pedidos para llevar, mientras que proporciona a los administradores herramientas completas para la gestión de la cafeteria.

### 1.2 Contexto y Problemática
En el sector de la hostelería actual, muchos establecimientos echan en falta sistemas digitales integrados que permitan:
- Gestión eficiente de reservas evitando conflictos de horarios
- Visualización atractiva del catálogo de productos con información de alérgenos
- Sistema de pedidos online para productos para llevar
- Panel de administración centralizado para la gestión del negocio

### 1.3 Objetivos del Proyecto
**Objetivo Principal**: Desarrollar una solución web completa que digitalice y optimice la gestión de una cafetería, mejorando la experiencia tanto de clientes como de administradores.

**Objetivos Específicos**:
- Implementar un sistema de reservas intuitivo con gestión de turnos y mesas
- Crear un catálogo digital con gestión completa de productos, categorías y alérgenos
- Desarrollar un sistema de autenticación seguro con roles diferenciados
- Diseñar una interfaz bonita y accesible
- Implementar funcionalidades de búsqueda avanzada y filtrado

### 1.4 Alcance del Proyecto
El proyecto abarca:
- Desarrollo de aplicación web completa con Laravel
- Diseño de base de datos relacional
- Implementación de interfaz de usuario
- Sistema de autenticación y autorización
- Panel de administración
- Integración con servicios externos (correo)
- Documentación técnica completa

---

## 2. ESTADO DEL ARTE

### 2.1 Análisis de Soluciones Existentes

#### Competidores Directos
1. **TheFork (ElTenedor)**
   - Ventajas: Gran base de usuarios, sistema de reservas robusto
   - Desventajas: Comisiones elevadas, personalización limitada
   - Tecnologías: Node.js, React, MongoDB

2. **Resy**
   - Ventajas: Interfaz moderna, gestión de listas de espera
   - Desventajas: Orientado a restaurantes premium
   - Tecnologías: Python, PostgreSQL, Vue.js

3. **OpenTable**
   - Ventajas: Líder del mercado, integración con POS
   - Desventajas: Costoso para pequeños negocios
   - Tecnologías: Java, MySQL, Angular

#### Análisis Comparativo
| Característica     | TheFork | Resy | OpenTable | Nuestro Proyecto |
|--------------------|---------|------|-----------|------------------|
| Gestión Reservas   | ✓       | ✓    | ✓         | ✓     	     |
| Catálogo Digital   | ✗       | ✗    | Parcial   | ✓ 		     |
| Gestión Alérgenos  | ✗       | ✗    | ✗         | ✓                |
| Pedidos Online     | ✗       | ✗    | ✗         | ✓                |
| Código Abierto     | ✗       | ✗    | ✗         | ✓                |
| Coste              | Alto    | Alto | Muy Alto  | Gratuito         |

### 2.2 Tecnologías Emergentes
- **Laravel 12**: Framework PHP moderno con arquitectura MVC
- **Tailwind CSS 4**: Utility-first CSS framework
- **Alpine.js**: Framework JavaScript minimalista
- **Vite**: Build tool de nueva generación

### 2.3 Innovaciones del Proyecto
1. **Gestión Integral de Alérgenos**: Sistema completo de etiquetado y filtrado
2. **Búsqueda Avanzada**: Filtros múltiples combinables
3. **Sistema de Menús Dinámicos**: Creación flexible de menús
4. **Modal LOPD**: Cumplimiento normativo integrado
5. **Diseño Mobile-First**: Optimizado para dispositivos móviles

---

## 3. ESTUDIO DE VIABILIDAD

### 3.1 Análisis DAFO

#### Debilidades
- Proyecto individual con recursos limitados
- Tiempo de desarrollo acotado por calendario académico
- Primera versión del producto sin feedback real de usuarios

#### Amenazas
- Competencia de soluciones establecidas
- Cambios en normativas de protección de datos
- Resistencia al cambio en el sector hostelero tradicional

#### Fortalezas
- Solución personalizable y sin costes de licencia
- Tecnologías modernas y escalables
- Enfoque en usabilidad y accesibilidad
- Integración completa de funcionalidades

#### Oportunidades
- Digitalización creciente del sector hostelero
- Demanda de soluciones económicas post-pandemia
- Posibilidad de expansión a otros tipos de negocios
- Potencial de monetización mediante servicios adicionales

### 3.2 Estudio de Mercado

#### Mercado Objetivo
- **Primario**: Cafeterías y pequeños restaurantes (1-50 mesas)
- **Secundario**: Bares, bistros y establecimientos de comida rápida
- **Terciario**: Franquicias en expansión

#### Análisis de la Competencia
El mercado está dominado por soluciones SaaS con modelos de suscripción mensual (30-200€/mes). Nuestra propuesta de código abierto representa una alternativa disruptiva.

### 3.3 Viabilidad Técnica

#### Recursos Hardware
- Servidor web: 2 vCPU, 4GB RAM, 20GB SSD
- Base de datos: MySQL 8.0
- Ancho de banda: 100GB/mes

#### Recursos Software
- Laravel 12 (Licencia MIT)
- Tailwind CSS (Licencia MIT)
- Alpine.js (Licencia MIT)
- Todas las dependencias con licencias compatibles

#### Recursos Humanos
- 1 Desarrollador Full Stack (400 horas estimadas)
- 1 Tutor/Supervisor (40 horas)

### 3.4 Viabilidad Económica

#### Costes de Desarrollo
- Horas de desarrollo: 400h × 0€ (proyecto académico) = 0€
- Licencias software: 0€ (todo open source)
- Hosting desarrollo: 0€ (NAS propio)

#### Costes de Producción (Anuales)
- Hosting: 0€/año
- Dominio: 7€/año
- Certificado SSL: 0€ (Let's Encrypt)
- **Total**: 7€/año

#### Modelo de Negocio Potencial
- Versión básica: Gratuita (open source)
- Soporte premium: 50€/mes
- Personalización: 500€ (pago único)
- Hosting gestionado: 30€/mes

### 3.5 Viabilidad Temporal

#### Cronograma (16 semanas)
- **Semanas 1-2**: Análisis y diseño
- **Semanas 3-4**: Configuración del entorno
- **Semanas 5-8**: Desarrollo backend
- **Semanas 9-11**: Desarrollo frontend
- **Semanas 12-13**: Testing y depuración
- **Semanas 14-15**: Documentación
- **Semana 16**: Presentación

---

## 4. ANÁLISIS DE REQUISITOS

### 4.1 Requisitos Funcionales

#### RF001 - Gestión de Usuarios
- El sistema permitirá el registro de nuevos usuarios
- Los usuarios podrán autenticarse con email y contraseña
- Existirán dos roles: usuario y administrador
- Los usuarios podrán actualizar su perfil

#### RF002 - Catálogo de Productos
- Visualización de productos organizados por categorías
- Información detallada incluyendo alérgenos
- Indicador de disponibilidad para llevar
- Búsqueda y filtrado avanzado

#### RF003 - Sistema de Reservas
- Selección de fecha y turno
- Búsqueda de mesas disponibles según capacidad
- Confirmación y gestión de reservas
- Historial de reservas por usuario

#### RF004 - Gestión de Menús
- Creación de menús con múltiples platos
- Visualización organizada de menús
- Asociación flexible plato-menú

#### RF005 - Panel de Administración
- Dashboard con estadísticas
- CRUD completo de platos
- Gestión de reservas
- Gestión de usuarios

#### RF006 - Sistema de Notificaciones
- Envío de correos con información de platos
- Confirmaciones de reserva (futuro)

### 4.2 Requisitos No Funcionales

#### RNF001 - Rendimiento
- Tiempo de carga < 3 segundos
- Soporte para 50 usuarios concurrentes
- Paginación de resultados (6 items)

#### RNF002 - Seguridad
- Autenticación mediante sesiones seguras
- Protección CSRF en formularios
- Validación de entrada en cliente y servidor
- Middleware de autorización por roles

#### RNF003 - Usabilidad
- Interfaz intuitiva sin manual
- Accesibilidad WCAG 2.1 nivel AA
- Mensajes de error claros

#### RNF004 - Compatibilidad
- Navegadores: Chrome 90+, Firefox 88+, Safari 14+
- Dispositivos: Smartphones, tablets, ordenadores
- Resoluciones: 320px a 4K

### 4.3 Casos de Uso

#### Diagrama General de Casos de Uso
```
┌─────────────────────────────────────────────────┐
│              Sistema Cafetería                  │
├─────────────────────────────────────────────────┤
│                                                 │
│  Usuario                    Administrador       │
│    │                            │               │
│    ├─ Registrarse               ├─ Login        │
│    ├─ Login                     ├─ Gestionar    │
│    ├─ Ver Catálogo              │   Platos      │
│    ├─ Buscar Platos             ├─ Gestionar    │
│    ├─ Realizar Reserva          │   Menús       │
│    ├─ Ver Mis Reservas          ├─ Ver          │
│    └─ Recibir Platos            │   Reservas    │
│        por Email                └─ Ver          │
│                                     Dashboard   │
└─────────────────────────────────────────────────┘
```

#### CU001 - Realizar Reserva
**Actor**: Usuario registrado
**Precondiciones**: Usuario autenticado
**Flujo Principal**:
1. Usuario accede a /reservas
2. Selecciona fecha (>= hoy)
3. Selecciona turno disponible
4. Indica número de comensales
5. Sistema busca mesas disponibles
6. Usuario selecciona mesa
7. Opcionalmente añade observaciones
8. Confirma reserva
9. Sistema muestra confirmación

**Flujos Alternativos**:
- 5a. No hay mesas disponibles → Mensaje informativo
- 8a. Mesa ya reservada → Error y vuelta a búsqueda

### 4.4 Descripción de Requisitos

#### Gestión de Alérgenos
El sistema mantendrá una base de datos de alérgenos comunes (gluten, lactosa, huevo, frutos secos, pescado, marisco, soja, apio) que podrán asociarse a cada plato mediante una relación muchos-a-muchos.

#### Sistema de Búsqueda
Implementación de búsqueda multicritero combinable:
- Por tipo de plato (pizza, pasta, hamburguesa)
- Por categoría (entrantes, principales, postres, etc.)
- Por alérgenos (inclusión/exclusión)
- Por rango de precio

#### Gestión de Turnos
Turnos predefinidos:
- Comida 1: 13:00 - 14:30
- Comida 2: 14:30 - 16:00
- Cena 1: 20:00 - 21:30
- Cena 2: 21:30 - 23:00

---

## 5. DISEÑO

### 5.1 Diseño de Base de Datos

#### Modelo Entidad-Relación
```
┌─────────────┐     ┌──────────────┐     ┌─────────────┐
│   USUARIOS  │     │    PLATOS    │     │ CATEGORIAS  │
├─────────────┤     ├──────────────┤     ├─────────────┤
│ id          │     │ id           │     │ id          │
│ name        │     │ nombre       │────▶│ nombre      │
│ email       │     │ descripcion  │     │ descripcion │
│ password    │     │ imagen       │     └─────────────┘
│ role        │     │ precio       │
└─────────────┘     │ tipo         │     ┌─────────────┐
       │            │ categoria_id │     │  ALERGENOS  │
       │            │ forsale      │     ├─────────────┤
       ▼            └──────────────┘     │ id          │
┌─────────────┐            │             │ nombre      │
│  RESERVAS   │            │             │ descripcion │
├─────────────┤            ▼             └─────────────┘
│ id          │     ┌──────────────┐            ▲
│ user_id     │     │ ALERGENO_PLATO│           │
│ mesa_id     │     ├──────────────┤            │
│ turno_id    │     │ plato_id     │───────────-┘
│ fecha       │     │ alergeno_id  │
│ comensales  │     └──────────────┘
└─────────────┘
```

#### Diseño Lógico Relacional
1. **users** (id, name, email, password, role, timestamps)
2. **platos** (id, nombre, descripcion, imagen, precio, tipo, categoria_id, forsale, timestamps)
3. **categorias** (id, nombre, descripcion, timestamps)
4. **alergenos** (id, nombre, descripcion, timestamps)
5. **alergeno_plato** (id, alergeno_id, plato_id, timestamps)
6. **menus** (id, nombre, timestamps)
7. **menu_plato** (id, menu_id, platos_id, timestamps)
8. **mesas** (id, numero, capacidad, timestamps)
9. **turnos** (id, nombre, hora_inicio, hora_fin, timestamps)
10. **reservas** (id, user_id, mesa_id, turno_id, fecha, comensales, observaciones, timestamps)

### 5.2 Diseño de Arquitectura

#### Arquitectura MVC
```
┌─────────────────────────────────────────────┐
│              CLIENTE (Browser)              │
├─────────────────────────────────────────────┤
│          HTML + CSS + JavaScript            │
│         (Blade + Tailwind + Alpine)         │
└──────────────────┬──────────────────────────┘
                   │ HTTP Request/Response
┌──────────────────▼──────────────────────────┐
│              SERVIDOR WEB                   │
│                (Nginx)                      │
└──────────────────┬──────────────────────────┘
                   │
┌──────────────────▼──────────────────────────┐
│           APLICACIÓN LARAVEL                │
├─────────────────────────────────────────────┤
│  ┌─────────────┐  ┌──────────┐  ┌────────┐  │
│  │   Routes    │─▶│Controller│─▶│ Model  │  │
│  └─────────────┘  └─────┬────┘  └───-┬───┘  │
│                         │            │      │
│  ┌─────────────┐        │            │      │
│  │    View     │◀───────┘            │      │
│  │   (Blade)   │                     │      │
│  └─────────────┘                     │      │
└──────────────────────────────────────┼──────┘
                                       │
┌──────────────────────────────────────▼──────┐
│              BASE DE DATOS                  │
│                (MySQL)                      │
└─────────────────────────────────────────────┘
```

### 5.3 Diseño de Interfaces

#### Principios de Diseño
1. **Consistencia**: Componentes reutilizables
2. **Accesibilidad**: Contraste adecuado, navegación por teclado
3. **Feedback Visual**: Estados hover, transiciones suaves

#### Mapa del Sitio
```
Home (/)
├── Menús (/menus)
├── Platos (/platos)
│   ├── Pizzas (/pizzas)
│   ├── Pasta (/pasta)
│   └── Hamburguesas (/hamburguesas)
├── Buscar (/buscar)
├── Contacto (/contacto)
├── Login (/login)
├── Registro (/register)
└── [Autenticado]
    ├── Reservar (/reservas)
    ├── Mis Reservas (/mis-reservas)
    └── [Admin]
        ├── Dashboard (/admin/dashboard)
        ├── Gestión Platos (/platos/*)
        └── Gestión Reservas (/admin/reservas)
```

#### Mockups y Wireframes
Los diseños siguen las especificaciones del campeonato CLMSkills:
- Header fijo con navegación responsive
- Carrusel en página principal
- Grid de productos en 3 columnas
- Formularios con validación Bootstrap
- Modales para mensajes y cookies

### 5.4 Diagrama de Actividad - Proceso de Reserva

```
┌─────────────┐
│   INICIO    │
└──────┬──────┘
       │
       ▼
┌─────────────────┐     No     ┌──────────────┐
│ ¿Usuario        ├───────────▶│ Redirigir a  │
│ autenticado?    │            │    Login     │
└────────┬────────┘            └──────────────┘
         │ Sí
         ▼
┌─────────────────┐
│ Mostrar form    │
│ de búsqueda     │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Seleccionar:    │
│ - Fecha         │
│ - Turno         │
│ - Comensales    │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Buscar mesas    │
│ disponibles     │
└────────┬────────┘
         │
         ▼
┌─────────────────┐     No     ┌──────────────┐
│ ¿Hay mesas      ├───────────▶│ Mostrar msg  │
│ disponibles?    │            │ "Sin mesas"  │
└────────┬────────┘            └──────┬───────┘
         │ Sí                         │
         ▼                            ▼
┌─────────────────┐            ┌──────────────┐
│ Mostrar mesas   │            │ Volver a     │
│ disponibles     │            │ búsqueda     │
└────────┬────────┘            └──────────────┘
         │
         ▼
┌─────────────────┐
│ Seleccionar     │
│ mesa            │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Añadir          │
│ observaciones   │
│ (opcional)      │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Confirmar       │
│ reserva         │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Guardar en BD   │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ Mostrar         │
│ confirmación    │
└────────┬────────┘
         │
         ▼
┌─────────────┐
│     FIN     │
└─────────────┘
```

### 5.5 Diseño de Componentes

#### Componentes Blade Reutilizables
1. **header.blade.php**: Navegación principal con menú responsive
2. **footer.blade.php**: Pie de página con información y redes sociales
3. **cards.blade.php**: Tarjetas de productos con información completa
4. **dropdown.blade.php**: Menú desplegable para categorías
5. **carousel.blade.php**: Carrusel de imágenes principal
6. **modal-success.blade.php**: Modal de éxito para confirmaciones
7. **cookies-modal.blade.php**: Modal de aceptación de cookies LOPD

---

## 6. CODIFICACIÓN

### 6.1 Tecnologías y Justificación

#### Backend - Laravel 12
**Justificación**:
- Framework PHP más popular con gran comunidad
- Arquitectura MVC clara y escalable
- ORM Eloquent para gestión de BD
- Sistema de autenticación integrado
- Excelente documentación

#### Frontend - Tailwind CSS + Alpine.js
**Justificación**:
- Tailwind: Desarrollo rápido con utility classes
- Alpine.js: Reactividad sin complejidad de frameworks grandes
- Bundle size reducido
- Compatible con blade templates

#### Base de Datos - MySQL
**Justificación**:
- Madurez y estabilidad probada
- Excelente rendimiento para aplicaciones web
- Soporte nativo en Laravel
- Herramientas de administración maduras

### 6.2 Estructura del Código

#### Controladores Principales

**PlatosController.php**
```php
class PlatosController extends Controller
{
    // Gestión completa CRUD de platos
    // Métodos especializados por tipo
    // Validación integrada
    // Paginación automática
}
```

**ReservaController.php**
```php
class ReservaController extends Controller
{
    // Sistema de reservas con verificación de disponibilidad
    // Gestión de turnos y mesas
    // Historial de usuario
    // Panel admin de reservas
}
```

**MenuController.php**
```php
class MenuController extends Controller
{
    // Creación dinámica de menús
    // Asociación múltiple con platos
    // Visualización organizada
}
```

### 6.3 Seguridad Implementada

#### Autenticación y Autorización
- Sistema de sesiones seguras de Laravel
- Middleware AdminMiddleware para proteger rutas admin
- Verificación de roles en controladores

#### Protección contra Ataques
- **CSRF**: Token en todos los formularios
- **XSS**: Escape automático en Blade con `{{ }}`
- **SQL Injection**: Uso de Eloquent ORM y bindings
- **Mass Assignment**: Uso de `$fillable` en modelos

#### Validación de Datos
```php
// Ejemplo en PlatosController
$request->validate([
    'nombre' => 'required|string|max:255',
    'precio' => 'required|numeric|min:0.01',
    'tipo' => 'required|in:pizza,pasta,hamburguesa',
    'categoria_id' => 'required|exists:categorias,id'
]);
```

### 6.4 Funcionalidades Destacadas

#### Sistema de Búsqueda Avanzada
- Filtros combinables dinámicamente
- Búsqueda por múltiples criterios
- Paginación de resultados
- Persistencia de filtros en URL

#### Gestión de Alérgenos
- Relación many-to-many con platos
- Visualización con badges
- Filtrado en búsquedas
- Información destacada en cards

#### Modal de Cookies LOPD
- Implementación con Alpine.js
- Cookie persistente de aceptación
- Cumplimiento normativo
- UX no intrusiva

### 6.5 Optimizaciones

#### Rendimiento
- Eager loading de relaciones: `with(['categoria', 'alergenos'])`
- Paginación en todas las listas
- Compilación de assets con Vite
- Caché de configuración en producción

#### SEO y Accesibilidad
- Etiquetas semánticas HTML5
- Atributos ARIA donde corresponde
- Meta tags descriptivos
- URLs amigables

---

## 7. DESPLIEGUE

### 7.1 Entorno de Desarrollo

#### Requisitos
```bash
# Versiones mínimas
PHP >= 8.2
Composer >= 2.0
Node.js >= 18.0
MySQL >= 8.0
```

#### Instalación Local
```bash
# 1. Clonar repositorio
git clone https://github.com/pmontanana/TFG-DAW.git

# 2. Instalar dependencias
composer install
npm install

# 3. Configurar entorno
cp .env.example .env
php artisan key:generate

# 4. Base de datos
php artisan migrate
php artisan db:seed

# 5. Compilar assets
npm run build

# 6. Iniciar servidor
php artisan serve
```

### 7.2 Configuración de Producción

#### Servidor Web (Nginx)
```nginx
server {
    listen 80;
    server_name cafeteria.example.com;
    root /var/www/html/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }
}
```

#### Variables de Entorno (.env)
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tfg.pmontanana.es

DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=cafeteria_prod
DB_USERNAME=cafeteria_user
DB_PASSWORD=secure_password

MAIL_MAILER=mailgun
MAILGUN_DOMAIN=mg.cafeteria.com
MAILGUN_SECRET=key-xxxxx
```

### 7.3 Docker

#### Dockerfile
```dockerfile
FROM richarvey/nginx-php-fpm:latest

COPY . .

ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false

CMD ["/start.sh"]
```

#### docker-compose.yml
```yaml
version: '3.8'
services:
  app:
    build: .
    ports:
      - "80:80"
    environment:
      - DB_HOST=db
    depends_on:
      - db
  
  db:
    image: mysql:8.0
    environment:
      MYSQL_DATABASE: cafeteria
      MYSQL_ROOT_PASSWORD: root
    volumes:
      - mysql_data:/var/lib/mysql

volumes:
  mysql_data:
```

### 7.4 Proceso de Despliegue

#### Script Automatizado
```bash
#!/bin/bash
# scripts/deploy.sh

echo "🚀 Iniciando despliegue..."

# Actualizar código
git pull origin main

# Instalar dependencias
composer install --no-dev --optimize-autoloader
npm install && npm run build

# Actualizar base de datos
php artisan migrate --force

# Limpiar cachés
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Reiniciar servicios
sudo systemctl restart php8.2-fpm
sudo systemctl restart nginx

echo "Despliegue completado"
```

---

## 8. HERRAMIENTAS DE APOYO

### 8.1 Control de Versiones

#### Git/GitHub
- Repositorio: https://github.com/pmontanana/TFG-DAW
- Flujo de trabajo: Git Flow simplificado
- Ramas principales: main

### 8.2 Entorno de Desarrollo

#### PHP Storm
**Extensiones utilizadas**:
- PHP Intelephense
- Laravel Blade Snippets
- Tailwind CSS IntelliSense
- Alpine.js IntelliSense
- GitLens

### 8.3 Gestión de Dependencias

#### Composer (PHP)
```json
{
    "require": {
        "php": "^8.2",
        "laravel/framework": "^12.0",
        "barryvdh/laravel-dompdf": "^3.1"
    }
}
```

#### NPM (JavaScript)
```json
{
    "dependencies": {
        "alpinejs": "^3.0.0",
        "flowbite": "^3.1.2"
    },
    "devDependencies": {
        "tailwindcss": "^4.0.0",
        "vite": "^6.0.0"
    }
}
```

### 8.4 Documentación

#### Herramientas Utilizadas
- **Markdown**: Para README y documentación
- **Postman**: Documentación de rutas

---

## 9. GESTIÓN DE PRUEBAS

### 9.1 Plan de Pruebas

#### Tipos de Pruebas Realizadas
1. **Unitarias**: Modelos y helpers
2. **Integración**: Controladores y BD
3. **Funcionales**: Flujos completos
4. **Interfaz**: Navegación y formularios
5. **Rendimiento**: Carga y concurrencia
6. **Seguridad**: Vulnerabilidades comunes

### 9.2 Pruebas de Interfaz

#### Checklist Manual
- [x] Formularios con validación visual
- [x] Modales funcionan correctamente
- [x] Paginación mantiene filtros
- [x] Mensajes de éxito/error visibles
- [x] Imágenes cargan correctamente

---

## 10. CONCLUSIONES

### 10.1 Objetivos Alcanzados

 **Sistema de reservas completo**: Implementado con gestión de conflictos
***Catálogo digital con alérgenos**: Base de datos completa
 **Panel de administración**: CRUD completo y dashboard
 **Búsqueda avanzada**: Múltiples filtros combinables
 **Sistema de autenticación**: Roles y permisos
 **Integración email**: Envío de información
 **Cumplimiento LOPD**: Modal de cookies

### 10.2 Dificultades Encontradas

1. **Gestión de relaciones complejas**: Solucionado con eager loading
2. **Rendimiento con muchos alérgenos**: Optimizado con índices
3. **Validación en tiempo real**: Implementado con Alpine.js
4. **Diseño responsive del menú**: Resuelto con Flowbite

### 10.3 Aprendizajes Clave

- Importancia de la planificación inicial
- Valor de los componentes reutilizables
- Beneficios de la documentación actualizada
- Importancia de la experiencia de usuario

### 10.4 Posibles Mejoras

#### Corto Plazo
1. Sistema de notificaciones push
2. Integración con pasarelas de pago
3. API REST para aplicación móvil
4. Sistema de valoraciones
5. Gestión de pedidos online completa

#### Largo Plazo
1. Aplicación móvil nativa
2. Sistema de fidelización
3. Analytics y Business Intelligence
4. Integración con TPV
5. Multi-idioma
6. Multi-establecimiento

### 10.5 Valoración Personal

Este proyecto ha supuesto un reto integral que ha permitido aplicar todos los conocimientos adquiridos durante el ciclo formativo. La combinación de tecnologías modernas con buenas prácticas de desarrollo ha resultado en una aplicación robusta y escalable.

La experiencia de desarrollar un proyecto completo desde cero, incluyendo análisis, diseño, implementación y documentación, ha sido enormemente enriquecedora y ha confirmado mi pasión por el desarrollo web.

---

## 11. BIBLIOGRAFÍA

### Libros y Documentación Oficial

**Laravel Documentation**. Laravel 12.x. 2025. Disponible en: https://laravel.com/docs/12.x

**Tailwind CSS Documentation**. Tailwind CSS v4.0. 2025. Disponible en: https://tailwindcss.com/docs

**Alpine.js Documentation**. Alpine.js v3.x. 2025. Disponible en: https://alpinejs.dev/

**Otwell, Taylor**. Laravel: Up & Running. 3rd Edition. O'Reilly Media, 2023.

### Artículos y Recursos Online

**Povilaika, Povilas**. Laravel Daily - Advanced Laravel Tips. 2025. Disponible en: https://laraveldaily.com

**Hemphill, Adam**. Tailwind CSS Best Practices. 2024. Disponible en: https://tailwindcss.com/blog/best-practices

**OWASP Foundation**. OWASP Top Ten Web Application Security Risks. 2024. Disponible en: https://owasp.org/www-project-top-ten/

### Herramientas y Frameworks

**Flowbite Components**. Flowbite v3.1.2 Documentation. 2025. Disponible en: https://flowbite.com/docs

**Mailgun Technologies**. Mailgun API Documentation. 2025. Disponible en: https://documentation.mailgun.com

**MySQL**. MySQL 8.0 Reference Manual. Oracle Corporation, 2025. Disponible en: https://dev.mysql.com/doc/

### Normativas y Estándares

**W3C**. Web Content Accessibility Guidelines (WCAG) 2.1. 2018. Disponible en: https://www.w3.org/WAI/WCAG21/

**AEPD**. Guía sobre el uso de las cookies. Agencia Española de Protección de Datos, 2023. Disponible en: https://www.aepd.es/es/documento/guia-cookies.pdf

---

**Fecha de entrega**: Junio 2025

