<!DOCTYPE HTML>

<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../view/FBA/fba.css" />
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdmin.js" type="text/javascript"></script>
<title>Personal de la FBA</title>
</head>
<body>
<div class="cabecera">
<p> {{ bienv }} {{ usuario }} </p>
<a class="lista" href="{{ raizlogOut }}">{{ cerrar }}</a>
</div>
<div id="titulo">
<img src="../view/img/bannerPersonalFBA.png" alt="baner"/>
</div>
<div class="boardAdmin">
<table>
<tr>
<td id="vamosaexperimentar">
</td>	
</tr>
</table>
</div>
<div class="listaAdmin">
<ul>
{% for item in li %}
 <li><a class="lista" href="{{ item['value'] }}">{{ item['name'] }} </a></li>
{% endfor %}
{% if soyAdmin| length> 0 %}
	<li>
		<a class="lista" href="{{soyAdmin}}">Volver</a>
	</li>
{% endif %}
</ul>
</div>
<div class="banner2">

</div>
</body>
</html>
