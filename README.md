Pasos para utilizar el proyecto.

1.- Clonar el repositorio con el siguiente comando: git clone https://github.com/JorgeIbarraVazquez/ListaProductos.git

Posteriormente se debe de contar con PHP,Composer y mysql instaladas en su computadora.

Al tener clonado el repositorio y ubicarnos en la carpeta donde se guardo el proyecto, el segundo paso sera migrar la Base de datos utilizando el siguiente comando:

php artisan migrate

El tercer paso sera llenar la tabla productos con informacion, utilizando el siguiente comando:

php artisan db:seed --class=ProductSeeder

Para probar la aplicacion se escribe este comando: php artisan serve

La ruta del navegador para ver el funcionamiento es http://127.0.0.1:8000/products.
