<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../view/FBA/fba.css" />
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdmin.js" type="text/javascript"></script>
<title>Modificar Laboratorio</title>
</head>
<body>
<div id="titulo">
<img src="../view/img/bannerPersonalFBA.png" alt="banner"/>
</div>
<div class="tb">
<form method="POST" action="{{modificar}}">
<table >
<tr>
<td>
<p>Institucion</p>
</td>
<td>
<input class="textoinput" name="institucion" type="text" value="{{lab['institucion']}}" required>
</td>
</tr>
<tr>
<td>
<p>Codigo de laboratoro</p>
</td>
<td>
<input class="textoinput" name="codigoLab" type="text" value="{{lab['codigo_lab']}}" required>
<input class="textoinput" name="viejoCodLab" type="hidden" value="{{lab['codigo_lab']}}" >
</td>
</tr>
<tr>
<td>
<p>Sector</p>
</td>
<td>
<input class="textoinput" name="sector" type="text" value="{{lab['sector']}}" required>
</td>
</tr>
<tr>
<td>
<p>Responsable</p>
</td>
<td>
<input class="textoinput" name="responsable" type="text" value="{{lab['responsable']}}"  required>
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
     <option value="{{tp['id_tipolab']}}" {% if lab['tipo_de_laboratorio'] == tp['id_tipolab'] %} {{sele}} {% endif %} >{{tp['nombre']}}</option>
{% endfor %}
</select>
</td>
</tr>
<tr>
<td>
<p>Direccion</p>
</td>
<td>
<input class="textoinput" name="direccion" type="text" value="{{lab['domicilio']}}" required>
</td>
</tr>
<tr>
<td>
<p>Domicilio para el envio de correspondencia</p>
</td>
<td>
<input class="textoinput" name="direccion_corres" type="text" value="{{lab['domicilio_correspondensia']}}"  required>
</td>
</tr>
<tr>
<td>
<p>Empresa</p>
</td>
<td>
<input class="textoinput" name="empresa" type="text" value="{{lab['empresa']}}"  required>
</td>
</tr>
<tr>
<td>
<p>Codigo postal</p>
</td>
<td>
<input class="textoinput" name="codpost" type="text" value="{{lab['codigo_postal']}}"  required>
</td>
</tr>
<tr>
<td>
<p>Tipo Prueba</p>
</td>
<td>

{% for tpr in tip %}
    <input type="checkbox" name="tipopr[]"  {% if pruLab['id_prueba'] == tpr['id_prueba'] %} {{check}} {% endif %} value="{{tpr['id_prueba']}}"><h3>{{tpr['nombre']}}</h3>

{% endfor %}

</td>
</tr>
<tr>
<td>
<p>Correo electronico</p>
</td>
<td>
<input class="textoinput" name="correo" type="text" value="{{lab['correo_electronico']}}" required>
</td>
</tr>
<tr>
<td>
<p>Telefono</p>
</td>
<td>
<input class="textoinput" name="telefono" type="text" value="{{lab['telefono']}}"  required>
</td>
</tr>
<tr>
<td>
<p>Fecha de particiopacion</p>
</td>
<td>
<input class="textoinput" name="fechapart"  type="date" value="{{lab['fecha_participacion']}}" required>
</td>
</tr>
<tr>
<td>
<p>Pais</p>
</td>
<td>
<select name="pais">
{% for pa in pai %}
     <option class="textoinput" {% if pa['codigo'] == lab['id_pais'] %} {{sele}} {% endif %} value="{{pa['codigo']}}"> {{pa['nombre']}} </option>
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
     <option class="textoinput" {% if ci['id'] == lab['id_ciudad'] %} {{sele}} {% endif %} value="{{ci['id']}}"> {{ci['nombre']}} </option>
{% endfor %}
</select>
</td>
</tr>
{% if lab['estado'] == '1' %}
<tr>
<td>
<p>Estado</p>
</td>
<td>
<select name="estado">

     <option class="textoinput" {% if lab['estado'] == '0' %} {{sele}} {% endif %} value="0">Activo</option>
     <option class="textoinput" {% if lab['estado'] == '1' %} {{sele}} {% endif %} value="1">De baja</option>

</select>
<input class="textoinput" name="estadoViejo" type="hidden" value="{{lab['estado']}}" >
</td>
</tr>
{% endif %}
<tr>
<td>
<p>Su usuario</p>
</td>
<td>
<div>
</div>
<input class="textoinput" name="usuario" readonly  type="text" value="{{user['nombre']}}" required>
<input class="textoinput" name="usu" type="hidden" value="{{user['id_us']}}" >
</td>
</tr>
</table>
<input class="textoinput" name="idlab" type="hidden" value="{{lab['id_laboratorio']}}" >
<input type="submit" value="Modificar">
</form>
</div>

<div id="navlist">
<ul>
	{% for li in list %}
		<li><a class="lista" href="{{ li ['value']}}" > <p>{{ li['name'] }}</p></a></li>
	    
	{% endfor %}
</ul>
</div>
</body>
</html>