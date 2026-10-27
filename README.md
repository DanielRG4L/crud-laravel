# Curso CRUD — Gestión de productos

Aplicación web desarrollada con **Laravel 13** como proyecto práctico para aprender desarrollo web moderno con PHP, MySQL, Blade y Tailwind CSS.

El sistema permite administrar productos desde una interfaz moderna, con operaciones CRUD, búsqueda, filtros y un dashboard con estadísticas.

## Funcionalidades

- **Dashboard:** resumen y estadísticas de productos.
- **Gestión de productos:** crear, listar, consultar, editar y eliminar.
- **Búsqueda:** localizar productos por nombre.
- **Filtros por precio:** establecer precios mínimos y máximos.
- **Paginación:** organizar los resultados.
- **Validación:** verificar los datos antes de guardarlos.
- **Interfaz moderna:** componentes reutilizables y diseño adaptable.

## Tecnologías

- PHP
- Laravel 13
- MySQL
- Blade
- Tailwind CSS
- Vite
- JavaScript
- Git y GitHub

## 📋 Requisitos

- PHP compatible con Laravel 13 y sus extensiones requeridas.
- Composer.
- Node.js y npm.
- MySQL.
- Git.

## Instalación

### 1. Clonar el repositorio

```bash
git clone URL_DEL_REPOSITORIO
cd curso-crud
```

### 2. Instalar dependencias

```bash
composer install
npm install
```

### 3. Configurar el entorno

Copia `.env.example` y crea un archivo llamado `.env`.

En Windows puedes hacerlo manualmente o ejecutar:

```bash
cp .env.example .env
```

Genera la clave de la aplicación:

```bash
php artisan key:generate
```

### 4. Configurar la base de datos

Crea una base de datos MySQL y configura en `.env` las variables correspondientes:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

Sustituye los valores de ejemplo por los de tu entorno local.

### 5. Ejecutar las migraciones

```bash
php artisan migrate
```

### 6. Compilar los recursos del frontend

```bash
npm run build
```

### 7. Iniciar el servidor

```bash
php artisan serve
```

Abre `http://127.0.0.1:8000` en tu navegador.

## Objetivo del proyecto

Practicar los fundamentos de Laravel mediante una aplicación funcional, aplicando rutas, controladores, modelos Eloquent, migraciones, validación, vistas Blade y operaciones CRUD.

## Autor

Proyecto personal de aprendizaje y práctica de desarrollo web con Laravel.

## Licencia

Este proyecto es de carácter educativo. Laravel utiliza la licencia MIT; la licencia de este proyecto debe definirse por separado si deseas distribuirlo formalmente.
