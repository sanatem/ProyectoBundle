<!DOCTYPE HTML>

<html>
	<head>
	<title>Encuestas</title>
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
				<h3><a href="{{ link0 }}">{{ subtitulo[0] }}</a></h3>
				<br>
				<h3>{{ subtitulo[1] }}</h3>
				{% for j in contenido %}
					<table class="table1" >			
						<tr>
							<form class="formulario" action="{{ link1 }}" method="POST" >
								<input type="hidden" name="id_resultado" value="{{ j['id_resultado'] }}">
								<td>
									{{ j['nombre'] }}
								</td>
								<td>
									Fecha de análisis: {{ j['fecha_analisis'] }}
								</td>	
								<td>								
									<input type="submit" value="{{ accion }}">
								</td>
							</form>
						</tr>						
					</table>
				{% endfor %}
			<h1><a class="lista" href="{{ volver }}">Volver</a></h1>

		</div>
	</body>
</html>
