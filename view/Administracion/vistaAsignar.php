<!DOCTYPE HTML>
<html>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdminUsuarios.js" type="text/javascript"></script>
<script type="text/javascript" src="../libs/validar.js"></script>
<title>Administracion de entidades</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="css/text" href="../view/vista.css"/>
<body class="laboratorix" onload="esconder()">
<div id="titulo">
<img src="../view/img/bannerAdministracion.png"/>
</div>
<div class="tablaDinamica">
<form method="POST" action="{{raiz}}" onSubmit="return validar()">
<table class="tablaFija" cellpadding="0" border="0" align="center">
	<tr>
		<td><p>Usted ha creado el usuario:</p>
		</td>
		<td><p>{{nombre}}</p>
		</td>
	</tr>
<tr>
<td><p> Debe asignarle un laboratorio:</p>
</td>
<td>
	<select name="nombrelab">
		{% for lab in labs %}
			<option value="{{lab['institucion']}}">{{lab['institucion']}}</option>
		{% endfor %}
    </select>
</td>
</tr>
</table>
<input name="nombreUsur" type="hidden" value="{{nombre}}"/>
<input type="submit" value="Asignar"/>
</form>
</div>
</body>
</html>