# 📇 API de Administración de Contactos y Entidades

API REST desarrollada en **Laravel 10** para la gestión de entidades y contactos dentro de una empresa.

El proyecto está estructurado aplicando buenas prácticas como separación por capas, uso de **FormRequest**, **DTOs** y **Services**, siguiendo principios SOLID y una arquitectura organizada.

---

## 🚀 Tecnologías Utilizadas

- PHP 8.1+
- Laravel 10
- MySQL
- Eloquent ORM
- FormRequest
- DTOs (Data Transfer Objects)
- Capa de Services

---

## 📁 Arquitectura

El proyecto está organizado por responsabilidades:

```bash
app/
 ├── DTOs/
 ├── Http/
 │    ├── Controllers/
 │    ├── Requests/
 ├── Models/
 ├── Services/
```

### Controllers

Reciben la petición HTTP y delegan la lógica de negocio al Service correspondiente.

### FormRequest

Centralizan las reglas de validación y mantienen los controladores desacoplados.

### DTOs

Encapsulan los datos transferidos entre capas para evitar acoplamientos innecesarios.

### Services

Contienen la lógica de negocio de la aplicación, permitiendo un código mantenible y escalable.

---

## 🧩 Funcionalidades

### Entidades

- Crear entidad
- Listar entidades
- Actualizar entidad
- Eliminar entidad

### Contactos

- Crear contacto
- Listar contactos
- Actualizar contacto
- Eliminar contacto
- Asociar contactos a una entidad

---

## ⚙️ Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/tu-repo.git
cd tu-repo
```

### 2. Instalar dependencias

```bash
composer install
```

### 3. Configurar variables de entorno

```bash
cp .env.example .env
```

Editar el archivo `.env` y configurar la conexión a MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generar clave de aplicación

```bash
php artisan key:generate
```

### 5. Ejecutar migraciones

```bash
php artisan migrate
```

### 6. Levantar el servidor

```bash
php artisan serve
```

La API estará disponible en:

```
http://127.0.0.1:8000
```

---

## 📡 Endpoints

### Entidades

```
GET     /api/entities
GET     /api/entities/{id}
POST    /api/entities
PUT     /api/entities/{id}
POST  /api/entities/deleteAll
```

### Contactos

```
GET     /api/contacts
GET     /api/contacts/{id}
POST    /api/contacts
PUT     /api/contacts/{id}
DELETE  /api/contacts/{id}
```

---

## 👨‍💻 Autor

Proyecto desarrollado como implementación de arquitectura backend organizada en Laravel 10.
