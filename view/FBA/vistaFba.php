<!DOCTYPE HTML>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../view/FBA/fba.css" />
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdmin.js" type="text/javascript"></script>
<body>
<div>
<p> {{ bienv }} {{ usuario }} </p>
</div>
<div id="titulo">
	{{ titulo }}
</div>
<div class="boardAdmin">
<table border="0" cellpadding="0">
<tr id="tittle">
<img src="../view/img/actividadReciente.png" style="margin-bottom:-50px" />
</tr>
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
</ul>
</div>
<div class="banner2">
<a class="lista" href="{{ raizlogOut }}">{{ cerrar }}</a>

</div>
</body>
</html>
