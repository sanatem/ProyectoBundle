<!DOCTYPE HTML>

<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../view/Laboratorio/vistalaboratorio.css" />
	<meta charset="utf-8"/>
	<script src="../libs/jquery.js" type="text/javascript"></script>
	<script src="../libs/codigoAdmin.js" type="text/javascript"></script>
	<title>Laboratorio</title>		
	</head>
	<body class="laboratorix" onload="esconder()">
		<div class="cabecera">
			<h3>Bienvenido usuario: {{user_name}}</h3>
			<a href="{{ cerrar_sesion }}">Cerrar Sesión</a>
		</div>
		<div id="titulo">
			<img src="../view/img/bannerLaboratorio.png" alt="Laboratorio" />
		</div>
		<div class="barraizq">	
			<ul>				
				{% for i in list %}
					<li>
						<h3><a href="{{ i['value'] }}">{{ i['name'] }}</a></h3>
					</li>
				{% endfor %}
				{% if soyAdmin| length> 0 %}
					<li>
						<h3><a href="{{soyAdmin}}">Volver</a></h3>
					</li>
				{% endif %}
			</ul>
		</div>
		<div class="barrader">
			{{ contenido }}
		</div>
	</body>
</html>