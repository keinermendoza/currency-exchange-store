## Para correr el servidor de desarrollo
php -S localhost:8888 -t public

### TODO
- [x] hacer nulos todos los campos de la tabla info_site
- [x] agregar validacion condicional las rutas infosite/store y infosite/update
- [x] salvar como is_default true cuando no hay instancias en exchangerate ruta exchangerate/store
- [x] reescribir migraciones sql de forma más concreta
- [x] modificar mensajes de eliminaciónen currency y excahgerate frontend 
- [x] generar mensajes de error por defecto en panel de control
  - para solucionar esto modifique la forma en como se manejan los errores tanto dentro de fetchPost como por medio de la helper function utils.displayResponseMessages  
- [x] crear context para mostrar mensajes de exito despues de cambiar de ruta en dahsboard
- [x] reposicionar is_default al eliminar actual is_default exchange
- [ ] conseguir solucion alternativa para mostrar messages entre renders
- [x] sacar message provider y context
- [x] pasar containerToast para el baselayout
- [x] crear context para almacenar el valor de currencies
- [x] crear context para almacenar el valor de exchages
- [x] extraer logica de renderizado de errores usando funcion displayResponseMessages y usando fetchPost y fetchPostForm
- [x] pasar logica de calculo de rate a la views de exchagerate
- [ ] crear tabla en base de datos para almacenar publicaiones
- [ ] crear api source para manejar publicaciones
- [ ] crear react views para manejar publicaciones
- [ ] crear php partial view para renderizar seccion de publicaciones
- [ ] crear php full view para renderizar detailPage para publicaciones