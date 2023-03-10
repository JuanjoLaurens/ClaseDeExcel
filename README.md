# Veterinaria

### Clase de Excel

Este proyecto es una aplicación web desarrollada en Laravel que permite programar y gestionar citas en una clínica veterinaria. La aplicación utiliza MySQL como base de datos, Bootstrap y JavaScript para el diseño y FullCalendar para mostrar las citas programadas.

## Requisitos previos

Antes de instalar el proyecto, asegúrate de tener los siguientes requisitos previos instalados en tu máquina:

- PHP (versión 7.3 o superior)
- MySQL (versión 5.7 o superior)
- Composer (versión 2.0 o superior)

## Instalación

Para instalar el proyecto, sigue estos pasos:

1. Clona este repositorio en tu máquina local: https://github.com/JuanjoLaurens/ClaseDeExcel.git
2. Navega al directorio del proyecto:
cd ClaseDeExcel
3. Crea una copia del archivo `.env.example` y renómbralo a `.env`:
4. Actualiza el archivo `.env` con los detalles de la base de datos:

##### DB_CONNECTION=mysql
##### DB_HOST=127.0.0.1
##### DB_PORT=3306
##### DB_DATABASE=veterinaria
##### DB_USERNAME=usuario
##### DB_PASSWORD=contraseña


Asegúrate de reemplazar `usuario` y `contraseña` con tus propias credenciales de MySQL.

5. Instala las dependencias del proyecto a través de Composer:

composer install


6. Ejecuta las migraciones para crear las tablas de la base de datos:

php artisan migrate


7. Inicia el servidor web de Laravel con el siguiente comando:

php artisan serve


8. Accede al proyecto en tu navegador web en la dirección `http://localhost:8000`.

Si el comando `php artisan serve` no funciona, puedes usar el siguiente comando:

php -S localhost:8888 -t public


Este comando iniciará un servidor web de PHP que servirá los archivos en el directorio `public` del proyecto en el puerto `8888`.

## Funcionalidades del proyecto

Este proyecto es una aplicación web para una veterinaria, donde se pueden agendar citas con los veterinarios, ver las citas agendadas, agregar nuevos clientes y mascotas.

La aplicación fue desarrollada utilizando el framework Laravel, y se utilizó MySQL como base de datos. También se usaron tecnologías como Bootstrap y JavaScript para el frontend, y FullCalendar para mostrar el calendario de citas.

## Funcionalidades Principales

- Agendar citas con los veterinarios
- Ver las citas agendadas
- Agregar nuevos clientes y mascotas


## Flujo de la aplicación
El flujo de la aplicación es el siguiente:

- El usuario puede ver el calendario de citas y agregar nuevas citas.
- El usuario puede ver las citas agendadas y cancelar citas existentes.
- El usuario puede agregar nuevos clientes y mascotas.

# Video Funcionamiento 

[![Alt text](https://img.youtube.com/vi/wAF4OmJd-Ug/0.jpg)](https://www.youtube.com/watch?v=wAF4OmJd-Ug)

## Conclusiones

Este proyecto es una aplicación web completa para la gestión de citas y clientes en una veterinaria. Gracias a Laravel y otras tecnologías utilizadas, la aplicación es robusta y escalable.
