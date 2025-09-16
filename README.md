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

### **Paso 0: Requisitos Previos - Instalar Laragon y Crear la Base de Datos**

Antes de clonar el proyecto, necesitas un entorno de desarrollo local. Laragon es la opción más sencilla y completa.

#### **A. Instalar Laragon**

1.  **Descarga Laragon:** Ve a la página oficial de descargas: [https://laragon.org/download/](https://laragon.org/download/)
2.  **Elige la edición "Full":** Esta versión incluye todo lo que necesitas (Apache, MySQL, PHP, Node.js, etc.).
3.  **Instala:** Ejecuta el instalador y sigue el asistente. Es un proceso simple de "siguiente, siguiente, siguiente".
4.  **Inicia los servicios:** Una vez instalado, abre Laragon y haz clic en el botón **"Iniciar Todo"**. Esto activará los servidores Apache y MySQL, que se pondrán en color verde. 

#### **B. Crear la Base de Datos**

Laragon incluye HeidiSQL, un gestor de bases de datos muy fácil de usar.

1.  En la ventana de Laragon, haz clic en el botón **"Base de datos"**.
2.  Se abrirá HeidiSQL. En el panel de la izquierda, haz clic derecho sobre tu conexión (usualmente tiene el nombre de tu PC o `root@127.0.0.1`).
3.  Selecciona `Crear nuevo` > `Base de datos`.
4.  En el campo del nombre, escribe `asistente_salud_db` (o el nombre que vayas a usar en tu archivo `.env`) y haz clic en "Aceptar".

¡Listo! La base de datos está creada y vacía, preparada para que Laravel la configure.

---
### **Paso 1: Clonar el Repositorio**

```bash
git clone [https://github.com/wforeros1/taller_inteligentes.git](https://github.com/wforeros1/taller_inteligentes.git)
cd taller_inteligentes
```

### **Paso 2: Instalar Dependencias de PHP**

```bash
composer install
```

### **Paso 3: Configurar el Entorno**

Copia el archivo de ejemplo para las variables de entorno.

```bash
cp .env.example .env
```

### **Paso 4: Generar la Clave de la Aplicación**

```bash
php artisan key:generate
```

### **Paso 5: Instalar Laravel Breeze (Autenticación)**

Este paso es crucial para configurar el sistema de autenticación (login, registro).

```bash
composer require laravel/breeze --dev
php artisan breeze:install
```

Cuando te pregunte el stack, elige **Blade**.

### **Paso 6: Configurar la Base de Datos en el Proyecto**

Abre el archivo `.env` y asegúrate de que los datos coincidan con tu base de datos creada en el Paso 0.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=asistente_salud_db
DB_USERNAME=root
DB_PASSWORD=
```

### **Paso 7: Ejecutar las Migraciones y los Seeders**

Esto creará las tablas y las llenará con datos de prueba.

```bash
php artisan migrate:fresh --seed
```

### **Paso 8: Instalar Dependencias de Node.js y Compilar Assets**

```bash
npm install
npm run dev
```

### **Paso 9: Iniciar el Servidor**

Laragon crea automáticamente una URL amigable para ti. Búscala haciendo clic derecho en el ícono de Laragon en la barra de tareas > `www` > `tu_proyecto`. Usualmente será `http://taller_inteligentes.test`.

Si prefieres el método tradicional de Laravel:

```bash
php artisan serve
```

### **Paso 10: Acceder a la Aplicación**

* Visita la URL de tu proyecto.
* Puedes iniciar sesión con el usuario de prueba:
    * **Email:** `lopez@example.com`
    * **Contraseña:** `password123`
* O crear uno nuevo.
