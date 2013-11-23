<!DOCTYPE HTML>

<html>
<head>
<script src="../libs/jquery.js" type="text/javascript"></script>

<title>Modificar datos</title>
<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../view/Laboratorio/vistalaboratorio.css" />
</head>
<body class="laboratorix" onload="initialize2(-34.914998,-57.948164)" >
<div class="cabecera">
			<h3>Bienvenido usuario: {{user_name}}</h3>
			<a href="{{ cerrar_sesion }}">Cerrar Sesión</a>
</div>
<div id="titulo">
	<img src="{{ titulo }}" alt="titulo"/>
</div>
<div id="contenido">
<form class="formulario" method="POST" action="{{modificar}}" onSubmit="return confirmar()">
<table class="table2" >
	{% for i in datos %}
			<tr>
				<td>{{ i['name'] }}</td>
				<td><input name="{{ i['name'] }}" type="text" value="{{ i['value'] }}" required/></td>
			</tr>
	{% endfor %}
</table>


<input name="iduser" type="hidden" value="{{usuarios['id_us']}}"/>

<input name="codlab" type="hidden" value="{{datos['l1']['value']}}"/>
<br>

<input type="submit" value="Modificar"/>
</form>

<br>
{% if mensaje| length> 0 %}
	{{mensaje}}
{% endif %}
<br>
<a class="lista" href="{{volver}}">Volver</a>
</div>
</body>
</html>