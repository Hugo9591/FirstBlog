<?php require 'header.php' ?>

	<div class="contenedor log">
		<div class="postlog">
			<article>
				<h2 class="titulo">Inicia Sesion</h2>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" method="post">
					<input type="text" name="usuario" placeholder="Usuario">
					<input type="password" name="password" placeholder="Contraseña">
					<input type="submit" value="Iniciar Sesion">

					<!-- Comprobamos si la variable errores esta seteada, si es asi mostramos los errores -->
					<?php if(!empty($errores)): ?>
						<div class="error">
							<ul>
								<?php echo $errores; ?>
							</ul>
						</div>
					<?php endif; ?>
					
				</form>
				<p class="parrafo">¿No tienes cuenta? <a class="link" href="registro.php">Registrate</a> </p>
			</article>
		</div>
	</div>

<?php require 'footer.php'; ?>