# 🚀 Autenticación con Laravel Breeze y Sanctum

Este proyecto implementa autenticación de usuarios utilizando **Laravel Breeze** para la web y **Laravel Sanctum** para la API.

## 📌 Requisitos previos
- PHP 8.x
- Composer
- Laravel 12
- Base de datos MySQL/PostgreSQL/SQLite (según `.env`)
- Postman o una herramienta para probar la API

---

## ⚙️ Instalación del Proyecto

1️⃣ **Clonar el repositorio:**
```bash
git clone https://github.com/usuario/proyecto.git
cd proyecto
```

2️⃣ **Instalar dependencias:**
```bash
composer install
```

3️⃣ **Configurar el archivo .env:**
```bash
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=actividad2_Laravel
DB_USERNAME= (usuario con acceso a la bd)
DB_PASSWORD= (clave de usuario)
```

4️⃣ **Migrar la base de datos:**
```bash
php artisan migrate
```

5️⃣ **Iniciar el servidor de desarrollo:**
```bash
php artisan serve
```

---
## 🌱 Seeder - Usuario Administrador

Este proyecto incluye un **Seeder** para crear un usuario administrador por defecto.

- **Ubicación:** `database/seeders/DatabaseSeeder.php`
- **Datos del usuario generado:**
  - **Email:** `admin@gmail.com`
  - **Contraseña:** `admin123`

Si necesitas volver a ejecutar el Seeder manualmente, usa el siguiente comando:

```bash
php artisan db:seed --class=AdminSeeder
```

---

## 🔐 Rutas de la API

### 1️⃣ Registro de usuarios (API)
**URL:** `/api/register`  
**Método:** `POST`  
**Headers:**
```plaintext
Accept: application/json
Content-Type: application/json
```
**Body (JSON):**
```json
{
    "name": "Nuevo Usuario",
    "email": "nuevo@email.com",
    "password": "password123",
    "password_confirmation": "password123",
    "phone_number": "0987654321",
    "date_birth": "2000-01-01"
}
```
**Respuesta esperada:**
```json
{
    "user": {
        "id": 4,
        "name": "Nuevo Usuario",
        "email": "nuevo@email.com",
        "role": "guest",
        "phone_number": "0987654321",
        "date_birth": "2000-01-01"
    },
    "token": "3|jKlMnOpQrSt..."
}
```

### 2️⃣ Inicio de sesión y obtención de token
**URL:** `/api/login`  
**Método:** `POST`  
**Headers:**
```plaintext
Accept: application/json
Content-Type: application/json
```
**Body (JSON):**
```json
{
    "email": "admin@gmail.com",
    "password": "admin123"
}
```
**Respuesta esperada:**
```json
{
    "user": {
        "id": 3,
        "name": "admin",
        "email": "admin@gmail.com"
    },
    "token": "1|2aHFbO8M7..."
}
```

### 3️⃣ Obtener usuario autenticado
**URL:** `/api/user`  
**Método:** `GET`  
**Headers:**
```plaintext
Authorization: Bearer TOKEN_AQUI
Accept: application/json
Content-Type: application/json
```
**Respuesta esperada:**
```json
{
    "user": {
        "id": 3,
        "name": "admin",
        "email": "admin@gmail.com"
    },
    "message": "Acceso permitido con token"
}
```

### 4️⃣ Cerrar sesión y revocar el token
**URL:** `/api/logout`  
**Método:** `POST`  
**Headers:**
```plaintext
Authorization: Bearer TOKEN_AQUI
Accept: application/json
Content-Type: application/json
```
**Respuesta esperada:**
```json
{
    "message": "Cierre de sesión exitoso"
}
```

---

## 📌 Consideraciones

- Laravel Breeze maneja la autenticación web con sesiones y vistas en Blade.
- Laravel Sanctum maneja la autenticación API con tokens Bearer.
- El acceso a `/api/user` requiere un token válido generado en el login.
- Todas las rutas de la API están dentro del middleware `api`.
- La protección contra ataques de fuerza bruta está activada con `throttle`.

---

## 🎯 Autor
**Desarrollador:** Naythan Villafuerte 
**GitHub:** nayvilla  
**Fecha de entrega:** 15-03-2025  
