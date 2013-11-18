function validar(){
	var p=document.getElementsByTagName("input");
	for (var i = p.length - 1; i >= 0; i--) {
		if( ((p[i].value) == null) || ((p[i].value).length == 0) || (/^\s+$/.test((p[i].value)) )) {
			alert('Ingrese caracteres validos');
  			return false;
	}
}
}	