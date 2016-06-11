<?php
namespace jorgelsaud\ProgressERP\Sections;
class Subtitulo{
	private $subtitulo;
	public function __construct($subtitulo)
	{
		
		$this->subtitulo=$subtitulo;
	}
	public function show(){
		ob_start();?>
		<div class="Progress__Subtitulo">
			<?= $this->subtitulo?>
		</div>
<?php
			echo ob_get_clean();
		;
	}
}
