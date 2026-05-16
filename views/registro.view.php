<?php require 'header.php';?>

	<div class="contenedor">
		<div class="postlog">
			<article>
				<h2 class="titulo">Registrate</h2>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" method="post">
					<input type="text" name="usuario" placeholder="Usuario">
					<input type="password" name="password" placeholder="Contraseña">
                    <input type="password" name="password2" placeholder="Repetir Contraseña">
					<input type="submit" value="Registrarse">

				<!-- Comprobamos si la variable errores esta seteada, si es asi mostramos los errores -->
				<?php if(!empty($errores)): ?>
					<div class="error">
						<ul>
							<?php echo $errores; ?>
						</ul>
					</div>
				<?php endif; ?>
					
				</form>
				<p>¿ya tienes cuenta? <a class="link" href="login.php">Inicia Sesion</a> </p>
			</article>
		</div>
	</div>