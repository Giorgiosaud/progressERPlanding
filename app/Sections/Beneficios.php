<?php
namespace jorgelsaud\ProgressERP\Sections;
class Beneficios{
	private $imagen;
	public function __construct()
	{

	}
	public function show(){
		ob_start();?>
		<section class="Beneficios">
			<div class="container flexible">
				<div class="Beneficios__Contenedor">

<?php if( have_rows('beneficio') ):
while ( have_rows('beneficio') ) : the_row();
$a=new Beneficio(get_sub_field('icono'),get_sub_field('titulo'),get_sub_field('descripcion'));
$a->show();
endwhile;

endif;
?>
</div>
</div>
</section>
<?php
echo ob_get_clean();
return true;
;
	}
}
