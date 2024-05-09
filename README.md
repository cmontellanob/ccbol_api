## instalar proyecto laravel

composer create-project laravel/laravel cbol-api

# CRear modelo
php artisan make:model Paticipante





## hacer correr laravel

php artisan serve

## Crear el modelo migracion factpry y seeder

php artisan make:model Participante -mfs




## Crear las tablasy llenarlas

 php artisan migrate --seed

## Crear las tablasy llenarlasantes borra todo
  php artisan migrate:fresh --seed

## verificar la configuracion   de idioma en el archivo /config/app.php

poner el idioma a españo y los faler a español peruano es_PE

## crear Controlado para la api
php artisan make:controller ParticipanteController --api

# instalar la libreria JWT
composer require firebase/php-jwt

# Crear el controlador para el login que responda la ra tura post de login
php artisan make:controller LoginController --api

# creaar el midleware 
php artisan make:middleware JWTMiddleware

# activar el midleware enlaravel
# agregar al kernel en la seccion  protected $middlewareAliases =
'jwt.auth'=>\App\Http\Middleware\JWTMiddleware::cla
ss,


