# Cafetería CLMSkills 2025

Aplicación web para la gestión de una cafetería desarrollada como Trabajo de Fin de Grado del CFGS de Desarrollo de Aplicaciones Web. El proyecto será presentado en las CLMSkills 2025.

## 📋 Índice

- [Descripción](#descripción)
- [Características](#características)
- [Tecnologías](#tecnologías)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Uso](#uso)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Base de Datos](#base-de-datos)
- [Funcionalidades Principales](#funcionalidades-principales)
- [API y Rutas](#api-y-rutas)
- [Testing](#testing)
- [Despliegue](#despliegue)
- [Contribución](#contribución)
- [Licencia](#licencia)
- [Contacto](#contacto)

## 📝 Descripción

Sistema web completo para la gestión de una cafetería que permite a los usuarios explorar menús, ver platos por categoría, realizar reservas de mesas y gestionar pedidos. Incluye un panel de administración para la gestión completa del negocio.

## ✨ Características

### Para Usuarios
- 🍕 Navegación por categorías de platos (Pizzas, Pasta, Hamburguesas)
- 🔍 Buscador avanzado con filtros por tipo, categoría, alérgenos y precio
- 📅 Sistema de reservas de mesas con selección de turno y fecha
- 🛒 Carrito de compra para pedidos (solo productos marcados para llevar)
- 👤 Sistema de autenticación y registro de usuarios
- 📧 Envío de información de platos por correo electrónico

### Para Administradores
- 📊 Dashboard con estadísticas en tiempo real
- 🍽️ CRUD completo de platos con gestión de alérgenos y categorías
- 📋 Creación y gestión de menús
- 📅 Gestión de reservas y visualización de ocupación
- 👥 Gestión de usuarios y roles
- 📄 Generación de PDFs (próximamente)

### Características Técnicas
- 🔒 Autenticación segura con roles (usuario/admin)
- 🍪 Gestión de cookies LOPD con modal informativo
- ✅ Validación de formularios en cliente y servidor
- 📨 Sistema de notificaciones y mensajes de éxito
- 🎨 Componentes reutilizables con Blade

## 🛠️ Tecnologías

### Backend
- **Laravel 12** - Framework PHP
- **MySQL** - Base de datos relacional
- **PHP 8.2+** - Lenguaje de programación

### Frontend
- **Tailwind CSS 4** - Framework CSS utility-first
- **Alpine.js 3** - Framework JavaScript reactivo
- **Flowbite** - Componentes UI basados en Tailwind
- **Blade** - Motor de plantillas de Laravel

### Herramientas
- **Composer** - Gestor de dependencias PHP
- **NPM** - Gestor de paquetes JavaScript
- **Vite** - Build tool para assets frontend
- **Mailgun** - Servicio de envío de correos
- **Docker** - Contenedorización (opcional)

## 📋 Requisitos

- PHP >= 8.2
- Composer >= 2.0
- Node.js >= 18.0
- NPM >= 9.0
- MySQL >= 8.0
- Extensiones PHP requeridas:
  - BCMath
  - Ctype
  - JSON
  - Mbstring
  - OpenSSL
  - PDO
  - PDO_MySQL
  - Tokenizer
  - XML

## 🚀 Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/pmontanana/TFG-DAW.git
cd TFG-DAW
```

### 2. Instalar dependencias
```bash
# Instalar dependencias de PHP
composer install

# Instalar dependencias de JavaScript
npm install
```

### 3. Configurar el entorno
```bash
# Copiar archivo de configuración
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### 4. Configurar la base de datos
Editar el archivo `.env` con tus credenciales:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cafeteria_clmskills
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

### 5. Ejecutar migraciones
```bash
# Crear las tablas
php artisan migrate
```

### 6. Compilar assets
```bash
# Para producción
npm run build
```

## ⚙️ Configuración

### Configuración de Correo (Mailgun)
En el archivo `.env`:
```env
MAIL_MAILER=mailgun
MAILGUN_DOMAIN=tu_dominio_mailgun
MAILGUN_SECRET=tu_api_key_mailgun
```

### Usuarios de Prueba
El seeder crea los siguientes usuarios:
- **Admin**: admin@cafeteria.com / 12345678
- **Usuario**: pmon@cafeteria.com / 12345678

## 💻 Uso

### Desarrollo
Para iniciar todos los servicios necesarios:
```bash
composer run dev
```

Este comando iniciará:
- Servidor Laravel (puerto 8000)
- Vite para compilación de assets
- Queue worker para trabajos en segundo plano
- Laravel Pail para logs en tiempo real

### Acceso a la aplicación
- **Frontend**: http://localhost:8000
- **Panel Admin**: http://localhost:8000/admin

## 📁 Estructura del Proyecto

```
proyecto-tfg/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Controladores de la aplicación
│   │   └── Middleware/       # Middleware personalizado
│   ├── Models/              # Modelos Eloquent
│   └── Mail/                # Clases de correo
├── database/
│   ├── migrations/          # Migraciones de base de datos
│   └── seeders/            # Seeders con datos de prueba
├── resources/
│   ├── views/              # Vistas Blade
│   │   ├── components/     # Componentes reutilizables
│   │   ├── admin/          # Vistas del panel admin
│   │   └── reservas/       # Vistas de reservas
│   ├── css/                # Estilos CSS
│   └── js/                 # JavaScript
├── routes/
│   └── web.php             # Rutas de la aplicación
├── public/                 # Archivos públicos
└── storage/                # Almacenamiento de archivos
```

## 🗄️ Base de Datos

### Esquema Principal
- **users**: Usuarios del sistema (con roles)
- **platos**: Catálogo de productos
- **categorias**: Categorías de platos
- **alergenos**: Lista de alérgenos
- **menus**: Menús disponibles
- **mesas**: Mesas del restaurante
- **turnos**: Turnos de servicio
- **reservas**: Reservas de mesas
- **contactos**: Mensajes de contacto

### Relaciones
- Platos ↔ Categorías (N:1)
- Platos ↔ Alérgenos (N:M)
- Menús ↔ Platos (N:M)
- Usuarios → Reservas (1:N)
- Reservas → Mesas, Turnos (N:1)

## 🎯 Funcionalidades Principales

### Sistema de Reservas
- Selección de fecha y turno
- Búsqueda de mesas disponibles según capacidad
- Confirmación de reserva con detalles
- Historial de reservas por usuario

### Gestión de Platos
- CRUD completo con validación
- Gestión de alérgenos múltiples
- Categorización de productos
- Indicador de disponibilidad para llevar
- Imágenes desde URLs externas

### Buscador Avanzado
- Filtros por tipo de plato
- Filtros por categoría
- Filtros por alérgenos
- Rango de precios
- Paginación de resultados

### Menús Dinámicos
- Creación de menús con múltiples platos
- Visualización organizada
- Gestión desde panel admin

## 🛣️ API y Rutas

### Rutas Públicas
- `GET /` - Página principal
- `GET /menus` - Lista de menús
- `GET /platos` - Todos los platos
- `GET /pizzas` - Solo pizzas
- `GET /pasta` - Solo pasta
- `GET /hamburguesas` - Solo hamburguesas
- `GET /buscar` - Buscador
- `GET /contacto` - Formulario de contacto

### Rutas Autenticadas
- `GET /reservas` - Hacer reserva
- `GET /mis-reservas` - Ver mis reservas
- `GET /platos/correo` - Enviar platos por email

### Rutas Admin
- `GET /admin/dashboard` - Panel principal
- `GET /admin/reservas` - Gestión de reservas
- Rutas CRUD de platos

## 🚢 Despliegue

### Docker
El proyecto incluye configuración Docker:
```bash
docker build -t cafeteria-app .
docker run -p 80:80 cafeteria-app
```

## 🤝 Contribución

Este es un proyecto académico. Para contribuir:
1. Fork el proyecto
2. Crea una rama (`git checkout -b feature/nueva-caracteristica`)
3. Commit los cambios (`git commit -m 'Añadir nueva característica'`)
4. Push a la rama (`git push origin feature/nueva-caracteristica`)
5. Abre un Pull Request

## 📄 Licencia

Mirar archivo LICENSE.

## 📧 Contacto

**Pablo Montañana**
- Email: pablomontanana@gmail.com
- GitHub: [pmontanana](https://github.com/pmontanana)
- LinkedIn: [pmontanana](https://www.linkedin.com/in/pmontanana/)

---

Desarrollado con ❤️ para el CFGS DAW y CLMSkills 2025

