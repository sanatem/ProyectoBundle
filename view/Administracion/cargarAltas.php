<!DOCTYPE HTML>
<html>
<head>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdminUsuarios.js" type="text/javascript"></script>
<script type="text/javascript" src="../libs/validar.js"></script>
<title>Administracion de entidades</title>
<meta charset="utf-8"/>
<link rel="stylesheet" type="css/text" href="../view/vista.css"/>
</head>
<body class="laboratorix" onload="esconder()">
<div id="titulo">
<img src="../view/img/bannerAdministracion.png" alt="bannerAdminsitracion"/>
</div>
<div class="tablaDinamica">
<form method="POST" action="{{raiz}}" onSubmit="return validar()">
<table class="tablaFija">
<tr>
<td>
<p>Introdusca el nombre del usuario</p>
</td>
<td>
<input class="textoinput" name="nombre" type="text" placeholder="Introduzca su usuario" required>
</td>
</tr>
<tr>
<td>
<p>Seleccione el tipo de usuario</p>
</td>
<td>
{% for op in nomTipos %}
<input type="radio" name="tipo" value="{{op['id_roll']}}"><p>{{op['nombre']}}</p><br>
{% endfor %}
</td>
</tr>
<tr>
<td>
<p>Introdusca la Contrase&ntilde;a del usuario</p>
</td>
<td>
<input class="textoinput" name="contrasena" type="password" placeholder="Introduzca password" required>
</td>
</tr>
</table>
<input type="submit" value="Ingresar">
</form>
	{% if not error is empty %}
		<div>
 			<p>El usuario ya se encuentra en la base de datos</p> 
		</div>
	{% endif %}
</div>
<div class="botonVolver">
<a class="lista" href="{{volver}}">Volver</a>
</div>
<div class="banner2">
<a class="lista" href="{{lagg}}">Cerrar sesión</a>
</div>
</body>
</html>