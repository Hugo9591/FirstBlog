<?php require '../views/header.php'; ?>
<div class="contenedoradmin">
	<h2>Panel de Control</h2>
	<a href="nuevo.php" class="btn">Nuevo Post</a>
	<!-- <a href="cerrar.php" class="btn">Cerrar Sesion</a> -->

	<?php foreach($posts as $post): ?>
	<section class="postadmin">
		<div class="acciones">
			<a href="editar.php?id=<?php echo $post['id']; ?>"><i class="icono fa fa-edit"></i></a>
			<a href="borrar.php?id=<?php echo $post['id']; ?>"><i class="icono fa fa-times"></i></a>
		</div>
		
		<article>
			<h2 class="titulo"><?php echo $post['id'] . '.- ' . $post['titulo']; ?></h2>
			
			<a href="../single.php?id=<?php echo $post['id']; ?>">Ver mas...<i class="icono fa fa-eye"></i></a>
		</article>
			
			
	</section>
	<?php endforeach; ?>
</div>

<?php require '../paginacion.php'; ?>

<?php require '../views/footer.php'; ?>