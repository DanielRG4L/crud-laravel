# Curso CRUD — Gestión de productos

Aplicación web de gestión de productos desarrollada con Laravel 13. Este proyecto demuestra la implementación de operaciones CRUD, validación de datos, búsqueda, filtros y paginación, con despliegue en un entorno de producción.

## Demo

**Aplicación en línea:** https://crud-laravel-ir1t.onrender.com

**Código fuente:** https://github.com/DanielRG4L/crud-laravel

## Funcionalidades

- Dashboard con estadísticas de productos.
- Registro, listado, consulta, edición y eliminación de productos.
- Búsqueda de productos por nombre.
- Filtros por rango de precios.
- Paginación de resultados.
- Validación de datos antes de guardarlos.
- Interfaz adaptable a diferentes tamaños de pantalla.

## Tecnologías

- PHP 8.4 en el contenedor de producción.
- Laravel 13.
- PostgreSQL.
- Blade y Tailwind CSS.
- JavaScript y Vite.
- Git y GitHub.
- Docker para el despliegue.
- Render para alojar la aplicación y Neon para la base de datos.

## Requisitos para desarrollo local

- PHP compatible con Laravel 13 y sus extensiones requeridas.
- Composer.
- Node.js y npm.
- Una base de datos compatible con la configuración de Laravel.
- Git.

## Instalación local

### 1. Clonar el repositorio

```bash
git clone https://github.com/DanielRG4L/crud-laravel.git
cd crud-laravel
```

### 2. Instalar dependencias

```bash
composer install
npm install
```

### 3. Configurar el entorno

Copia `.env.example` como `.env` y configura las variables de entorno de tu base de datos local.

```bash
php artisan key:generate
```

### 4. Ejecutar las migraciones

Verifica que la conexión a la base de datos esté configurada correctamente y ejecuta:

```bash
php artisan migrate
```

### 5. Compilar los recursos frontend

```bash
npm run build
```

### 6. Iniciar la aplicación

```bash
php artisan serve
```

Abre http://127.0.0.1:8000 en tu navegador.

## Despliegue

La aplicación está desplegada en Render y utiliza PostgreSQL alojado en Neon. La configuración de producción se administra mediante variables de entorno.

No publiques credenciales, contraseñas, claves de aplicación ni archivos `.env` con información sensible.

## Objetivo del proyecto

Proyecto personal de aprendizaje que permite demostrar conocimientos prácticos de Laravel, PHP, Eloquent ORM, migraciones, controladores, rutas, vistas Blade, validación y despliegue web.

## Autor

Daniel Guerra — Desarrollo web con Laravel y PHP.

## Licencia

Consulta los términos de licencia definidos para este proyecto antes de reutilizar o distribuir su código.
