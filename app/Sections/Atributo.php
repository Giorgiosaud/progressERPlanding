<?php
namespace jorgelsaud\ProgressERP\Sections;
class Atributo{
	private $icono;
	private $titulo;
	private $resumen;
	public function __construct($icono,$titulo,$resumen)
	{
		
		$this->icono=$icono;
		$this->titulo=$titulo;
		$this->resumen=$resumen;
	}
	public function show(){
		ob_start();?>
		<div class="Progress__Atributo">
			<div class="Progress__Atributo__Imagen">
				<img src="<?=$this->icono?>" alt="">
			</div>
			<div class="Progress__Atributo__Titulo">
				<p><?=$this->titulo?></p>
			</div>
			<div class="Progress__Atributo__Resumen">
				<p><?=$this->resumen?></p>
			</div>
		</div>
<?php
echo ob_get_clean();
return true;
;
	}
}
