<?php
namespace jorgelsaud\ProgressERP\Sections;
class Caracteristicas{
	private $fondo;
	public function __construct($fondo)
	{
		$this->fondo=$fondo;
	}
	public function show(){
		ob_start()?>
		<section class="CaracteristicasLanding" style="background-image:url(<?= $this->fondo?>)">
			<div class="CaracteristicasLanding__Container container container-flex">
			<?php if(have_rows('caracteristica')):?>
			<?php while (have_rows('caracteristica')):the_row();?>
				<div class="CaracteristicasLanding__Caracteristica">
					<div class="CaracteristicasLanding__Caracteristica__icono">
						<img src="<?php the_sub_field('icono')?>" alt="">
					</div>
					<div class="CaracteristicasLanding__Caracteristica__titulo">
						<?php the_sub_field('titulo')?>
					</div>
					<div class="CaracteristicasLanding__Caracteristica__descripcion">
						<?php the_sub_field('descripcion')?>
					</div>
				</div>
				<?php endwhile;?>
				<?php else:?>
				<h1>Por Favor inrese Caracteristicas en la pagina</h1>
				<?php endif;?>
			</div>
		</section>
<?php
echo ob_get_clean();

	}
}
