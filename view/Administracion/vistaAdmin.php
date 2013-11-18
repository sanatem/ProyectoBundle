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
<div>
<p>Bienvenido administrador: {{nombreAdmin}}</p>
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
	<li><a class="lista" href="{{raiz}}">Administrar</a></li>
	<li><a class="lista" href="{{tablas}}">Tablas de referencia</a></li>
</ul>
</div>
<div class="banner2">
<a class="lista" href="{{logg}}">Cerrar sesión</a>
</div>
</body>
</html>
