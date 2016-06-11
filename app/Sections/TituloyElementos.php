<?php
namespace jorgelsaud\ProgressERP\Sections;
class TituloyElementos{
	private $titulo;
	private $elementos;
	public function __construct($titulo,$elementos)
	{
		$this->titulo=$titulo;
		$this->elementos=$elementos;
	}
	public function show(){
		ob_start()?>
		<section class="Progress">
			<div class="container flexible">
				<div class="Progress__Titulo">
					<p><?=$this->titulo?></p>
				</div>
				<?php $this->obtenerElementosInternos($this->elementos)?>
			</div>
		</section>
<?php
			echo ob_get_clean();
		return true;
		;
	}
	private function obtenerElementosInternos($elementos){
		if(have_rows('elementos')){
			while ( have_rows('elementos') ){ 
				the_row();
				switch (get_row_layout()){
			case 'atributos':
			$subtitulo=new Atributos();
			echo $subtitulo->show();
			break;
			case 'subtitulo':
			$subtitulo=new Subtitulo(get_sub_field('subtitulo'));
			echo $subtitulo->show();
			break;
			case 'infografia':
				$infografia=new Infografia(get_sub_field('imagen'));
				echo $infografia->show();

				break;
			}
				
			}
		}
	}
}
