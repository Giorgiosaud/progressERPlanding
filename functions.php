<?php
require_once 'vendor/autoload.php';
// Enqueue Styles and Scripts
function enqueueScriptsAndStyles(){
	wp_register_style('bootstrapCss',get_template_directory_uri().'/app/compiled/bootstrap/dist/css/bootstrap.css',array(),'v3.3.6','all');
	wp_register_style('bootstrapTheme',get_template_directory_uri().'/app/compiled/bootstrap/dist/css/bootstrap-theme.css',array('bootstrapCss'),'v3.3.6','all');
	wp_register_style('socicons','https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css',array('bootstrapTheme'),null,'all');
	wp_register_style('swalCss','https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css',array('bootstrapTheme'),null,'all');
	wp_register_style('progressStyle',get_template_directory_uri().'/app/compiled/mystyle.css',array('socicons','swalCss'),null,'all');
	wp_register_style('progressStyleCustom',get_template_directory_uri().'/app/compiled/will.css',array('progressStyle'),null,'all');
	wp_deregister_script('jquery');
	wp_register_script('jquery','https://code.jquery.com/jquery-2.2.4.min.js',array(),null,true);
	wp_register_script('bootstrapJs',get_template_directory_uri().'/app/compiled/bootstrap/dist/js/bootstrap.js',array('jquery'),null,true);
	wp_register_script('sweetalertJs','https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js',array('bootstrapJs'),null,true);
	wp_register_script('mainJs',get_template_directory_uri().'/app/compiled/js/main.js',array('jquery','sweetalertJs'),null,true);
	wp_register_script('recaptchajs','https://www.google.com/recaptcha/api.js',array(),null,true);
	wp_enqueue_style('progressStyleCustom');
	$vars=array(
		'mapa'=>get_field('direccion_google_maps', 'option'),
		'ajaxurl'=>admin_url( 'admin-ajax.php' ),
		'redirect'=>get_field('redirect','option'),
		'redirectDemo'=>get_field('redirect_after_demo_req','option')
	);
	wp_enqueue_script('googleMap','https://maps.googleapis.com/maps/api/js?key=AIzaSyByDsDQWBV5XMBpz2wWHu6RqhFBNtL_70o&callback=initMap',array('mainJs','recaptchajs'),null,true);

	wp_localize_script( 'mainJs', 'vars', $vars );
	wp_enqueue_script('googleMap');

}
add_action( 'wp_enqueue_scripts', 'enqueueScriptsAndStyles' ); 
show_admin_bar( false );
function custom_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	

}
add_filter('acf/settings/save_json', function() {
	return get_template_directory() . '/fields';
});

add_filter('acf/settings/load_json', function($paths) {
	$paths = array(get_template_directory() . '/fields');

	if(is_child_theme())
	{
		$paths[] = get_stylesheet_directory() . '/fields';
	}

	return $paths;
});
add_action( 'after_setup_theme', 'custom_theme_setup' );
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
	'page_title' 	=> 'Ajustes Generales',
	'menu_title' 	=> 'Ajustes Generales',
	));
	
}
if ( ! function_exists( 'zonaproCorp_custom_logo' ) ) :
	/**
	 * Displays the optional custom logo.
	 *
	 * Does nothing if the custom logo is not available.
	 *
	 * @since Twenty Sixteen 1.2
	 */
	function zonaproCorp_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {

			the_custom_logo();

		}
	}
endif;
function register_my_menus() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Top Menu' ),
      'main-menu' => __( 'Main Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
if(!function_exists('footerMenu')){
	function footerMenu(){
		wp_nav_menu( array(
			'menu'              => 'main-menu',
			'theme_location'    => 'main-menu',
			'container_class'   => 'Menus__links',
		)
	);
	}
}
if(!function_exists('mainMenu')){
	function mainMenu(){
		wp_nav_menu( array(
			'menu'              => 'main-menu',
			'theme_location'    => 'main-menu',
			'depth'             => 0,
			'container'         => 'div',
			'container_class'   => 'collapse navbar-collapse navbar-right',
			'container_id'      => 'mainMenu',
			'menu_class'        => 'navbar-nav nav-progress nav-mainProgress',
			'fallback_cb'       => '\jorgelsaud\WordpressTools\NavWalker::fallback',
			'walker'            => new \jorgelsaud\WordpressTools\NavWalker()
		)
	);
	}
}
add_action('wp_ajax_sendEmail', 'sendEmail');
add_action('wp_ajax_nopriv_sendEmail', 'sendEmail');
if(!function_exists('sendEmail')){
	function sendEmail(){
	$url='https://www.google.com/recaptcha/api/siteverify';
	$emailTo=get_field('email','option');
	$secret='6LdtTyETAAAAAA3OwZ-CTIB1cP-LxEmmaiiONYAb';
	$response=$_POST['data']['g-recaptcha-response'];
	$nombre=$_POST['data']['nombre'];
	$empresa=$_POST['data']['empresa'];
	$telefono=$_POST['data']['telefono'];
	$email=$_POST['data']['email'];
	$producto=$_POST['data']['producto'];
	if ($nombre === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Nombre';
		echo $respuesta;
		die();
	}
	if ($empresa === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Empresa';
		echo $respuesta;
		die();
	}
	if ($telefono === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Telefono';
		echo $respuesta;
		die();
	}
	if ($producto === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese el producto seleccionado';
		echo $respuesta;
		die();
	}
	if ($email === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Email';
		echo $respuesta;
		die();
	}
	if ($mensaje === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Mensaje';
		echo $respuesta;
		die();
	}
	$data=compact('secret','response');
	// var_dump($data);
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
			)
		);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	$jsonResult=json_decode($result);
	if ($jsonResult->success === FALSE) { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Captcha Erroneo';
		echo $respuesta;
		die();
	}
	$subject="{$nombre} les Contacta desde la Web";
	$mensajeEmail = '<html><body>';
	$mensajeEmail.="<p><b>La persona de nombre:</b>{$nombre}</p><p><b>Empresa:</b>{$empresa}</p><p><b>telefono:</b>{$telefono}</p><p><b>email:</b><a href='mailto:{$email}'>{$email}</a></p><p><b>dejo este mensaje en la web:</b></p><p> {$mensaje}</p><p>refiriendose al producto{$producto}</p> ";
	$mensajeEmail.='</body></html>';
	$headers = "From: " . strip_tags($email) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($email) . "\r\n";
	//$headers .= "CC: jorgelsaud@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($emailTo,$subject,$mensajeEmail,$headers);
	die();

	}
}
add_action('wp_ajax_requestDemo', 'requestDemo');
add_action('wp_ajax_nopriv_requestDemo', 'requestDemo');
if(!function_exists('requestDemo')){
	function requestDemo(){
	$url='https://www.google.com/recaptcha/api/siteverify';
	$emailTo=get_field('email','option');
	$nombre=$_POST['data']['nombre'];
	$email=$_POST['data']['email'];
	$telefono=$_POST['data']['telefono'];
	$empresa=$_POST['data']['empresa'];
	$tamano=$_POST['data']['tamano'];
	$mensaje=$_POST['data']['mensaje'];
	if ($nombre === '') { 
		header('Content-type: application/json', true, 401);
		$respuesta = 'Ingrese Su Nombre';
		$json=array('error'=>$respuesta);
		echo json_encode($json);
		die();
	}
	if ($email === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Empresa';
		echo $respuesta;
		die();
	}
	if ($telefono === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Telefono';
		echo $respuesta;
		die();
	}
	if ($empresa === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese Su Empresa';
		echo $respuesta;
		die();
	}
	if ($tamano === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese el producto seleccionado';
		echo $respuesta;
		die();
	}
	if ($mensaje === '') { 
		header('HTTP/1.1 401 Unauthorized', true, 401);
		$respuesta = 'Ingrese el Mensaje seleccionado';
		echo $respuesta;
		die();
	}
	$subject="{$nombre} Solicita un Demo para {$empresa}";
	$mensajeEmail = '<html><body>';
	$mensajeEmail.="<p><b>La persona de nombre:</b>{$nombre}</p><p><b>Empresa:</b>{$empresa} de tamano {$tamano}</p><p><b>telefono:</b>{$telefono}</p><p><b>email:</b><a href='mailto:{$email}'>{$email}</a></p><p><b>mensaje:</b>{$mensaje}</p>";
	$mensajeEmail.='</body></html>';
	$headers = "From: " . strip_tags($email) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($email) . "\r\n";
	//$headers .= "CC: jorgelsaud@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($emailTo,$subject,$mensajeEmail,$headers);
	die();

	}
}
