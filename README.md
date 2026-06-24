# 🛒 Mi Tienda Online - Proyecto Laravel

## 📋 Descripción

Mi Tienda Online es una aplicación web desarrollada con Laravel que permite la gestión de productos, categorías, usuarios y pedidos, incluyendo un sistema de carrito de compras dinámico y panel administrativo.

El sistema cuenta con diferentes funcionalidades para clientes y administradores, permitiendo realizar compras, administrar inventario y gestionar pedidos.

---

# 🚀 Tecnologías Utilizadas

## Backend

* Laravel 12
* PHP 8.2
* MySQL
* Eloquent ORM

## Frontend

* Blade Templates
* HTML5
* Tailwind CSS
* JavaScript
* AJAX (Fetch API)
* SweetAlert2

## Herramientas

* Vite
* Git
* GitHub
* AdminLTE

---

# 👥 Gestión de Usuarios

El sistema permite administrar usuarios con diferentes roles:

### Administrador

* Crear usuarios
* Editar usuarios
* Eliminar usuarios
* Gestionar productos
* Gestionar categorías
* Gestionar pedidos

### Cliente

* Iniciar sesión
* Ver productos
* Agregar productos al carrito
* Realizar compras
* Consultar su perfil

---

# 🧑 Perfil de Usuario

Cada usuario cuenta con información personalizada:

* Nombre
* Apellidos
* DNI
* Teléfono
* Género
* Correo electrónico
* Foto de perfil

---

# 📦 Gestión de Productos

Los administradores pueden:

* Crear productos
* Editar productos
* Eliminar productos
* Subir imágenes
* Administrar stock
* Asignar categorías

Cada producto contiene:

* Nombre
* Descripción
* Precio
* Stock
* Imagen
* Categoría

---

# 🗂️ Categorías

El sistema permite:

* Crear categorías
* Editar categorías
* Eliminar categorías
* Filtrar productos por categoría

Las categorías aparecen en el menú principal para facilitar la navegación.

---

# 🛒 Carrito de Compras

Funcionalidades implementadas:

* Agregar productos mediante AJAX
* Actualización dinámica sin recargar la página
* Carrito lateral deslizante
* Contador de productos en tiempo real
* Eliminación de productos
* Cálculo automático del total

---

# 💳 Sistema de Compras

Proceso de compra:

1. Selección de productos
2. Agregado al carrito
3. Checkout
4. Confirmación de pedido
5. Registro en base de datos
6. Actualización automática de stock

---

# 📄 Gestión de Pedidos

El sistema registra:

* Pedido
* Cliente
* Fecha
* Total
* Estado del pedido

Estados disponibles:

* Pendiente
* Aprobado
* Rechazado

Además se almacena el detalle completo de cada pedido.

---

# 🔔 Notificaciones

Se implementaron notificaciones utilizando SweetAlert2 para:

* Producto agregado al carrito
* Compra realizada correctamente
* Mensajes de éxito
* Mensajes de error

---

# 🗄️ Base de Datos

Tablas principales:

### users

Información de usuarios.

### categorias

Categorías de productos.

### productos

Productos registrados en la tienda.

### pedidos

Compras realizadas por los clientes.

### detalle_pedidos

Detalle de cada producto comprado.

---

# 🔐 Seguridad

Se utiliza:

* Middleware auth
* Autenticación Laravel
* Protección CSRF
* Validación de formularios

---

# 📷 Funcionalidades Destacadas

✅ Login de usuarios

✅ Gestión de usuarios

✅ Gestión de categorías

✅ Gestión de productos

✅ Subida de imágenes

✅ Control de stock

✅ Carrito AJAX

✅ Contador dinámico del carrito

✅ Checkout

✅ Registro de pedidos

✅ Detalle de pedidos

✅ Perfil de usuario

✅ Notificaciones SweetAlert2

✅ Panel Administrativo AdminLTE

---

# 📂 Estructura Principal del Proyecto

```text
app/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
│
resources/
├── views/
│   ├── layouts/
│   ├── partials/
│   ├── productos.blade.php
│   ├── categoria.blade.php
│   ├── profile.blade.php
│
routes/
├── web.php

database/
├── migrations/
```

---

# ⚙️ Instalación

```bash
git clone https://github.com/Domnguz/ProyectoMerino-Mitienda.git

cd ProyectoMerino-Mitienda

composer install

npm install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan storage:link

npm run dev

php artisan serve
```

---

# 📌 Estado Actual del Proyecto

Proyecto en desarrollo.

Próximas mejoras:

* Dashboard de ventas
* Gráficos estadísticos
* Historial de pedidos del cliente
* Mejoras visuales del perfil
* Reportes administrativos

---

# 👨‍💻 Autor

David Domínguez Valdiviezo

Proyecto académico desarrollado con Laravel, Tailwind CSS, JavaScript y MySQL.
