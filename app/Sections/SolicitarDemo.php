<?php
namespace jorgelsaud\ProgressERP\Sections;
class SolicitarDemo{
	private $bgColor;
	private $txtColor;
	private $texto;
	private $txtBut;
	private $ref;
	public function __construct($bgColor,$txtColor,$texto,$txtBut,$ref)
	{
		$this->bgColor=$bgColor;
		$this->txtColor=$txtColor;
		$this->texto=$texto;
		$this->txtBut=$txtBut;
		$this->ref=$ref;
	}
	public function show(){
		ob_start();?>
		<section class="SolicitarDemo" style="background-color:<?=$this->bgColor?>;color:<?=$this->txtColor?>">
			<div class="SolicitarDemo__Titulo">
				<p><?=$this->texto?></p>
			</div>
			<div class="SolicitarDemo__boton">
				<a href="#<?= $this->ref?>" class="botonCotizacion"><?=$this->txtBut?></a>
			</div>
		</section>
<?php
		echo ob_get_clean();
	}
}
