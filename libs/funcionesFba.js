function cargarLab(valor, valor2){
	 location.href=valor+'&estado='+valor2;
	
}
function cargarEncu(valor, valor2){
	location.href=valor+'&tipo='+valor2;
}
function confirmar(){
	if (confirm('¿Esta seguro que desea realizar esta operacion?')) {


			return true; 
		}
		else { 
		return false;
		} 
	}
