<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Reto Backend - Marco Antonio Sotomayor Lopez

### Requisitos

* Laravel 8
* Mysql

### Instalación

Clonar el respositorio ejecute.

```sh
> git clone https://github.com/marco121942/reto-backend.git
```

Instalar dependencias composer.

```sh
> composer install
```

### Variables de entorno

Modifique los valores por defecto de `.env`, para la correcta ejecución del proyecto, los principales valores que tiene que modificar son la base de datos y el proveedor de correos.

```sh
> cp .env.example .env
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
> php artisan migrate
```
```sh
> php artisan db:seed
```

#### Ejecutar proyecto

```sh
> php artisan serve 
```
### Servicios realizados

* {{APP_URL_DEV}}/api/auth/register - "registro de usuario"
* {{APP_URL_DEV}}/api/auth/login - "inicio de sesión"
* {{APP_URL_DEV}}/api/group - "listado de grupos"
* {{APP_URL_DEV}}/api/group/addUser - "unirse a un grupo"
* {{APP_URL_DEV}}/api/note - "publicar una nota y envia un correo alos miembros del grupo"
* {{APP_URL_DEV}}/api/auth/perfil - "perfil del usuario donde se muestra los grupos al cual pertenece"
* {{APP_URL_DEV}}/api/note/filter?has_image=1&date_final=2022-09-27&date_initial=2022-09-27 - "filtrado de notas por rango de flechas y si contiene alguna imagen"


