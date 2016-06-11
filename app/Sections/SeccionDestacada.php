<?php
namespace jorgelsaud\ProgressERP\Sections;
class SeccionDestacada{
			private $titulo;
			private $descripcion;
			private $incluye_link;
			private $link;
			private $link_text;
			private $imagen;
	public function __construct($titulo,$descripcion,$incluye_link,$link,$link_text,$imagen)
	{
		
		$this->titulo=$titulo;
		$this->descripcion=$descripcion;
		$this->incluye_link=$incluye_link;
		$this->link=$link;
		$this->link_text=$link_text;
		$this->imagen=$imagen;
	}
	public function show(){
		ob_start();?>
		<section class="EquipoDeTrabajo">

			
	<div class="EquipoDeTrabajo__Flexible">
		<div class="EquipoDeTrabajo__Contenedor">
			<div class="EquipoDeTrabajo__Titulo">
				<p><?= $this->titulo ?></p>
			</div>

			<div class="EquipoDeTrabajo__Contenido">
				<?= $this->descripcion?>
			</div>
			<?php if($this->incluye_link): ?>
			<div class="Boton__Ir">
				<a href="<?= $this->link?>"><?= $this->link_text?></a>
			</div>
			<?php endif?>
		</div>
		<div class="EquipoDeTrabajo__imagen">
			<img src="<?= $this->imagen?>" class="img-responsive" alt="ImagenDestacada">
		</div>
	</div>

		</section>
<?php
			echo ob_get_clean();
	}
}
