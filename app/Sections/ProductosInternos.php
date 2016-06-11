<?php
namespace jorgelsaud\ProgressERP\Sections;
class ProductosInternos{
	private $fondo;
	private $titulo;
	private $subtitulo;
	public function __construct($fondo,$titulo,$subtitulo)
	{

		$this->fondo=$fondo;
		$this->titulo=$titulo;
		$this->subtitulo=$subtitulo;
	}
	public function show(){
		ob_start();?>
		<section class="Productos">
<? 
		if( have_rows('producto') ):
			while ( have_rows('producto') ) : the_row();
		$a=new ProductoInterno(get_sub_field('imagen'),get_sub_field('titulo'),get_sub_field('resumen'),get_sub_field('link_funccionalidades'),get_sub_field('link_contactos'));
		$a->show();
endwhile;
endif;
?>
</section>
<?php
echo ob_get_clean();
	}
}
