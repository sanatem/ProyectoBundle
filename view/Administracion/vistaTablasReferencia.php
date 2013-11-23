<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="../view/vista.css"/>
<title>Administracion de tablas</title>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdmin.js" type="text/javascript"></script>
</head>
<body class="laboratorix" onload="esconder()">
<div class="cabecera">
<a href="{{lagg}}">Cerrar sesión</a>
</div>
<div id="titulo">
<img src="../view/img/bannerTablas.png" alt="bannerTablas.png"/>
</div>
<table class="table1" border="">
	<tr>
	<td class="separados"><p>Elija tipo de prueba</p></td>
    </tr>
		{% for pro in prometeo %}
        <tr>
        <td class="separados"><a class="lista" href="{{tablax}}&amp;action={{pro['nombre']}}">{{ pro['nombre']}}</a></td>
        </tr>
        {% endfor %}
</table>
<div class="formulario">
<a class="lista" href="{{logg}}">Volver</a><br>
</div>
</body>
</html>