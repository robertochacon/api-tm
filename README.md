
## Pasos para instalar api de gestion de libros

- Paso 1. Clonar o descargar el proyecto.
- Paso 2. Ejecutar el comando *composer install*.
- Paso 3. Crear archivo *.env* y agregar credenciales de su base de datos local mysql.
- Paso 4. Ejecutar el comando *php artisan migrate:fresh --seed*.
- Paso 5. Ejecutar el comando *php artisan key:generate*.
- Paso 6. Ejecutar el comando *php artisan jwt:secret*.
- Paso 7. Ejecutar el comando *php artisan route:cache*.
- Paso 8. Ejecutar el comando *php artisan l5-swagger:generate*.
- Paso 9. Ejecutar el comando *php artisan serve*.

## Documentación
- Acceder a la ruta http://127.0.0.1:8000/api/documentation para ver el api documentada.

