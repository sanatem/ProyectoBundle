<!DOCTYPE HTML>
<html>
<head>
<title>Vista Admin</title>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="../view/vista.css"/>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdmin.js" type="text/javascript"></script>
</head>
<body class="laboratorix" onload="esconder()">
<div class="cabecera">
	<h3>Bienvenido usuario: {{nombreAdmin}}</h3>
	<a href="{{logg}}">Cerrar sesión</a>
</div>
<div id="titulo">
<img src="../view/img/bannerAdministrador.png" alt="bannerAdministrador"/>
</div>
<div class="boardAdmin">
<img src="../view/img/actividadReciente.png" style="margin-bottom:-50px" alt="bannerReciente"/>
<table border="">
<tr>
<td id="vamosaexperimentar">
</td>	
</tr>
</table>
</div>
<div class="listaAdmin">
<ul>
	<h4>
	<li><a href="{{raiz}}">Administrar</a></li>
	<li><a href="{{tablas}}">Tablas de referencia</a></li>
	<li><a href="{{parteFBA}}">Administrar como FBA</a></li>
	
	</h4>
</ul>
</div>
</body>
</html>
