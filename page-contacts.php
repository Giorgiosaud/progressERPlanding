<?php 
/* Template Name: Pagina de Contactos */
get_header(); 
?>

<!-- section -->
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<?php
					get_template_part('flex','section');
?>

			<?php endwhile; ?>
<section class="Direccion container">
	<div class="Direccion__texto">
		<div class="Drieccion__texto__Linea1">
			<p>
				<?php the_field('direccion_linea_1','option')?>	Serrano 73, Oficentro Business Center,
			</p>
		</div>
		<div class="Drieccion__texto__Linea2">
			<p>
				Piso 11, Oficina 1107, Santiago Centro.				
			</p>
		</div>
		<div class="Direccion__texto__telefono">
			<p>	
				Tlf: <a href='tel:+56232069749'>+56 2 3206 9749</a>
			</p>
		</div>
		<div class="Direccion__texto__email">
			<p>
			Mail: <a href="mailto:info@progresserp.cl">info@progresserp.cl</a>
			</p>
		</div>
		<div class="Direccion__texto__socials">

							<a href="https://www.facebook.com/progresserp/"><span class="socicon socicon-facebook"></span></a>	
							<a href="

https://twitter.com/ProgressERP"><span class="socicon socicon-twitter"></span></a>	
							<a href="https://www.linkedin.com/company/progress-erp"><span class="socicon socicon-linkedin"></span></a>	
		</div>
	</div>
	<div class="Direccion__mapa">
		<div id="map"></div>
	</div>
</section>
	<form id="emailForm" class="ContactForm container" action="enviarCorreo.php" method="POST">
	<div class="FormHalf">
		<div class="formField">
			<input type="text" name="nombre" placeholder="* Nombre" required>
		</div>
		<div class="formField">
			<input type="text" name="empresa" placeholder="* Empresa" required>
		</div>
		<div class="formField">
			<input type="text" name="telefono" placeholder="* Telefono" required>
		</div>
		<div class="formField">
			<input type="email" name="email" placeholder="* email" required>
		</div>
		<div class="formField">
			<select name="producto" required>
				<option value="">Seleccione un Producto</option>
				<option value="POS">Progress POS</option>
				<option value="DTE">Progress DTE</option>
				<option value="PROD">Progress PROD</option>
				<option value="PYME">Progress PYME</option>
			</select>
		</div>
	</div>
	<div class="FormHalf">
		<div class="formField">
			<textarea id="mensaje" name="mensaje" cols="30" rows="10" placeholder="* Mensaje" required></textarea>
		</div>
		<div class="formField">
			<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LdtTyETAAAAAMWdzaftef7b6LKST4YMQAiuqiNF"></div>
			<button id="enviarEmail" type="submit" disabled>Enviar</button>
		</div>
	</div>
</form>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>
<?php get_footer(); ?>
