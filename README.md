# Sistema de Gestión de Laboratorios SRL-UNS

Sistema web transaccional desarrollado en PHP con Laravel 11 para la reserva y administración de laboratorios. Cuenta con control de concurrencia para evitar cruces de horarios, protección estricta basada en roles y un módulo de auditoría automatizado.

## 🚀 Tecnologías
* **Backend:** Laravel 11, PHP 8+
* **Frontend:** Tailwind CSS, Blade, Vite (Diseño minimalista estilo Material/Apple)
* **Base de Datos:** MySQL
* **Autenticación:** Laravel Breeze
* **Reportes:** DOMPDF

## ⚙️ Requisitos Previos
Para ejecutar este proyecto en un entorno local, necesitas tener instalado:
* [Laragon](https://laragon.org/) o XAMPP (Para PHP y MySQL)
* [Composer](https://getcomposer.org/) (Gestor de dependencias de PHP)
* [Node.js](https://nodejs.org/) (Para compilar Tailwind CSS)
* [Git](https://git-scm.com/)

## 🛠️ Instalación y Configuración

**1. Clonar el repositorio**
```bash
git clone https://github.com/TU-USUARIO/sistema-reservas-laravel.git
cd sistema-reservas-laravel
```

**2. Instalar dependencias**
```bash
composer install
npm install
```

**3. Configurar variables de entorno**
Duplica el archivo `.env.example`, renómbralo a `.env` y genera la clave de la aplicación:
```bash
cp .env.example .env
php artisan key:generate
```
Abre el archivo `.env` y configura tu base de datos y drivers de sesión:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=reservasLab
DB_USERNAME=root
DB_PASSWORD=

# IMPORTANTE: Usar 'file' para evitar errores de tablas faltantes
SESSION_DRIVER=file
CACHE_STORE=file
```

**4. Crear base de datos, migrar y poblar**
Crea una base de datos vacía llamada `reservasLab` en tu gestor MySQL (ej. HeidiSQL). Luego ejecuta:
```bash
php artisan migrate --seed
```

**5. Compilar frontend y levantar el servidor**
Abre dos terminales y ejecuta:
```bash
# Terminal 1: Compila los estilos
npm run dev

# Terminal 2: Inicia el servidor de Laravel
php artisan serve
```
El proyecto estará disponible en `http://127.0.0.1:8000`.

## 👥 Credenciales de Prueba (Seeders)
El comando `--seed` genera automáticamente la estructura de laboratorios y los siguientes usuarios de prueba (Contraseña para todos: `password123`):
* **Admin:** `admin@uns.edu.pe` (Gestión total + CRUD de laboratorios)
* **Profesor:** `docente@uns.edu.pe` (Registra y cancela reservas)
* **Delegado:** `delegado@uns.edu.pe` (Registra y cancela reservas)
* **Supervisor:** `supervisor@uns.edu.pe` (Visualiza auditoría y exporta PDF)
* **Alumno:** `alumno@uns.edu.pe` (Solo lectura de disponibilidad)