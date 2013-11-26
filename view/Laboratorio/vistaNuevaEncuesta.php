<!DOCTYPE HTML>

<html>
	<head>
	<title>Encuesta</title>
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
			<img src="{{ titulo }}" alt="Titulo" />
		</div>
		<div id="contenido">
			<form method="POST" action="{{link}}" onSubmit="return confirmar()">
				<table class="table1">	
					<tr>
						<td>
							<table class="table2" >			
								<tr>
									
									{{ tipo_prueba['0'] }}
									<input type="hidden" name="pruebaA" value="{{ tipo_prueba['0'] }}" >
									
								</tr>	
									<tr>
										<td>
											Metodo:
										</td>
										<td>
											<select name="metodoA">
								
													<option>
														{{ metodosA['nombre'] }}
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
														{{ calibradoresA['nombre'] }}
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
														{{ reactivosA['nombre'] }}
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
														{{ papelesA['nombre'] }}
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
											<input name="cutA" type="text" required>
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
										<input type="text" name="resultado1A" required>mg/dl
									</td>
										<td>
											<select name="interpretacion1A">
												
													<option>
														{{ interpretacionesA['0']['nombre'] }}
													</option>
												
											</select>
										</td>
										<td>
											<select name="desicion1A">
												
													<option>
														{{ desicionesA['0']['nombre'] }}
													</option>
											
											</select>
										</td>
								</tr>
								<tr>
									<td>
										92
									</td>
									<td>
										<input type="text" name="resultado2A" required>mg/dl
									</td>
										<td>
											<select name="interpretacion2A">
										
													<option>
														{{ interpretacionesA['1']['nombre'] }}
													</option>
													
											</select>
										</td>
										<td>
											<select name="desicion2A">
											
													<option>
														{{ desicionesA['1']['nombre'] }}
													</option>
												
											</select>
										</td>
								</tr>
						</table>
						<br>
						<table class="table2" >			
								<tr>
									
									{{ tipo_prueba['1'] }}
									<input type="hidden" name="pruebaB" value="{{ tipo_prueba['1'] }}" >
									
								</tr>	
								<tr>
								<td>
											Metodo:
										</td>
										<td>
											<select name="metodoB">
												
													<option>
														{{ metodosB['nombre'] }}
													</option>
												
											</select>
										</td>
									</tr>	
									<tr>
										<td>
											Calibrador:
										</td>
										<td>
											<select name="calibradorB">
												
													<option>
														{{ calibradoresB['nombre'] }}
													</option>
												
											</select>
										</td>
									</tr>
									<tr>
										<td>
											Reactivo:
										</td>
										<td>
											<select name="reactivoB">
												
													<option>
														{{ reactivosB['nombre'] }}
													</option>
										
											</select>
										</td>
									</tr>
									<tr>
										<td>
											Papel de filtro:
										</td>
										<td>
											<select name="papelB">
											
													<option>
														{{ papelesB['nombre'] }}
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
											<input type="text" name="cutB" required>
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
										<input type="text" name="resultado1B" required>mg/dl
									</td>
										<td>
											<select name="interpretacion1B">
												
													<option>
														{{ interpretacionesB['0']['nombre'] }}
													</option>
													
											</select>
										</td>
										<td>
											<select name="desicion1B">
												
													<option>
														{{ desicionesB['0']['nombre'] }}
													</option>
													
											</select>
										</td>
								</tr>
								<tr>
									<td>
										92
									</td>
									<td>
										<input type="text" name="resultado2B" required>mg/dl
									</td>
										<td>
											<select name="interpretacion2B">
										
													<option>
														{{ interpretacionesB['1']['nombre'] }}
													</option>
													
											</select>
										</td>
										<td>
											<select name="desicion2B">
												
													<option>
														{{ desicionesB['1']['nombre'] }}
													</option>
											
											</select>
										</td>
								</tr>
						</table>
						</td>
					</tr>
					<tr>
						<td>
							<br>
							Fecha de análisis:<input type="date" name="fechaAnalisis" required><br><br>
							<input type="hidden" name="fecha_inicio" value="{{ fecha_inicio }}" >
							Comentario:<textarea name="comentario" required></textarea><br>
							<input type="submit" value="Enviar" >
							<br><br>
						</td>
					</tr>
				</table>
			</form>
			<a class="lista" href="{{ volver }}">Volver</a>

		</div>
	</body>
</html>
