# Asistente de Salud para Adultos Mayores 👴👵

Una aplicación web desarrollada con Laravel para ayudar a los adultos mayores a gestionar su medicación, registros de salud y citas médicas de una forma simple y accesible.

## ✨ Funcionalidades

* **Autenticación Segura:** Sistema de registro y login.
* **Dashboard Dinámico:** Muestra medicamentos pendientes del día y próximas citas.
* **Gestión de Medicamentos (CRUD):** Añade, edita, visualiza y elimina tus medicamentos.
* **Registro de Salud (CRUD):** Lleva un historial de tu peso, presión arterial y ritmo cardíaco.
* **Gestión de Recordatorios (CRUD):** Programa citas médicas y otros recordatorios.
* **Notificaciones de Navegador:** Alertas visuales para medicamentos y citas.

## 🚀 Tecnologías Utilizadas

* **Backend:** Laravel 10, PHP 8.2
* **Frontend:** Blade, CSS3, JavaScript
* **Base de Datos:** MySQL
* **Entorno de Desarrollo:** Laragon

## 🔧 Guía de Instalación Local

Sigue estos pasos para ejecutar el proyecto en tu máquina local.

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/TU_USUARIO/asistente-salud-laravel.git](https://github.com/TU_USUARIO/asistente-salud-laravel.git)
    cd asistente-salud-laravel
    ```

2.  **Instalar dependencias de PHP:**
    ```bash
    composer install
    ```

3.  **Configurar el entorno:**
    Copia el archivo de ejemplo para las variables de entorno.
    ```bash
    cp .env.example .env
    ```

4.  **Generar la clave de la aplicación:**
    ```bash
    php artisan key:generate
    ```

5.  **Configurar la base de datos:**
    Abre el archivo `.env` y añade los datos de tu base de datos local (crea una base de datos nueva para el proyecto).
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=asistente_salud_db
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6.  **Ejecutar las migraciones y los seeders:**
    Esto creará las tablas y las llenará con datos de prueba.
    ```bash
    php artisan migrate:fresh --seed
    ```

7.  **Instalar dependencias de Node.js y compilar assets:**
    ```bash
    npm install
    npm run dev
    ```

8.  **Iniciar el servidor:**
    Si usas Laragon, la URL (`http://asistente-salud-laravel.test`) ya debería funcionar. Si no, puedes usar:
    ```bash
    php artisan serve
    ```

9.  **Acceder a la aplicación:**
    * Visita la URL de tu proyecto.
    * Puedes iniciar sesión con el usuario de prueba:
        * **Email:** `test@example.com`
        * **Contraseña:** `password`
