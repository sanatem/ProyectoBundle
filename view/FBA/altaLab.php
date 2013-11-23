<!DOCTYPE HTML>
<html>
<head>	
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../view/FBA/fba.css" />
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdmin.js" type="text/javascript"></script>
<script src="../libs/validarLaboratorio.js" type="text/javascript"></script>
<script src="../libs/apiGoogleMaps.js" type="text/javascript"></script>
<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?
key=AIzaSyCSe8f6EiGWT-ZRzDB2I64ldx4vOwMXTfo&sensor=false">
</script>
<title>Alta laboratorio</title>
</head>
<body onload="initialize()" >
<div class="cabecera">
<a class="lista" href="{{ valueCerrar }}">{{ nameCerrar }}</a>
</div>
<div id="titulo">
<img src="../view/img/bannerPersonalFBA.png" alt="bannerPersonalFBA" >
</div>
<div class="tb">
<form method="POST"  action="{{agregar}}" id="formulario_laboratorio">
<table  >
<tr>
<td>
<p>Institucion</p>
</td>
<td>
<input class="requerido" name="institucion" id="institucion" type="text" placeholder="Introduzca la institucion" required="required" >
</td>
</tr>
<tr>
<td>
<p>Codigo de laboratoro</p>
</td>
<td>
<input class="error" name="codigoLab" id="codigoLab" type="text" placeholder="Introduzca el codigo del laboratorio" required="required" >
</td>
</tr>
<tr>
<td>
<p>Sector</p>
</td>
<td>
<input class="textoinput" name="sector" type="text" placeholder="Introduzca el sector al que pertenece" required="required" >
</td>
</tr>
<tr>
<td>
<p>Responsable</p>
</td>
<td>
<input class="textoinput" name="responsable" type="text" placeholder="Introduzca el responsable" required="required" >
</td>
</tr>
<tr>
<td>
<p>Tipo de laboratorio</p>
</td>
<td>
<div>
</div>
<select name="tipolab">
{% for tp in tipl %}
<option value=" {{tp['id_tipolab']}} " > {{tp['nombre']}} </option>
{% endfor %}
</select>
</td>
</tr>
<tr>
<td>
<p>Direccion</p>
</td>
<td>
<input class="textoinput" name="direccion" type="text" placeholder="Introduzca el domicilio" required="required" >
</td>
</tr>
<tr>
<td>
<p>Domicilio para el envio de correspondencia</p>
</td>
<td>
<input class="textoinput" name="direccion_corres" type="text" placeholder="Introduzca la direccion de correspondencia" required="required" >
</td>
</tr>
<tr>
<td>
<p>Empresa</p>
</td>
<td>
<input class="textoinput" name="empresa" type="text" placeholder="Introduzca la empresa" required="required" >
</td>
</tr>
<tr>
<td>
<p>Codigo postal</p>
</td>
<td>
<input class="textoinput" name="codpost" type="text" placeholder="Introduzca el codigo posta" required="required" >
</td>
</tr>
<tr>
<td>
<p>Tipo Prueba</p>
</td>
<td>
{% for tpr in tip %}
 <input type="checkbox" name="tipopr[]"  value="{{tpr['id_prueba']}}" /><h3>{{tpr['nombre']}}</h3>
{% endfor %}
</td>
</tr>
<tr>
<td>
<p>Correo electronico</p>
</td>
<td>
<input class="textoinput" name="correo" type="text" placeholder="Introduzca el el correo electronico" required="required" >
</td>
</tr>
<tr>
<td>
<p>Telefono</p>
</td>
<td>
<input class="textoinput" name="telefono" type="text" placeholder="Introduzca el telefono" required="required">
</td>
</tr>
<tr>
<td>
<p>Fecha de particiopacion</p>
</td>
<td>
<input class="textoinput" name="fechapart" type="date" required="required" >
</td>
</tr>
<tr>
<td>
<p>Pais</p>
</td>
<td>
<select name="pais">
{% for pa in pai %}
<option class="textoinput" value="{{pa['codigo']}}" > {{pa['nombre']}} </option>
{% endfor %}
</select>
</td>
</tr>
<tr>
<td>
<p>Ciudad</p>
</td>
<td>
<select name="ciudad">
{% for ci in ciud %}
<option class="textoinput" value="{{ci['id']}}" > {{ci['nombre']}} </option>
{% endfor %}
</select>
</td>
</tr>
<tr>
<td>
<p>Latitud</p>
</td>
<td>
<input id="lat" name="lati" type="text" required="required" >
</td>
</tr>
<tr>
<td>
<p>Longuitud</p>
</td>
<td>
<input id="lon" name="long" type="text" required="required" >
</td>
</tr>

</table>
<table class="tabla">
<div id="map-canvas">
</div>
</table>
<input type="submit" value="Agregar" >
</form>
</div>

<div id="navlist">
<ul>
{% for li in list %}
<li><a class="lista" href="{{ li ['value']}}" ><p>{{ li['name'] }}</p></a></li>	    
{% endfor %}
</ul>
</div>
<p>{{ fe }}</p>
</body>
</html>
