<h1>Petministration</h1>
<b>Pet Administration System</b>
<i><b>Dev: Mateo Zapata Pérez</b> (Technologist in Software Development and Analysis)</i>
<br>

PARA CLONAR EL PROYECTO, DEBES TENER EN TU EQUIPO:
- npm
- php 8+
- composer
- motor de base de datos MySQL


A continuación te explico los pasos para subir el ambiente local del software

1. Clona el proyecto en el directorio donde tienes las carpetas del servidor local (ejemplo, en el caso de xampp, en C:/xampp/htdocs)
2. Abre una terminal de linea de comandos (por ejemplo cmd o git bash) en la carpeta que se te genera luego de clonar el repositorio
3. Ejecuta los siguientes comandos:
    - npm install
    - composer install

4. Crea manualmente una base de datos y llámala 'petmin'
5. Configurando el .env:
    5.1. Ubica el archivo .env.example y cambiale el nombre a .env
    5.2. Abre el archivo con el editor de tu preferencia (puede ser el bloc de notas)
    5.3. Cambia el valor de DB_DATABASE de <b>laravel</b> a <b>petmin</b>
    5.4. Según tengas configurado MySQL, o el dominio local, establece los demás valores de BD según tu ambiente

6. Una vez creada la base de datos, ejecuta los siguientes comandos (respectivamente) en una terminal de linea de comandos en el directorio del proyecto:
    
    php artisan migrate --seed           --->   para migrar las tablas de la base de datos y generar algunos datos aleatorios
    php artisan key:generate             --->   para generar la clave del proyecto, necesaria para ejecutar un ambiente con laravel

7. Sube el servidor con el siguiente comando:
    
    php artisan serve

8. Ve a la siguiente ruta en el navegador:     localhost:8000

<b>¡Listo! hasta este punto, debes tener tu software funcionando ;)</b>