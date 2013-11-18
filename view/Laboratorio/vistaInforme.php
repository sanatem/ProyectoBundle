<!DOCTYPE HTML>

<html>
	<head>
	<title>Informes</title>
	<link rel="stylesheet" type="text/css" href="../view/Laboratorio/vistalaboratorio.css"/>
	<meta charset="utf-8"/>
	<script src="../libs/jquery.js" type="text/javascript"></script>
	<script src="../libs/codigoAdminUsuarios.js" type="text/javascript"></script>
	</head>
	<body class="laboratorix" onload="esconder()">
		<div class="cabecera">
			<h3>Bienvenido usuario: {{user_name}}</h3>
			<a href="{{ cerrar_sesion }}">Cerrar Sesión</a>
		</div>
		<div id="titulo">
			<img src="{{ titulo }}" alt="titulo"/>
		</div>
		<div id="contenido">
			{% for i in subtitulo %}
				<h3>{{ i }}</h3>
				<table border="" >			
					{% for j in contenido %}
						<tr>
							<td>
								<form class="formulario" action="{{ link }}" method="POST" name="formulario">
									<input disabled type="text" value="{{ j[pedido] }}">
									<input type="hidden" name="nombre_prueba" value="{{ j[pedido] }}">									
									<input type="submit" value="{{ accion }}">
								</form>
							</td>
						</tr>						
					{% endfor %}
				</table>
			{% endfor %}
			<h1><a class="lista" href="{{ volver }}">Volver</a></h1>

		</div>
	</body>
</html>
