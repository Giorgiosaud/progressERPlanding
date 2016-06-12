<?php
namespace jorgelsaud\ProgressERP\Sections;
class Clientes{
	private $titulo;
	public function __construct($titulo)
	{
		$this->titulo=$titulo;
	}
	public function show(){
		ob_start()?>
		<section class="TituloDestacado" id="<?= $this->id?>">
			<div class="TituloDestacado__Titulo">
				<p><?=$this->titulo?></p>
			</div>
		</section>
		<section class="ClientesLanding" >
			<div class="ClientesLanding__Container container container-flex">
			<?php if(have_rows('clientes')):?>
			<?php while (have_rows('clientes')):the_row();?>
				<div class="ClientesLanding__Cliente">
					<div class="ClientesLanding__Cliente__icono">
						<img src="<?php the_sub_field('logo')?>" alt="">
					</div>
				</div>
				<?php endwhile;?>
				<?php else:?>
				<h1>Por Favor inrese Clientes</h1>
				<?php endif;?>
			</div>
		</section>
<?php
echo ob_get_clean();

	}
}
