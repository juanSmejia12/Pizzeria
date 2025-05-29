Buenas noches profe

lo típico: 

instalar las dependencias
composer install

como estamos usando un hosting en el archivo .env.example dejamos la configuración para conectarse a la misma, entonces copearla y creala como el .env
cp .env.example .env


y ya es crear la llave de la aplicación y correr el servidor 
php artisan key:generate
php artisan serve