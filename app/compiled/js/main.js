var map;
function initMap() {
	if(document.getElementById('map')){
		var geocoder = new google.maps.Geocoder();
		geocodeAddress(geocoder);
	}
}

function geocodeAddress(geocoder) {
	var url=location.origin,
		address =String(vars.mapa);
	window.address=address;
	console.log(address);
		/*var image = {
	url: url+'/wp-content/themes/politicaygobierno/img/maps-marker-politica.png',
	// This marker is 20 pixels wide by 32 pixels high.
size: new google.maps.Size(147, 80),
	// The origin for this image is (0, 0).
origin: new google.maps.Point(0, 0),
	// The anchor for this image is the base of the flagpole at (0, 32).
anchor: new google.maps.Point(70, 80)
};*/
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
$.fn.serializeObject = function()
{
	var o = {};
	var a = this.serializeArray();
	$.each(a, function() {
		if (o[this.name] !== undefined) {
			if (!o[this.name].push) {
				o[this.name] = [o[this.name]];
			}
			o[this.name].push(this.value || '');
		} else {
			o[this.name] = this.value || '';
		}
	});
	return o;
};
function recaptchaCallback(){
	$('#enviarEmail').removeAttr('disabled');
	$('#enviarFormularioLanding').removeAttr('disabled');

}
$('#enviarFormularioLanding').click(function(e){
	e.preventDefault();
	console.log(vars.ajaxurl);
	$.post(vars.ajaxurl, {data:$('#landingForm').serializeObject(),action:'requestDemo'}, function(data, textStatus, xhr) {
		//swal({title:"Listo!",text:"Pronto nos Contactaremos con Usted!", type:"success"},function(){
		window.location.href =vars.redirectDemo;
		//});
	}).fail(function(e) {
		swal({title:"Listo!",text:"ha Sucedido un error "+e, type:"error"},function(){

		});
	})
});
$('#enviarEmail').click(function(e) {
	e.preventDefault();
	console.log(vars.ajaxurl);
	$.post(vars.ajaxurl, {data:$('#emailForm').serializeObject(),action:'sendEmail'}, function(data, textStatus, xhr) {
		//swal({title:"Listo!",text:"Pronto nos Contactaremos con Usted!", type:"success"},function(){
		window.location.href =vars.redirect;
		//});
	}).fail(function(e) {
		swal({title:"Listo!",text:"ha Sucedido un error "+e, type:"error"},function(){

		});
	})
}); 
$('a[href*="#"]').on('click', function(event){     
	event.preventDefault();
	$('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
});
