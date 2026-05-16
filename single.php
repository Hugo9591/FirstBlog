<?php 

require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
// $id_articulo = (int)limpiarDatos($_GET['id']);
$id_articulo = id_articulo($_GET['id']);

if (!$conexion) {
	header('Location: error.php');
}

//_Si esta vacio el id redireccionamos a index
if (empty($id_articulo)) {
	header('Location: index.php');
}

$post = obtener_post_por_id($conexion, $id_articulo);

if (!$post) {
	// Redirigimos al index si no hay post
	header('Location: index.php');
}
$post = $post[0];//Regresa el array en la posicio 0 que es dondse se muestran todos los articulos

require 'views/single.view.php';

?>