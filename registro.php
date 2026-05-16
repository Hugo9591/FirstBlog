<?php session_start();

//Comprobamos  si ya hay una session
if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
	die();
}

// Comprobamos si ya han sido enviado los datos
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Validamos que los datos hayan sido rellenados
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);//convertimos a minusvula y eliminamos etiquetas
	$password = trim($_POST['password']);
	$password2 = trim($_POST['password2']);
}

$errores = '';

// Comprobamos que ninguno de los campos este vacio.
if (empty($usuario) or empty($password) or empty($password2)) {
    $errores = '<li>Por favor rellena todos los datos correctamente</li>';
} else {

    // Comprobamos que el usuario no exista ya.
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=login', 'root', '');
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }

    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
    $statement->execute(array(':usuario' => $usuario));

    // El metodo fetch nos va a devolver el resultado o false en caso de que no haya resultado.
    $resultado = $statement->fetch();

    // Si resultado es diferente a false entonces significa que ya existe el usuario.
    if ($resultado != false) {
        $errores .= '<li>El nombre de usuario ya existe</li>';
    }

    // Hasheamos nuestra contraseña para protegerla un poco.
    # La seguridad es un tema muy complejo, aqui solo estamos haciendo un hash de la contraseña,
    # pero esto no asegura por completo la informacion encriptada.
    $password = hash('sha512', $password);
    $password2 = hash('sha512', $password2);

    // Comprobamos que las contraseñas sean iguales.
    if ($password != $password2) {
        $errores.= '<li>Las contraseñas no son iguales</li>';
    }

    // Comprobamos si hay errores, sino entonces agregamos el usuario y redirigimos.
	if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)');
		$statement->execute(array(
				':usuario' => $usuario,
				':pass' => $password
			));

		// Despues de registrar al usuario redirigimos para que inicie sesion.
		header('Location: login.php');
	}
}


require 'admin/config.php';
require 'views/registro.view.php';
?>