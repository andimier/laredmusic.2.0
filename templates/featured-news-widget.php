<div class="submenus2">
	<div class="noticias2">
		<div class="ultimasnoticias">ÚLTIMAS NOTICIAS</div>

		<div class="masnoticias">
			<a href="noticias.php">+ MÁS NOTICIAS AQUÍ</a>
		</div>

		<?php while($noticia = phpMethods('fetch-array', $noticias)): ?>
			<div class="fechanoticia"><?php echo $noticia['fecha']; ?></div>
			<div class="titulonoticia"><a href="noticias.php"><?php echo $noticia['titulo']; ?></a></div>
			<hr />
		<?php endwhile; ?>
	</div>
</div>