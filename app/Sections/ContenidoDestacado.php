<?php
namespace jorgelsaud\ProgressERP\Sections;
class ContenidoDestacado{
	private $imagen;
	private $texto;
	private $link;
	private $linkText;
	public function __construct($imagen,$texto,$link,$linkText)
	{
		$this->imagen=$imagen;
		$this->texto=$texto;
		$this->link=$link;
		$this->linkText=$linkText;
	}
	public function show(){
		ob_start()?>
		<section class="ContenidoDestacado">
			<div class="flexible">
				<div class="ContenidoDestacado__descripcion">
					<p>
						<img src="<?= $this->imagen?>" alt="imagen Destacada" class="img-responsive">
						<?=$this->texto?>
						<span class="circle glyphicon glyphicon-menu-right"></span>
						<a href="<?=$this->link?>" class="cotizar"><?=$this->linkText?></a>
					</p>
				</div>
				<div class="ContenidoDestacado__fondo"></div>
			</div>
		</section>
<?php
			echo ob_get_clean();

	}
}
