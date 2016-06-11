<?php
namespace jorgelsaud\ProgressERP\Sections;
class ImagenDestacada{
	private $imagen;
	private $texto;
	private $link;
	private $linkText;
	public function __construct($imagen)
	{
		$this->imagen=$imagen;
	}
	public function show(){
		ob_start()?>
		<section class="ImagenDestacada">
			<div class="flexible">
				<div class="ImagenDestacada__imagen">
					<img src="<?=$this->imagen?>" alt="imagen Destacada" class="img-responsive">
				</div>
				<div class="ImagenDestacada__fondo"></div>
			</div>
		</section>
<?php
			echo ob_get_clean();

	}
}
