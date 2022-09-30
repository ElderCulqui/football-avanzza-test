# Descripción
Prueba Técnica para Avanzza
La siguiente aplicación web, se desarrolló con Lavaral 9, VueJS 3, InertiaJS, TailwindCss.

Para el consumo de la Api Externa (football-data.org) se utilizó la librería Http Client. Se realizaron validaciones para que al superar las 10 peticiones en un minuto la aplicación muestre un mensaje descriptivo del error. 

Se utilizó como base de datos el gestor Mysql, en el cual se almacenan los registros de Equipos y Jugadores, estos se registran cuando hacemos click en el botón de descargar en el Show de una Liga.


## Installation

1. Instalamos las dependencias de Laravel.
```bash
composer install
```
2. Instalamos las dependencias de JS.
```bash
npm install
```
3. Corremos las migraciones de Laravel.
```bash
php artisan migrate
```
4. Ejecutamos el servidor de Laravel.
```bash
php artisan serve
```
5. Compilamos los assets.
```bash
npm run dev
```
## License
[MIT](https://choosealicense.com/licenses/mit/)
