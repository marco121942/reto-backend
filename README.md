# Cunsac

Empresa que brinda un servicio personalizado para ayudarte a diseñar e implementar una oficina ideal.

### Requisitos

Tecnologías necesarias para el correcto funcionamiento de la aplicación:

* PHP 7.3.0 >=
* NodeJS 12.x
* MariaDB o Mysql

### Instalación

Clonar el respositorio ejecute.

```sh
> git clone https://gitlab.com/techie-lab/cunsac
```

Instalar dependencias composer.

```sh
> composer install
```

Instalar los paquetes NPM requeridos.

```sh
> npm install
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

### Despliegue

Ejecute los siguientes comandos para el correcto funcionamiento del proyecto.


#### Laravel

Para el correcto funcionamiento de la autenticación configure los siguientes parámetros en el archivo `.env`.

Para desarrollo es recomendable usar localhost, si usa algun puerto en especifico configurar las variables `SANCTUM_STATEFUL_DOMAINS` y `ALLOWED_ORIGINS` con el `:port`.

```json
SANCTUM_STATEFUL_DOMAINS=domain.com
SESSION_DOMAIN=.domain.com
ALLOWED_ORIGINS=domain.com
```

```sh
> php artisan serve --host=localhost --port=8080
```

#### Vue

Compilar dependencias development

```sh
> npm run dev
```

Compilar dependencias production

```sh
> npm run prod
```

Escuchar cambios y ejecutar compilación

```sh
> npm run watch
```
