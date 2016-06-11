<?php
namespace jorgelsaud\ProgressERP\Sections;
class Atributos{
	public function show(){
		ob_start();?>
		<div class="Progress__Atributos">
<? 
		if( have_rows('atributo') ):
			while ( have_rows('atributo') ) : the_row();
		$a=new Atributo(get_sub_field('icono'),get_sub_field('titulo'),get_sub_field('resumen'));
		$a->show();
endwhile;
endif;
?>
		</div>
<?php
echo ob_get_clean();
	}
}
