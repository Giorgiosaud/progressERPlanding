<?php
namespace jorgelsaud\ProgressERP\Sections;
class Producto{
	private $icono;
	private $titulo;
	private $descripcion;
	private $link;
	public function __construct($icono,$titulo,$descripcion,$link)
	{
		
		$this->icono=$icono;
		$this->titulo=$titulo;
		$this->descripcion=$descripcion;
		$this->link=$link;
	}
	public function show(){
		ob_start();?>
		<div class="ProductosyServicios__Atributo">
			<div class="ProductosyServicios__Atributo__Imagen">
				<img src="<?=$this->icono?>" alt="">
			</div>
			<div class="ProductosyServicios__Atributo__Titulo">
				<p><?=$this->titulo?></p>
			</div>
			<div class="ProductosyServicios__Atributo__Resumen">
				<p><?=$this->descripcion?></p>
			</div>
			<div class="Producto__Texto__botones">
				<a href="<?=$this->link?>" class="masFuncionalidades">Ver Más</a>
				<div class="clearfix"></div>
			</div>
		</div>
<?php
echo ob_get_clean();
return true;
;
	}
}
