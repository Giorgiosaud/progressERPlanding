<?php
namespace jorgelsaud\ProgressERP\Sections;
class ProductosyServicios{
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
		<div class="ProductosyServicios"  style="background:linear-gradient(
			rgba(232,232,233,0.9),
			rgba(232,232,232,0.5)),
			url(<?=$this->fondo?>);background-size:cover;">
			<div class="container flexible">
				<div class="ProductosyServicios__Titulo">
					<p><?=$this->titulo?></p>
				</div>
				<div class="ProductosyServicios__Subtitulo">
					<p><?=$this->subtitulo?></p>
				</div>
				<div class="ProductosyServicios__Atributos">
<? 
		if( have_rows('producto') ):
			while ( have_rows('producto') ) : the_row();
		$a=new Producto(get_sub_field('imagen'),get_sub_field('titulo'),get_sub_field('descripcion'),get_sub_field('link'));
		$a->show();
endwhile;
endif;
?>
</div>
</div>
</div>

<?php
echo ob_get_clean();
	}
}
