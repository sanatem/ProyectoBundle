<!DOCTYPE HTML>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="../view/Administracion/admin.css"/>
<script src="../libs/jquery.js" type="text/javascript"></script>

<body>
<div>
<p>Bienvenido administrador: {{ nombreAdmin }} </p>
</div>
<div id="titulo">
<img src="../view/img/bannerAdministrador.png"/>
</div>
<div class="boardAdmin">
<table border="0" cellpadding="0">
<tr>
<td id="vamosaexperimentar">
</td>	
</tr>
</table>
</div>
<div class="listaAdmin">
<ul>
	<li><a class="lista" href=" {{ raiz }} ">Administrar</a></li>
	<li><a class="lista" href="../view/vistaTablas.php">Tablas de referencia</a></li>
</ul>
</div>
<div class="banner2">
<a class="lista" href=" {{ tablas }} ">Cerrar sesión</a>
</div>
</body>
</html>
