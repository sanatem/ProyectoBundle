<!DOCTYPE HTML>
<html>
	<link rel="stylesheet" type="text/css" href="vistalaboratorio.css" />
	<body>
		<div id="titulo">
		</div>
		<div class='barraizq'>
			<table border="1" cellpadding="0">
				<tr>
					<th>Men&uacute;</th>
				</tr>
				{% for i in list %}
					<tr>
						<td>
							<a href="{{ i['value'] }}">{{ i['name'] }}</a>
						</td>
					</tr>
				{% endfor %}
			</table>
		</div>
		<div class="barrader">
			{{ contenido }}
		</div>
	</body>
</html>