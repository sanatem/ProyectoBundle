function esconder(){
	$(".formulario").hide();
	$(".volver").hide();
	window.setTimeout(function(){	$(".formulario").fadeIn("slow");window.setTimeout(function(){$(".volver").fadeIn("slow");},500);},500);
}
function confirmar(){
		
		if (confirm('¿Esta seguro que desea realizar esta operacion?')) 
			return true; 
		else { 
		return false;
		} 
	}
function cargarLab(valor, valor2){
	 location.href=valor+valor2;
	
	
}