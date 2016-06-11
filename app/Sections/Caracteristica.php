<?php
namespace jorgelsaud\ProgressERP\Sections;
class Caracteristica{
	private $icono;
	private $caracteristica;
	public function __construct($icono,$caracteristica)
	{
		
		$this->icono=$icono;
		$this->caracteristica=$caracteristica;
	}
	public function show(){
		ob_start();?>
		<div class="Producto__Texto__Caracteristica">
			<img src="<?=$this->icono?>" alt="check"><?=$this->caracteristica?>
		</div>
<?php
		echo ob_get_clean();
	}
}
