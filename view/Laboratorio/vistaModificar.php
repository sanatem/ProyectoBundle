<!DOCTYPE HTML>

<html>
<head>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdminUsuarios.js" type="text/javascript"></script>
<title>Modificar datos</title>
<meta charset="utf-8"/>
<link rel="stylesheet" type="css/text" href="../view/Laboratorio/vistaLaboratorio.css"/>
</head>
<body class="laboratorix" onload="esconder()">
<div class="cabecera">
			<h3>Bienvenido usuario: {{user_name}}</h3>
			<a href="{{ cerrar_sesion }}">Cerrar Sesión</a>
</div>
<div id="titulo">
	<img src="{{ titulo }}" alt="titulo"/>
</div>
<div>
<form class="formulario" method="POST" action="{{modificar}}" onSubmit="return confirmar()">
<table border="" >
	{% for i in datos %}
			<tr>
				<td>{{ i['name'] }}</td>
				<td><input name="{{ i['name'] }}" type="text" value="{{ i['value'] }}"/></td>
			</tr>
	{% endfor %}
</table>
<input name="iduser" type="hidden" value="{{usuarios['id_us']}}"/>
<br>
<input type="submit" value="Modificar"/>
</form>
</div>
<br>
<div class="volver" >
<a class="lista" href="{{volver}}">Volver</a>
</div>
</body>
</html>