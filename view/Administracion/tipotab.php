<!DOCTYPE HTML>
<html>
<head>
<title>Tablas de referencia</title>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdminUsuarios.js" type="text/javascript"></script>
<script type="text/javascript" src="../libs/validar.js"></script>
<meta charset="utf-8"/>
<link rel="stylesheet" type="css/text" href="../view/vista.css"/>
</head>
<body class="laboratorix" onload="esconder()">
<div id="titulo">
<img src="../view/img/bannerTablas.png" alt="bannerTablas"/>
</div>
<div>
<form class="formulario" method="POST" action="{{modificar}}" onSubmit="return confirmar()">
<div class="tablaDinamic">
<table border="">
    <tr>
    <td><p>Nombre</p>
    </td>
    <td><p>Tipo</p>
    </td>
    <td><p>Codigo</p>
    </td>
	<tr>
	{% for prob in tipotab %}
	<td><input name="nom" type="text" value="{{prob['nombre']}}" required="required"></td>
	<td><input name="tip" type="text" value="{{prob['tipo']}}" required="required"></td>
	<td><input name="cod" type="text" value="{{prob['codigo']}}" required="required">
	<input name="id" type="hidden" value="{{prob[0]}}"/></td>
	{% endfor %}
	</tr>
</table>
</div>
<input name="quesoy" type="hidden" value="{{quesoy}}">
<input name="tipprub" type="hidden" value="{{tip_prub}}">
<input type="submit" value="Modificar">
</form>
</div>
<div class="volver" >
<a class="lista" href="{{logg}}">Volver</a>
</div>
<div class="banner2">
<a class="lista" href="{{lagg}}">Cerrar sesión</a>
</div>
</body>
</html>