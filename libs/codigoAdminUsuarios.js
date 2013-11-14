function esconder(){
	$(".formulario").hide();
	$("#volver").hide();
}
window.setTimeout(function(){	$(".formulario").fadeIn("slow");window.setTimeout(function(){$("#volver").fadeIn("slow");},500);},500)