<?php
	$url='https://www.google.com/recaptcha/api/siteverify';
	$emailTo=get_field('email','option');
	$secret='6LdtTyETAAAAAA3OwZ-CTIB1cP-LxEmmaiiONYAb';
	var_dump($_POST);
	$response=$_POST['g-recaptcha-response'];
	$nombre=$_POST['nombre'];
	$empresa=$_POST['empresa'];
	$telefono=$_POST['telefono'];
	$email=$_POST['email'];
	$producto=$_POST['producto'];
	$mensaje=$_POST['mensaje'];
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
	$mensajeEmail='</body></html>';
	$headers = "From: " . strip_tags($email) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($email) . "\r\n";
	$headers .= "CC: jorgelsaud@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	wp_mail($emailTo,$subject,$mensajeEmail,$headers);
	die();

