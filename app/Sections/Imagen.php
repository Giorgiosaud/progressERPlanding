<?php
namespace jorgelsaud\ProgressERP\Sections;
class Imagen{
	private $imagen;
	public function __construct($imagen)
	{
		$this->imagen=$imagen;
	}
	public function show(){
		ob_start()?>
	<div class="slider" id="inicio">
		<img src="<?=$this->imagen?>" alt="top" class="img-responsive">
	</div>
<?php
			echo ob_get_clean();
		
	}
}
