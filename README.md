# Sistema de reservas de pistas de padel

![Catalogo de productos](https://raw.githubusercontent.com/delarosamora/product-catalog/master/storage/app/public/image-site.jpg "Catalogo de productos")

Este proyecto ha sido realizado con el fin educativo con el fin de avanzar en mi carrera profesional.

## Tecnologías utilizadas

<figure>
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"
         alt="Laravel" width="300" height="100">
    <figcaption>Laravel 8.0</figcaption>
</figure>

<figure>
    <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-shadow.png"
         alt="Boostrap 5.0" width="200" height="150">
    <figcaption>Boostrap 5.0</figcaption>
</figure>

<figure>
    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fd/JQuery-Logo.svg"
         alt="Jquery"  width="300">
    <figcaption>Jquery</figcaption>
</figure>

## Instalación

### 1. Clonar repositorio de GITHUB

`git glone https://github.com/david9801/padel.git`

### 2. Ejecutar migraciones del proyecto

En tu motor de base de datos requerido (en mi caso MySQL) debes crear una base de datos nueva e indicar los datos de acceso en el fichero .env:
- Equipo/host
- Nombre 
- Usuario 
- Contraseña 

En este proyecto ha sido empleado

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=padel
DB_USERNAME=root
DB_PASSWORD=*******
```
En el caso de emplear Laravel con MySQL:
Debes ir a /config/database.php y buscar 'engine':

'engine' => null,

se cambia por:

'engine' => 'InnoDB',

Una vez se ha realizado el paso anterior:

`php artisan migrate`

### 3. Rellenar los datos en las tablas de las bbdd

En el proceso de registro (darse de alta) se distingue 2 roles:admin y cliente

`php artisan db:seed --class=RolesTableSeeder`


