<html>
<head><title>Listados de Usuarios</title></head>
<body><h1>Listado de Usuarios Activos </h1>
<table>
<tr><th>Nombre</th><th>DNI</th></tr>

<?php foreach ($usuarios as $usuario){
	echo "<tr><td>".$usuario[0]. "</td>";
	
};?>

</table>
</body>
</html>





