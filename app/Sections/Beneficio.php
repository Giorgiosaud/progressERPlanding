<?php
namespace jorgelsaud\ProgressERP\Sections;
class Beneficio{
	private $icono;
	private $titulo;
	private $descripcion;
	public function __construct($icono,$titulo,$descripcion)
	{
		
		$this->icono=$icono;
		$this->titulo=$titulo;
		$this->descripcion=$descripcion;
	}
	public function show(){
		ob_start();?>
		<div class="Beneficio__Contenido">
			<div class="Beneficio__titulo">
				<p><?=$this->titulo?></p>
			</div>
			<div class="Beneficio__Descripcion">
				<div class="Beneficio__Descripcion__icono">
					<img src="<?=$this->icono?>" alt="icono">
				</div>
				<div class="Beneficio__Descripcion__texto">
					<?=$this->descripcion?>
				</div>
			</div>
		</div>
<?php
		echo ob_get_clean();
		return true;
		;
	}
}
