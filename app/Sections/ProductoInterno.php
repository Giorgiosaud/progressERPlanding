<?php
namespace jorgelsaud\ProgressERP\Sections;
class ProductoInterno{
	private $imagen;
	private $titulo;
	private $resumen;
	private $linkF;
	private $linkC;
	public function __construct($imagen,$titulo,$resumen,$linkF='#',$linkC)
	{
		
		$this->imagen=$imagen;
		$this->titulo=$titulo;
		$this->resumen=$resumen;
		$this->linkF=$linkF;
		$this->linkC=$linkC;
	}
	public function show(){
		ob_start();?>
		<div class="Producto__Contenedor">
			<div class="Producto__Imagen">
				<img src="<?= $this->imagen?>" class="img-responsive" alt="Imagen Producto">
			</div>
			<div class="Producto__Texto container">
				<div class="Producto__Texto__Titulo">
					<?= $this->titulo?>
				</div>
				<div class="Producto__Texto__Descripcion">
					<?= $this->resumen?>
				</div>
				<div class="Producto__Texto__Caracteristicas">
					
<?php if( have_rows('caracteristicas') ):
while ( have_rows('caracteristicas') ) : the_row();
$a=new Caracteristica(get_sub_field('icono'),get_sub_field('caracteristica'));
$a->show();
endwhile;

endif;
?>
<div class="clearfix"></div>
<div class="Producto__Texto__botones">
	<a class="masFuncionalidades" href="<?=$this->linkF?>">Ver Más Funcionalidades</a>
	<a class="cotizar" href="<?=$this->linkC?>">Cotizar</a>
</div>
				</div>
			</div>
		</div>
<?php
		echo ob_get_clean();
		return true;
		;
	}
}
