<!DOCTYPE HTML>

<html>
	<head>
	<title>Resultados</title>
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
			<table class="table2" >			
				<tr>
					
					{{ contenido['nombre'] }}
					
				</tr>	
					<tr>
						<td>
							Metodo:
						</td>
						<td>
							<select name="metodoA">
				
									<option>
										{{ metodo['nombre'] }}
									</option>
								
							</select>
						</td>
					</tr>	
					<tr>
						<td>
							Calibrador:
						</td>
						<td>
							<select name="calibradorA">
								
									<option>
										{{ calibrador['nombre'] }}
									</option>
						
							</select>
						</td>
					</tr>
					<tr>
						<td>
							Reactivo:
						</td>
						<td>
							<select name="reactivoA">
							
									<option>
										{{ reactivo['nombre'] }}
									</option>
					
							</select>
						</td>
					</tr>
					<tr>
						<td>
							Papel de filtro:
						</td>
						<td>
							<select name="papelA">
							
									<option>
										{{ papel['nombre'] }}
									</option>
						
							</select>
						</td>
					</tr>
				{% for j in inputs %}
					<tr>
						<td>
							{{ j }}
						</td>
						<td>
							{{ contenido['valor_corte'] }}
						</td>
					</tr>
				{% endfor %}
			</table>
		<br>
		<table class="table2" >			
			<tr>
			{% for k in campos %}
				<td>
					{{ k }}
				</td>
			{% endfor %}
			</tr>
				<tr>
					<td>
						91
					</td>
					<td>
						{{ contenido['res_control_muestra1'] }} mg/dl
					</td>
						<td>
							<select name="interpretacion1A">
								
									<option>
										{{ interpretacion['0']['nombre'] }}
									</option>
								
							</select>
						</td>
						<td>
							<select name="desicion1A">
								
									<option>
										{{ desicion['0']['nombre'] }}
									</option>
							
							</select>
						</td>
				</tr>
				<tr>
					<td>
						92
					</td>
					<td>
						{{ contenido['res_control_muestra2'] }} mg/dl
					</td>
						<td>
							<select name="interpretacion2A">
						
									<option>
										{{ interpretacion['1']['nombre'] }}
									</option>
									
							</select>
						</td>
						<td>
							<select name="desicion2A">
							
									<option>
										{{ desicion['1']['nombre'] }}
									</option>
								
							</select>
						</td>
				</tr>
			</table>
			<h1><a class="lista" href="{{ volver }}">Volver</a></h1>

		</div>
	</body>
</html>
