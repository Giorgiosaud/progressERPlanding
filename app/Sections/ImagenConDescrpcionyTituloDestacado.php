<?php
namespace jorgelsaud\ProgressERP\Sections;
class ImagenConDescrpcionyTituloDestacado{
	private $imagen;
	private $titulo;
	private $resumen;
	private $id;
	private $Bgcolor;
	private $textColor;
	public function __construct($id,$imagen,$titulo,$resumen,$Bgcolor,$textColor)
	{
		$this->imagen=$imagen;
		$this->titulo=$titulo;
		$this->resumen=$resumen;
		$this->id=$id;
		$this->Bgcolor=$Bgcolor;
		$this->textColor=$textColor;
	}
	public function show(){
		ob_start();?>
		<section class="TituloDestacado" style="background-color:<?=$this->Bgcolor?>;color:<?=$this->textColor?>" id="<?= $this->id?>">
			<div class="TituloDestacado__Titulo">
				<p><?=$this->titulo?></p>
			</div>
		</section>
		<section class="ImagenyContenidoDestacado container">
			<div class="ImagenyContenidoDestacado__imagen">
				<img src="<?=$this->imagen?>" alt="Imagen Destacada" class="img-responsive">
			</div>
			<div class="ImagenyContenidoDestacado__Contenido">
				<div class="ImagenyContenidoDestacado__Descripcion">
					<p><?=$this->resumen?></p>
				</div>
 			</div>
		</section>
<?php
		echo ob_get_clean();
	}
}
