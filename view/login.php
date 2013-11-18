<!DOCTYPE HTML>

<html>
<head>
<title>Login sistema</title>
<meta charset="UTF-8"/>
<link rel="stylesheet" type="text/css" href="../view/vista.css"/>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigologin.js" type="text/javascript"></script>
<script type="text/javascript" src="../libs/validar.js"></script>
</head>
<body class="laboratorix" onload="esconder()">
<div id="titulo">
<img src="../view/img/titulo.png" alt="Laboratorios bioquimica argentina"/>
</div>
<div id="centrado">
<p>Ingrese nombre de usuario y contrase&ntilde;a</p>
<form class="formulario" method="POST" action="{{raiz}}" onsubmit="return validar()">
<table border="">
<tr>
<td>
<p>Usuario</p>
</td>
<td>
<input class="textoinput" name="usuario" type="text" placeholder="Introduzca su usuario" required>
</td>
</tr>
<tr>
<td>
<p>Contrase&ntilde;a</p>
</td>
<td>
<input class="textoinput" name="contrasena" type="password" placeholder="Introduzca password" required/>
</td>
</tr>
</table>
<input type="submit" value="Ingresar"/>
</form>
</div>
<div id="banner1">
<img src="../view/img/quienesBanner.png" alt="banner"/>
<p>Somos una fundación sin fines de lucro que busca el bienestar tanto social como su salud, nos encargamos de purificar muestras y asegurar la mayor exactitud en los examenes de los laboratorios para conseguir un mejor estandar</p>
</div>
{% if error| length> 0 %}
<div class="error">
	<p>Error de usuario o contrase&ntilde;a</p>
</div>
{% endif %}
</body>
</html>