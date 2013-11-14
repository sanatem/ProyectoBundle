<!DOCTYPE HTML>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="../view/vista.css"/>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigologin.js" type="text/javascript"></script>
<body class="laboratorix" onload="esconder()">
<div id="titulo">
<img src="../view/img/titulo.png" alt="Laboratorios bioquimica argentina"/>
</div>
<div id="centrado">
<p>Ingrese nombre de usuario y contrase&ntilde;a</p>
<form class="formulario" method="POST" action="{{raiz}}" />
<table cellpadding="0" border="0">
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
<input class="textoinput" name="contrasena" type="password" placeholder="Introduzca password" required>
</td>
</tr>
</table>
{% if   error is not empty  %}
	<p> {{ error }} </p>

{% endif %}
<input type="submit" value="Ingresar">

</div>
<div id="banner1">
<img src="../view/img/quienesBanner.png" alt="banner"/>
</div>
</form>

</body>
</html>
