<?php
namespace jorgelsaud\ProgressERP\Sections;
class ImagenConDescripcion{
	private $imagen;
	private $titulo;
	private $resumen;
	public function __construct($imagen,$titulo,$resumen)
	{
		$this->imagen=$imagen;
		$this->titulo=$titulo;
		$this->resumen=$resumen;
	}
	public function show(){
		ob_start();?>
		<section class="Calidad container">
			<div class="Calidad__imagen">
				<img src="<?=$this->imagen?>" alt="">
			</div>
			<div class="Calidad__Contenido">
				<div class="Calidad__Titulo">
					<p><?=$this->titulo?></p>
				</div>
				<div class="Calidad__Descripcion">
					<p><?=$this->resumen?></p>
				</div>
			</div>
		</section>
<?php
			echo ob_get_clean();
	}
}
