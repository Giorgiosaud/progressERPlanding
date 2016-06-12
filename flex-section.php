<?php
use jorgelsaud\ProgressERP\Sections\RevSlider;
use jorgelsaud\ProgressERP\Sections\Imagen;
use jorgelsaud\ProgressERP\Sections\TituloyElementos;
use jorgelsaud\ProgressERP\Sections\SeccionDestacada;
use jorgelsaud\ProgressERP\Sections\ProductosyServicios;
use jorgelsaud\ProgressERP\Sections\ImagenConDescripcion;
use jorgelsaud\ProgressERP\Sections\ImagenConDescrpcionyTituloDestacado;
use jorgelsaud\ProgressERP\Sections\ProductosInternos;
use jorgelsaud\ProgressERP\Sections\ContenidoDestacado;
use jorgelsaud\ProgressERP\Sections\ImagenDestacada;
use jorgelsaud\ProgressERP\Sections\Caracteristicas;
use jorgelsaud\ProgressERP\Sections\FormularioLanding;
use jorgelsaud\ProgressERP\Sections\Beneficios;
use jorgelsaud\ProgressERP\Sections\Tabla;
use jorgelsaud\ProgressERP\Sections\Clientes;
use jorgelsaud\ProgressERP\Sections\SolicitarDemo;
if( have_rows('secciones_de_paginas') ){
	while ( have_rows('secciones_de_paginas') ){ 
		the_row();
		switch (get_row_layout()){
		case 'imagen':
			$slider=new Imagen(get_sub_field('imagen'));
			echo $slider->show();
			break;
		case 'clientes':
			$clientes=new Clientes(get_sub_field('titulo'));
			$clientes->show();
			break;
		case 'revslider':
			$slider=new RevSlider(get_sub_field('id'));
			$slider->show();
			break;
		case 'landing_solicitar_demo':
			$echo=new SolicitarDemo(get_sub_field('color_fondo'),get_sub_field('color_letras'),get_sub_field('texto'),get_sub_field('texto_boton'),get_sub_field('id_referencia'));
			$echo->show();
			break;
		case 'titulo_y_elementos':
			$tituloyelementos=new TituloyElementos(get_sub_field('titulo'),get_sub_field('elementos'));
			$tituloyelementos->show();
			break;
		case 'seccion_destacada':
			$seccionDestacada=new SeccionDestacada(get_sub_field('titulo'),get_sub_field('descripcion'),get_sub_field('incluye_link'),get_sub_field('link'),get_sub_field('link_text'),get_sub_field('imagen'));
			$seccionDestacada->show();
			break;
		case 'productos_y_servicios':
			$seccionDestacada=new ProductosyServicios(get_sub_field('fondo'),get_sub_field('titulo'),get_sub_field('subtitulo'),get_sub_field('imagen'));
			$seccionDestacada->show();
			break;
		case 'imagen_sencilla_con_descripcion':
			$seccionDestacada=new ImagenConDescripcion(get_sub_field('id'),get_sub_field('imagen'),get_sub_field('titulo'),get_sub_field('resumen'));
			$seccionDestacada->show();
			break;
		case 'imagen_con_descripcion_y_titulo_destacado':
			$seccionDestacada=new ImagenConDescrpcionyTituloDestacado(get_sub_field('id'),get_sub_field('imagen'),get_sub_field('titulo'),get_sub_field('resumen'),get_sub_field('color_de_titulo'),get_sub_field('color_de_texto_titulo'));
			$seccionDestacada->show();
			break;
		case 'caracteristicas':

			$seccionDestacada=new Caracteristicas(get_sub_field('imagen_de_fondo'));
			$seccionDestacada->show();
			break;
		case 'productos_internos':
			$seccionDestacada=new ProductosInternos(get_sub_field('imagen'),get_sub_field('titulo'),get_sub_field('resumen'));
			$seccionDestacada->show();
			break;
		case 'contenido_destacado':
			$seccionDestacada=new ContenidoDestacado(get_sub_field('imagen'),get_sub_field('texto'),get_sub_field('link'),get_sub_field('texto_del_link'));
			$seccionDestacada->show();
			break;
		case 'imagen_destacada':
			$seccionDestacada=new ImagenDestacada(get_sub_field('imagen'));
			$seccionDestacada->show();
			break;
		case 'beneficios':
			$seccionDestacada=new Beneficios();
			$seccionDestacada->show();
			break;
		case 'tabla':
			$seccionDestacada=new Tabla(get_sub_field('tabla'));
			$seccionDestacada->show();
			break;
		case 'formulario_landing':
			$seccionDestacada=new FormularioLanding(get_sub_field('background'),get_sub_field('titulo'),get_sub_field('producto'),get_sub_field('descripcion'),get_sub_field('titulo_formulario'));
			$seccionDestacada->show();
			break;
		}
	}
}
