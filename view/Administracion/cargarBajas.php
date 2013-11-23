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
<div class="cabecera">
<a href="{{lagg}}">Cerrar sesión</a>
</div>
<div id="titulo">
<img src="../view/img/bannerAdministracion.png" alt="bannerAdministrador"/>
</div>
<div>
<form class="formulario" method="POST" action="{{modificar}}" onSubmit="return confirmar()">
<div class="tablaDinamic">
<table class="table1" border="">
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
	<td>
        <select name="tpr">
            {%for tip in tipos %}
            <option value="{{tip['id_roll']}}">{{tip['nombre']}}</option>
            {% endfor %}
        </select>
    </td>
	</tr>
</table>
</div>
<input name="iduser" type="hidden" value="{{usuarios['id_us']}}"/>
<input type="submit" value="modificar" onclick="return validar()"/>
</form>
</div>
<br>
<div class="formulario" >
<a class="lista" href="{{volver}}">Volver</a>
</div>
</body>
</html>