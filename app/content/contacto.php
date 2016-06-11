<div class="slider" id="inicio">
	<img src="img/topContactos.jpg" alt="top" class="img-responsive">
</div>
<section class="Progress">
	<div class="container flexible">
		<div class="Progress__Titulo">
			<p>Contacto</p>
		</div>
		<div class="Progress__Subtitulo">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commo.</p>
		</div>
	</div>
</section>
<section class="Direccion container">
	<div class="Direccion__texto">
		<div class="Drieccion__texto__Linea1">
			<p>
				Serrano 73, Oficentro Business Center,
			</p>
		</div>
		<div class="Drieccion__texto__Linea2">
			<p>
				Piso 11, Oficina 1107, Santiago Centro.				
			</p>
		</div>
		<div class="Direccion__texto__telefono">
			<p>	
				Tlf: <a href='tel:+56232069749'>+56 2 3206 9749</a>
			</p>
		</div>
		<div class="Direccion__texto__email">
			<p>
			Mail: <a href="mailto:info@progresserp.cl">info@progresserp.cl</a>
			</p>
		</div>
		<div class="Direccion__texto__socials">

							<a href="https://www.facebook.com/progresserp/"><span class="socicon socicon-facebook"></span></a>	
							<a href="

https://twitter.com/ProgressERP"><span class="socicon socicon-twitter"></span></a>	
							<a href="https://www.linkedin.com/company/progress-erp"><span class="socicon socicon-linkedin"></span></a>	
		</div>
	</div>
	<div class="Direccion__mapa">
		<div id="map"></div>
	</div>
</section>
	<form id="emailForm" class="ContactForm container" action="enviarCorreo.php" method="POST">
	<div class="FormHalf">
		<div class="formField">
			<input type="text" name="nombre" placeholder="* Nombre" required>
		</div>
		<div class="formField">
			<input type="text" name="empresa" placeholder="* Empresa" required>
		</div>
		<div class="formField">
			<input type="text" name="telefono" placeholder="* Telefono" required>
		</div>
		<div class="formField">
			<input type="email" name="email" placeholder="* email" required>
		</div>
		<div class="formField">
			<select name="producto" required>
				<option value="">Seleccione un Producto</option>
				<option value="POS">Progress POS</option>
				<option value="DTE">Progress DTE</option>
				<option value="PROD">Progress PROD</option>
				<option value="PYME">Progress PYME</option>
			</select>
		</div>
	</div>
	<div class="FormHalf">
		<div class="formField">
			<textarea id="mensaje" name="mensaje" cols="30" rows="10" placeholder="* Mensaje" required></textarea>
		</div>
		<div class="formField">
			<div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LdtTyETAAAAAMWdzaftef7b6LKST4YMQAiuqiNF"></div>
			<button id="enviarEmail" type="submit" disabled>Enviar</button>
		</div>
	</div>
</form>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByDsDQWBV5XMBpz2wWHu6RqhFBNtL_70o&callback=initMap"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">

var map;
function initMap() {
	if(document.getElementById('map')){
		var geocoder = new google.maps.Geocoder();
		geocodeAddress(geocoder);
	}
}

function geocodeAddress(geocoder) {
	var url=location.origin;
	var address ='Serrano 73, Santiago, cl';
	window.address=address;
	console.log(address);
	var image = {
	url: url+'/wp-content/themes/politicaygobierno/img/maps-marker-politica.png',
		// This marker is 20 pixels wide by 32 pixels high.
		size: new google.maps.Size(147, 80),
		// The origin for this image is (0, 0).
		origin: new google.maps.Point(0, 0),
		// The anchor for this image is the base of the flagpole at (0, 32).
		anchor: new google.maps.Point(70, 80)
	};
	geocoder.geocode({'address': address}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			map = new google.maps.Map(document.getElementById('map'), {
			center: results[0].geometry.location,
				zoom: 16
			});
			var marker = new google.maps.Marker({
			map: map,
				//		icon: image,
				zoomControl: true,
				scaleControl: true,
				position: results[0].geometry.location
			});
		} else {
			alert('Geocode was not successful for the following reason: ' + status);
		}
	});
}


</script>
<script>
	function recaptchaCallback(){
	 $('#enviarEmail').removeAttr('disabled');
	}
	$('#enviarEmail').click(function(e) {
		e.preventDefault();
//		$('#emailForm').serialize();
		$.ajax({
			url: 'enviarCorreo.php', 
			type: 'POST', 
			dataType: 'text', 
			data: $('#emailForm').serialize(), 
			success: function() {
				swal({title:"Listo!",text:"Pronto nos Contactaremos con Usted!", type:"success"},function(){
				window.location.href ='productosyservicios.php';
				});
			},
			error: function(e) {
				swal({title:"Listo!",text:"ha Sucedido un error "+e, type:"error"},function(){

				});

			}
		}); 
	});
</script>
