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
			<form method="POST" action="{{link}}">
				<table border="">	
					<tr>
						<td>
							<table border="" >			
								<tr>
									<td>
									{{ tipo_prueba['0'] }}
									<input type="hidden" name="pruebaA" value="{{ tipo_prueba['0'] }}" >
									</td>
								</tr>	
									<tr>
										<td>
											Metodo:
										</td>
										<td>
											<select name="metodoA">
												{% for o in metodosA %}
													<option>
														{{ o['nombre'] }}
													</option>
												{% endfor %}
											</select>
										</td>
									</tr>	
									<tr>
										<td>
											Calibrador:
										</td>
										<td>
											<select name="calibradorA">
												{% for p in calibradoresA %}
													<option>
														{{ p['nombre'] }}
													</option>
												{% endfor %}
											</select>
										</td>
									</tr>
									<tr>
										<td>
											Reactivo:
										</td>
										<td>
											<select name="reactivoA">
												{% for q in reactivosA %}
													<option>
														{{ q['nombre'] }}
													</option>
												{% endfor %}
											</select>
										</td>
									</tr>
									<tr>
										<td>
											Papel de filtro:
										</td>
										<td>
											<select name="papelA">
												{% for r in papelesA %}
													<option>
														{{ r['nombre'] }}
													</option>
												{% endfor %}
											</select>
										</td>
									</tr>
								{% for j in inputs %}
									<tr>
										<td>
											{{ j }}
										</td>
										<td>
											<input name="cutA" type="text" >
										</td>
									</tr>
								{% endfor %}
							</table>
						<br>
						<table border="" >			
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
										<input type="text" name="resultado1A" >mg/dl
									</td>
										<td>
											<select name="interpretacion1A">
												{% for q in interpretacionesA %}
													<option>
														{{ q['nombre'] }}
													</option>
												{% endfor %}	
											</select>
										</td>
										<td>
											<select name="desicion1A">
												{% for r in desicionesA %}
													<option>
														{{ r['nombre'] }}
													</option>
												{% endfor %}	
											</select>
										</td>
								</tr>
								<tr>
									<td>
										92
									</td>
									<td>
										<input type="text" name="resultado2A" >mg/dl
									</td>
										<td>
											<select name="interpretacion2A">
												{% for q in interpretacionesA %}
													<option>
														{{ q['nombre'] }}
													</option>
												{% endfor %}	
											</select>
										</td>
										<td>
											<select name="desicion2A">
												{% for r in desicionesA %}
													<option>
														{{ r['nombre'] }}
													</option>
												{% endfor %}	
											</select>
										</td>
								</tr>
						</table>
						<table border="" >			
								<tr>
									<td>
									{{ tipo_prueba['1'] }}
									<input type="hidden" name="pruebaB" value="{{ tipo_prueba['1'] }}" >
									</td>
								</tr>	
								<tr>
								<td>
											Metodo:
										</td>
										<td>
											<select name="metodoB">
												{% for s in metodosB %}
													<option>
														{{ s['nombre'] }}
													</option>
												{% endfor %}
											</select>
										</td>
									</tr>	
									<tr>
										<td>
											Calibrador:
										</td>
										<td>
											<select name="calibradorB">
												{% for t in calibradoresB %}
													<option>
														{{ t['nombre'] }}
													</option>
												{% endfor %}
											</select>
										</td>
									</tr>
									<tr>
										<td>
											Reactivo:
										</td>
										<td>
											<select name="reactivoB">
												{% for u in reactivosB %}
													<option>
														{{ u['nombre'] }}
													</option>
												{% endfor %}
											</select>
										</td>
									</tr>
									<tr>
										<td>
											Papel de filtro:
										</td>
										<td>
											<select name="papelB">
												{% for v in papelesB %}
													<option>
														{{ v['nombre'] }}
													</option>
												{% endfor %}
											</select>
										</td>
									</tr>
								{% for j in inputs %}
									<tr>
										<td>
											{{ j }}
										</td>
										<td>
											<input type="text" name="cutB" >
										</td>
									</tr>
								{% endfor %}
							</table>
						<br>
						<table border="" >			
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
										<input type="text" name="resultado1B" >mg/dl
									</td>
										<td>
											<select name="interpretacion1B">
												{% for q in interpretacionesA %}
													<option>
														{{ q['nombre'] }}
													</option>
												{% endfor %}	
											</select>
										</td>
										<td>
											<select name="desicion1B">
												{% for r in desicionesA %}
													<option>
														{{ r['nombre'] }}
													</option>
												{% endfor %}	
											</select>
										</td>
								</tr>
								<tr>
									<td>
										92
									</td>
									<td>
										<input type="text" name="resultado2B" >mg/dl
									</td>
										<td>
											<select name="interpretacion2B">
												{% for q in interpretacionesA %}
													<option>
														{{ q['nombre'] }}
													</option>
												{% endfor %}	
											</select>
										</td>
										<td>
											<select name="desicion2B">
												{% for r in desicionesA %}
													<option>
														{{ r['nombre'] }}
													</option>
												{% endfor %}	
											</select>
										</td>
								</tr>
						</table>
						</td>
					</tr>
					<tr>
						<td>
							Fecha de análisis:<input type="date" name="fechaAnalisis" ><br><br>
							<input type="hidden" name="fecha_inicio" value="{{ fecha_inicio }}" >
							Comentario:<textarea name="comentario" ></textarea><br>
							<input type="submit" value="Enviar" >
						</td>
					</tr>
				</table>
			</form>
			<a class="lista" href="{{ volver }}">Volver</a>

		</div>
	</body>
</html>
