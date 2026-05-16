<!-- <php session_start();
require 'admin/config.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = limpiarDatos($_POST['usuario']);
	$password = limpiarDatos($_POST['password']);

	if ($usuario == $blog_admin['usuario'] && $password == $blog_admin['password']) {
		$_SESSION['admin'] = $blog_admin['usuario'];
		header('Location: '. RUTA . '/admin');
	}
}

require 'views/login.view.php';

> -->

<?php session_start();

require 'admin/config.php';
require 'functions.php';

// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda acceder al formulario
// if (isset($_SESSION['usuario'])) {
// 	header('Location: index.php');
// 	// header('Location: admin');
// 	die();
// }

// Comprobamos si ya han sido enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = trim($_POST['password']);
	$password = hash('sha512', $password);

	// var_dump($usuario);
	// var_dump($password);

	// Nos conectamos a la base de datos
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=login', 'root', '');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}

	$statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password');
	$statement->execute(array(
			':usuario' => $usuario,
			':password' => $password
		));
	// var_dump($statement);

	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$_SESSION['usuario'] = $usuario;
		//header('Location: index.php');
		header('Location:'. RUTA . '/admin');
	} else {
		$errores = '<li>Datos incorrectos</li>';
	}
	var_dump($resultado);
}

require 'views/login.view.php';

?>