<h1>Petministration</h1>
<b>Pet Administration System</b>

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
5. Una vez creada la base de datos, ejecuta el siguiente comando en una terminal de linea de comandos en el directorio del proyecto:
    
    php artisan migrate --seed

6. Sube el servidor con el siguiente comando:
    
    php artisan serve

7. Ve a la siguiente ruta en el navegador:     localhost:8000

8. ¡Listo! hasta este punto, debes tener tu software funcionando ;)