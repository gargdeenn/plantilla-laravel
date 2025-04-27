
# Proyecto Laravel con JWT Autenticación

Este proyecto está basado en Laravel y utiliza JWT (JSON Web Tokens) para la autenticación de los usuarios. A continuación se describen los pasos para ejecutar el proyecto, así como ejemplos de cómo realizar peticiones a las rutas protegidas.

## Requisitos Previos

- Tener instalado PHP >= 7.3
- Tener instalado Composer
- Tener instalado Laravel

## Paso 1: Configuración inicial

### 1.1. Generar la clave secreta JWT

Después de clonar el proyecto y configurar las dependencias, es necesario generar la clave secreta para JWT. Esto se logra ejecutando el siguiente comando:

```bash
php artisan jwt:secret
```

Este comando generará una clave secreta que se usará para firmar los tokens JWT.

### 1.2. Iniciar el servidor de desarrollo

Una vez que la clave JWT ha sido generada, podemos iniciar el servidor de desarrollo de Laravel con el siguiente comando:

```bash
php artisan serve
```

Esto arrancará el servidor en `http://127.0.0.1:8000`.

---

## Rutas y Ejemplos de Uso

### 2.1. **Crear Usuario**

**Ruta**: `POST /api/auth/user`

Esta ruta permite crear un nuevo usuario. Se necesita enviar los datos del usuario en el cuerpo de la solicitud:

**Formato del JSON**:

```json
{
    "first_name": "andres",
    "last_name": "pallares",
    "email": "a.pallares@gmail.com",
    "password": "23082001d",
    "role_id": 1
}
```

**Descripción**: Esta ruta crea un nuevo usuario en el sistema, asignando el rol mediante el `role_id` proporcionado.

---

### 2.2. **Iniciar Sesión**

**Ruta**: `POST /api/login`

Esta ruta permite a un usuario autenticarse y obtener un token JWT.

**Formato del JSON**:

```json
{
    "email": "d.santiago@gmail.com",
    "password": "23082001d"
}
```

**Descripción**: Al hacer login, se debe proporcionar el `email` y `password` del usuario. Si las credenciales son correctas, se devolverá un token JWT que deberá usarse para autenticar solicitudes futuras.

---

### 2.3. **Obtener Todos los Usuarios**

**Ruta**: `POST /api/auth/all-users`

Esta ruta devuelve todos los usuarios del sistema, con la posibilidad de incluir relaciones adicionales, como el rol del usuario.

**Formato del JSON**:

```json
{
    "relations": ["role"]
}
```

**Descripción**: Esta ruta devuelve todos los usuarios registrados en el sistema. El parámetro `relations` permite especificar las relaciones que deseas cargar junto con el usuario (en este caso, el rol).

---

### 2.4. **Obtener Usuario por ID**

**Ruta**: `POST /api/auth/user/{id}`

Esta ruta obtiene la información de un usuario específico, identificado por su ID. 

**Formato del JSON**:

```json
{
    "relations": ["role"]
}
```

**Descripción**: Permite obtener los detalles de un usuario específico, junto con las relaciones especificadas (por ejemplo, el rol del usuario).

---

### 2.5. **Buscar Usuario por Filtros**

**Ruta**: `POST /api/auth/get-user/`

Esta ruta permite buscar un usuario basado en los filtros proporcionados. 

**Formato del JSON**:

```json
{
    "filters": {
        "search": "andres"
    },
    "relations": []
}
```

**Descripción**: Este endpoint busca a los usuarios en base a los filtros proporcionados. En este ejemplo, se busca por el nombre "andres".

---

### 2.6. **Actualizar Usuario**

**Ruta**: `PUT /api/auth/user/{id}`

Esta ruta permite actualizar la información de un usuario específico, identificado por su ID.

**Formato del JSON**:

```json
{
    "first_name": "lino",
    "last_name": "santiago",
    "email": "l.tiago@gmail.com",
    "password": "23082001d",
    "role_id": 1
}
```

**Descripción**: Permite actualizar los detalles de un usuario. El ID del usuario se pasa como parte de la URL, y los nuevos datos deben enviarse en el cuerpo de la solicitud.

---

### 2.7. **Eliminar Usuario**

**Ruta**: `DELETE /api/auth/user/{id}`

Esta ruta permite eliminar un usuario específico, identificado por su ID.

**Formato del JSON**:

```json
{
    "first_name": "lino",
    "last_name": "santiago",
    "email": "l.tiago@gmail.com",
    "password": "23082001d",
    "role_id": 1
}
```

**Descripción**: Elimina un usuario específico del sistema, identificado por su ID.

---

## Seguridad (JWT)

Todas las rutas mencionadas anteriormente requieren un **token de autenticación**. Este token debe incluirse en el encabezado `Authorization` de cada solicitud:

### Ejemplo de encabezado con token:

```
Authorization: Bearer {tu_token_jwt}
```

El token se debe generar al autenticar al usuario en la ruta `/api/login` y se debe incluir en las solicitudes subsecuentes.

---

## composer.json

Este proyecto utiliza las siguientes dependencias:

```json
{
    "name": "laravel/laravel",
    "type": "project",
    "description": "The Laravel Framework.",
    "license": "MIT",
    "require": {
        "php": "^7.3|^8.0",
        "fruitcake/laravel-cors": "^2.0",
        "guzzlehttp/guzzle": "^7.0.1",
        "laravel/framework": "^8.75",
        "laravel/sanctum": "^2.11",
        "laravel/tinker": "^2.5",
        "tymon/jwt-auth": "^1.0"
    },
    "require-dev": {
        "facade/ignition": "^2.5",
        "fakerphp/faker": "^1.9.1",
        "laravel/sail": "^1.0.1",
        "mockery/mockery": "^1.4.4",
        "nunomaduro/collision": "^5.10",
        "phpunit/phpunit": "^9.5.10"
    }
}
```

## Licencia

El framework Laravel es un software de código abierto licenciado bajo la licencia [MIT](https://opensource.org/licenses/MIT).

## Autor
```
Diego Andres Santiago Pallares / Desarrollador FullStack / Laravel - Angular - MySql
---
Números de contacto: +57 3332525937 O +57 3114076057
---
GitHub: gargdeenn
---
Linkedin: www.linkedin.com/in/gargdeenn
---
Correo personal: dsantiagopallares@gmail.com
---