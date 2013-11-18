<!DOCTYPE HTML>
<html>
<head>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdminUsuarios.js" type="text/javascript"></script>
<script type="text/javascript" src="../libs/validar.js"></script>
<link rel="stylesheet" type="css/text" href="../view/vista.css"/>
<title>Administracion de entidades</title>
<meta charset="utf-8"/>
</head>
<body class="laboratorix" onload="esconder()">
<div id="titulo">
<img src="../view/img/bannerAdministracion.png" alt="bannerAdministrador"/>
</div>
<div>
<form class="formulario" method="POST" action="{{modificar}}" onSubmit="return confirmar()">
<div class="tablaDinamic">
<table border="1">
    <tr>
    <td><p>Nombre</p>
    </td>
    <td><p>Contrase&ntilde;a</p>
    </td>
    <td><p>Tipo_roll</p>
    </td>
	<tr>
	<td><input name="usr" type="text" value="{{usuarios['nombre']}}" required="required"/></td>
	<td><input name="psw" type="password" value="{{usuarios['contrasena']}}" required="required"/></td>
	<td><input name="tpr" type="text" value="{{usuarios['tipo_roll']}}"/></td>
	</tr>
</table>
</div>
<input name="iduser" type="hidden" value="{{usuarios['id_us']}}"/>
<input type="submit" value="modificar" onclick="return validar()"/>
</form>
</div>
<div class="volver" >
<a class="lista" href="{{volver}}">Volver</a>
</div>
<div class="banner2">
<a class="lista" href="{{lagg}}">Cerrar sesión</a>
</div>
</body>
</html>