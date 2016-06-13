<?php
namespace jorgelsaud\ProgressERP\Sections;
class FormularioLanding{
	private $backgroundImage;
	private $titulo;
	private $producto;
	private $descripcion;
	private $tituloFormulario;

	public function __construct($backgroundImage, $titulo, $producto, $descripcion,$tituloFormulario)
	{
		$this->backgroundImage = $backgroundImage;
		$this->titulo = $titulo;
		$this->producto = $producto;
		$this->descripcion = $descripcion;
		$this->tituloFormulario=$tituloFormulario;
	}
	public function show(){
		ob_start()?>

		<div class="FormularioLanding" id="FormularioLanding" style="background-image:url(<?= $this->backgroundImage?>)" >
			<div class="container container-flex FlexFormSection">
				<div class="FormularioLanding__Descripcion">
					<div class="FormularioLanding__Descripcion__Container">
						<div class="FormularioLanding__Descripcion__Titulo">
							<p><?= $this->titulo?><p>
								</div>
								<div class="FormularioLanding__Descripcion__Producto">
									<p>
										<?= $this->producto?>
									</p>
								</div>
								<div class="FormularioLanding__Descripcion__Descripcion">
									<p>
										<?= $this->descripcion?>
									</p>
								</div>
								<div class="FormularioLanding__Descripcion__Caracteristicas">
									<?php if( have_rows('caracteristicas') ):
										while ( have_rows('caracteristicas') ) : the_row();?>
										<div class="FormularioLanding__Descripcion__Caracteristica"><img src="<?= get_template_directory_uri()?>/app/img/checklist.png" alt="check"/><?php the_sub_field('caracteristica')?></div>
											<?php endwhile; 
											endif; ?>


							</div>
						</div>
					</div>
					<div class="FormilarioLanding__Formulario">
						<div class="FormilarioLanding__Formulario__Titulo">
							<?= $this->tituloFormulario ?>
						</div>
						<div class="FormilarioLanding__Formulario__Fields">
							<form id="landingForm" action="">
								<div class="formField">
									<input type="text" name="nombre" placeholder="* Nombre" required>
								</div>
								<div class="formField">
									<input type="text" name="apellido" placeholder="* Apellido" required>
								</div>
								<div class="formField">
									<input type="email" name="email" placeholder="* Email" required>
								</div>
								<div class="formField">
									<input type="text" name="telefono" placeholder="* Telefono" required>
								</div>
								<div class="formField">
									<input type="text" name="empresa" placeholder="* Empresa" required>
								</div>
								<div class="formField">
									<select name="tamano" required>
										<option value="">¿De que tanaño es su Empresa?</option>
										<option value="1-20">1-20 empleados</option>
										<option value="21-60">21-60 empleados</option>
										<option value="61-100">61-100 empleados</option>
										<option value="101-200">101-200 empleados</option>
										<option value="+de 201">+de 201 empleados</option>
									</select>
								</div>
								<div class="formField">
									<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LdtTyETAAAAAMWdzaftef7b6LKST4YMQAiuqiNF"></div>
								</div>
								<button id="enviarFormularioLanding" type="submit" class="btn botonCotizacion" disabled>Solicitar mi Cotización</button>
								<div class="LandingFormmensaje">
									<p>Privacidad 100% garantizada.</p>
									<p>Nunca Compartiremos sus datos</p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
<?php
											echo ob_get_clean();

	}
}
