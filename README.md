<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Reto Backend - Marco Antonio Sotomayor Lopez

### Requisitos

* Laravel 8
* Mysql

### Instalación

Clonar el respositorio ejecute.

```sh
 git clone https://github.com/marco121942/reto-backend.git
```
```sh
  cd reto-backend
```

Instalar dependencias composer.

```sh
 composer install
```

### Variables de entorno

Modifique los valores por defecto de `.env`, para la correcta ejecución del proyecto, los principales valores que tiene que modificar son la base de datos y el proveedor de correos.

```sh
 cp .env.example .env
```
```json
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

### Base de datos

Ejecute el siguiente comando para la creación de la base de datos.

```sh
 php artisan migrate
```
```sh
 php artisan db:seed
```

#### Ejecutar proyecto

```sh
 php artisan serve 
```
### Servicios realizados

* 'POST' {{APP_URL_DEV}}/api/auth/register - "registro de usuario"
* 'POST' {{APP_URL_DEV}}/api/auth/login - "inicio de sesión"
* 'GET' {{APP_URL_DEV}}/api/group - "listado de grupos"
* 'POST' {{APP_URL_DEV}}/api/group/addUser - "unirse a un grupo"
* 'POST' {{APP_URL_DEV}}/api/note - "publicar una nota y envia un correo alos miembros del grupo"
* 'POST' {{APP_URL_DEV}}/api/auth/perfil - "perfil del usuario donde se muestra los grupos al cual pertenece"
* 'GET'{{APP_URL_DEV}}/api/note/filter?has_image=1&date_final=2022-09-27&date_initial=2022-09-27 - "filtrado de notas por rango de flechas y si contiene alguna imagen"

### Ver una imagen de un grupo

Al momento de utilizar el servicio de filtrado de notas , si la nota contiene una imagen se le mostrara una ruta la cual debe copiar y pegar y realizar un get de a la ruta de la imagen , EJM:

```sh
> {
    "success": true,
    "message": "Resultados del filtrado",
    "data": [
        {
            "id": 67,
            "user_id": 1,
            "group_id": 2,
            "title": "titulo",
            "description": "descipcion",
            "created_at": "2022-09-27T04:56:35.000000Z",
            "updated_at": "2022-09-29T04:56:35.000000Z",
            "images": [
                {
                    "id": 62,
                    "note_id": 67,
                    "url": "images/upload/yfHtd6SYK5t5dbguzeyh.jpg"
                }
            ]
        }
    ]
}
```

### Servicio para ver la imagen - "GET"
```sh
 {{APP_URL_DEV}}/images/upload/yfHtd6SYK5t5dbguzeyh.jpg
```

### Envio de una notificación al correo, de una nueva Nota

![notification-note-email](https://user-images.githubusercontent.com/42647311/192960045-ff4bd438-1712-4e60-96f2-9a89107d4ba0.PNG)
