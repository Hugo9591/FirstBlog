# FirstBlog

## Descrpcion
Pagina odnde se muestran post de diferentes usuarios autenticados, al no hacer registrarse, el usuario puede ver los post
pero no puede agregar, modificar o eliminar los post

## Tecnologias
- PHP
- MySQL
- HTML
- CSS

## Uso
La primera vista es la pagina en donde aparecen todos los post donde cada post aparece con el titulo, fecha, imagen y solo una poarte 
del texto despues un link de Ver Mas donde al hacer click lleva a otra vista en donde aparece el post completo.
Todos los post estan almacenados en una BD, en el header tenemos
el icono, una barra de busqueda que funciona mediante una busqueda en la BD que busca cualqquier palabra que coincida con el post.
Tenemos un boton de contacto y uno de acceder, al dar click en acceder nos manda a un login donde nos pide el correo y la contraseña para 
iniciar sesion si ya estas registrado, si no, abajo aparece un link Registrarse que al dar click nos aparece una vista similar al login
pero con dos campos de constraseña para comprobar que sea correcta, una vez que se hace la comprobacion se agrega el ususario a la BD
y en el login ahora si podemos iniciar sesion ya que busca que exista el ususario en la BD y si existe nos permite acceder a la pagina donde
se nos mostrara una vista similar a la primera pero con la doiferencia que podremos agregar, modificar o eliminar posts.

## Instalacion
git clone https://github.com/Hugo9591/FirstBlog

Para su correcto funcionamiento se debe de crear una BD ayudandonos con phpMyAdmin, creamos dos tablas 
articulos: id(int), titulo(varchar), extracto(varchar), fecha(date), texto(varchar), thumb(varchar) 
usuarios: id(int), usuario(varchar), pass(varchar) debe de ser mayor de 128  caracteres ya que al insertarse la constraseña se
procesa con una funcion hash para mas seguridad donde se convierte la contraseña en una cadena de texto de caracteres por lo que hace
a la contraseña irreconocible 
