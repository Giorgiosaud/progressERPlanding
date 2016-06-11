<?php
namespace jorgelsaud\ProgressERP\Sections;
class Infografia{
	private $imagen;
	public function __construct($imagen)
	{
		
		$this->imagen=$imagen;
	}
	public function show(){
		ob_start();?>
		<div class="Progress__Infografia">
			<img src="<?=$this->imagen?>" class="img-responsive" alt="">
		</div>
<?php
			echo ob_get_clean();
	}
}
