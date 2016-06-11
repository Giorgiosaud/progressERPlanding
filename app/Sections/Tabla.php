<?php
namespace jorgelsaud\ProgressERP\Sections;
class Tabla{
	private $tabla;
	public function __construct($tabla)
	{
		$this->tabla=$tabla;
	}
	public function show(){
		ob_start()?>
		<div class="Funcionalidades container">
			<div class="table-responsive">
				<?php $table = $this->tabla;
				
		if ( $table ) {?>
		<table class="table">
			<?php	if ( $table['header'] ) {?>
			<thead>
				<tr>
					<?php foreach ( $table['header'] as $th ) {?>
					<th>
						<?= $th['c']?>
					</th>

<?php
		}?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $table['body'] as $tr ){?>
					<tr>
						<?php foreach($tr as $td){?>
						<td>
<?php if($td['c']=='Y'){
?>
<img src="<?=get_template_directory_uri().'/app/img/icon_check.png';?>" alt="check"/>
						<?	}else{echo $td['c'];}?>
						</td>
						<?php }
					}
				?>
				

			</tbody>
<?
			}?>
		</table>

<?php
	}
?>
 
			</div>
		</div>
<?php
			echo ob_get_clean();
		
	}
}
