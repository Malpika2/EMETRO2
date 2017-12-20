EnviarInspeccion = function($idsolicitud){
$('#MensajeEnvio').append('<div class="alert alert-warning alert-dismissable fade in" style="padding:0px; margin:1px;">'+
	    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
		'Inicio de envio de datos</div>');
	$.post(baseurl+"Inspector/Inspecciones/Enviar",
		{
			idsolicitud:$idsolicitud
		},
		function(data){
		$('#MensajeEnvio').append('<div class="alert alert-success alert-dismissable fade in" style="padding:0px; margin:1px;">'+
			'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
			'Plan orgánico enviado</div>');
		$('#MensajeEnvio').append('<div class="alert alert-success alert-dismissable fade in" style="padding:0px; margin:1px;">'+
			'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
			'Reporte de inspección enviado</div>');
		$('#MensajeEnvio').append('<div class="alert alert-success alert-dismissable fade in" style="padding:0px; margin:1px;">'+
			'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
			'Envio de datos terminado</div>');
		}
	);
}

$('#form, #fat, #form_firma').submit(function() {
          $.ajax({
              type:'POST',
              url:$(this).attr('action'),
              data:$(this).serialize(),
              success: function(data) { 
              	$('#firma_nombre').prop( "disabled", true );
              }
          });
        return false;
});
$('#form, #fat, #form_revision_solicitud').submit(function() {
          $.ajax({
              type:'POST',
              url:$(this).attr('action'),
              data:$(this).serialize(),
              success: function(data) { 
                $('#inputSubmitForm').prop("disabled",true);
              }
          });
        return false;
});
//Inspeccion
$('#form, #fat, #form_autorizacion_orden').submit(function() {
          $.ajax({
              type:'POST',
              url:$(this).attr('action'),
              data:$(this).serialize(),
              success: function(data) { 
                $('#btn_Autorizar').prop("disabled",true);
              }
          });
        return false;
});
//PMO
$('#form, #fat, #form_GuardarPregunta').submit(function(){
          $.ajax({
              type:'POST',
              url:$(this).attr('action'),
              data:$(this).serialize(),
              success: function(data) { 
              }
          });
        return false;
});

