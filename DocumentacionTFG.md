# Documentación del Proyecto - Cafetería CLMSkills 2025

## Descripción General
Este proyecto es una aplicación web basada en Laravel para una cafetería que permite a los usuarios explorar menús, ver platos por categoría, realizar reservas y ofrece funcionalidades de autenticación. La aplicación incluye características para generar PDFs de platos y enviarlos por correo electrónico.

## Componentes Principales

### Controladores

#### PlatosController
Gestiona todas las operaciones relacionadas con los platos.

- **Métodos principales**:
    - `index()`: Muestra lista paginada de platos (6 por página)
    - `create()`: Muestra formulario de creación de platos
    - `store()`: Valida y guarda nuevos platos
    - `edit()`: Muestra formulario de edición para un plato específico
    - `update()`: Actualiza información del plato
    - `destroy()`: Elimina un plato
    - `showHamburguesas()`: Muestra solo hamburguesas
    - `showPasta()`: Muestra solo platos de pasta
    - `showPizzas()`: Muestra solo pizzas
    - `platosHome()`: Organiza platos por tipo para la página principal
    - `generarPDF()`: Genera documento PDF con todos los platos
    - `platosPorCorreo()`: Envía lista de platos por correo

### Vistas

#### Componentes de Diseño
- `resources/views/components/header.blade.php`: Menú de navegación con diseño responsive
- `resources/views/components/footer.blade.php`: Pie de página del sitio
- `resources/views/components/carousel.blade.php`: Carrusel de imágenes para la página principal
- `resources/views/components/cards.blade.php`: Componente reutilizable de tarjetas para mostrar platos

#### Vistas Principales
- `resources/views/home.blade.php`: Página principal que muestra los platos más nuevos con paginación
- `resources/views/platosHome.blade.php`: Muestra platos organizados por categoría
- `resources/views/platosHamb.blade.php`: Muestra hamburguesas
- `resources/views/platosPasta.blade.php`: Muestra platos de pasta
- `resources/views/platosPizzas.blade.php`: Muestra pizzas
- `resources/views/PDFPlatos.blade.php`: Plantilla para generación de PDF

### Modelos

#### Platos
Representa un plato con los siguientes atributos:
- `nombre`: Nombre del plato
- `descripcion`: Descripción
- `imagen`: URL de la imagen del plato
- `precio`: Precio
- `tipo`: Tipo de plato (hamburguesa, pasta, pizza)

#### Usuarios
Representa un plato con los siguientes atributos:
- `nombre`: Nombre del usuario
- `email`: Email del usuario
- `contraseña `: Contraseña del usuario

## Funcionalidades

### Autenticación de Usuario
- Funcionalidad de registro e inicio de sesión
- Elementos de interfaz condicionales según estado de autenticación

### Gestión de Platos
- Ver platos por categoría (hamburguesas, pasta, pizza)
- Visualización paginada de platos
- Operaciones CRUD para platos (funcionalidad de administrador)

### Generación de PDF
- Descargar PDF de platos disponibles

### Funcionalidad de Correo Electrónico
- Enviar lista de platos por correo

### Diseño Responsivo
- Navegación adaptada a dispositivos móviles
- Diseño adaptable utilizando Tailwind CSS

## Tecnologías Utilizadas

- **Backend**: Framework Laravel PHP
- **Frontend**:
    - Tailwind CSS
    - AlpineJS
    - Componentes Flowbite
- **Otras Herramientas**:
    - Generación de PDF (barryvdh/laravel-dompdf)
    - Laravel Mail para funcionalidad de correo

## Rutas

Rutas principales de la aplicación:
- `/`: Página principal con los platos más nuevos
- `/menus`: Visualización de menú
- `/platos/*`: Varias vistas de categorías de platos
- `/contacto`: Página de contacto
- `/login` y `/register`: Páginas de autenticación
- `/platos/pdf`: Punto de acceso para generación de PDF
