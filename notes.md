## Para correr el servidor de desarrollo
php -S localhost:8888 -t public

### TODO
- [x] hacer nulos todos los campos de la tabla info_site
- [x] agregar validacion condicional las rutas infosite/store y infosite/update
- [x] salvar como is_default true cuando no hay instancias en exchangerate ruta exchangerate/store
- [x] reescribir migraciones sql de forma más concreta
- [x] modificar mensajes de eliminaciónen currency y excahgerate frontend 
- [ ] generar mensajes de error por defecto en panel de control
- [ ] crear context para mostrar mensajes de exito despues de cambiar de ruta en dahsboard
- [ ] probar a hacer deploy extra de un sitio con esta app