<!DOCTYPE HTML>
<?php
session_start();
if ( (isset($_SESSION['estado'])) && ($_SESSION['tipo_roll']==1)) {
	
}else header( "Location: ../index.php" );
?>
<html>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdminUsuarios.js" type="text/javascript"></script>
<title>Administracion de entidades</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="css/text" href="../view/admin.css"/>
<body class="laboratorix" onload="esconder()">
<div id="titulo">
<img src="../view/img/bannerAdministracion.png"/>
</div>
<!--<div style="float:left;width=33%">
asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd
</div>
<div style="float:left;width=32%">asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdas
</div>
<div style="float:left;width=33%">asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd
</div>
-->

<p>Elija una opcion:</p>
<div class="banner2">
<table border="0" cellpadding="5">
<tr>
<td><h2>Menu Usuarios</h2></td>

</tr>
<tr>
<td><p>
<a class="lista" href="<?=RAIZ_SITIO."admin=cargarAltas"; ?>">Altas de Usuarios</a></p></td>
</tr>
<tr>
<td><p>Bajas de Usuarios</p></td>
</tr>
<tr>
<td><p>Modificar Usuarios</p></td>

</tr>
</table>
</div>
<div class="banner2">

<form class="formulario" method="POST" action="<?=RAIZ_SITIO."admin=alta"; ?>">
<table cellpadding="0" border="0">
<tr>
<td>
<p>Introdusca el nombre del usuario</p>
</td>
<td>
<input class="textoinput" name="nombre" type="text" placeholder="Introduzca su usuario" required>
</td>
</tr>
<tr>
<td>
<p>Seleccione el tipo de usuario</p>
</td>
<td>
<select name="tipo">
	<?php foreach ($tipos as $tip ) {
	?>
  <option value=" <?php echo $tip['id_roll']; ?>" ><?php echo $tip['nombre']; ?> </option>
  <?php } ?>
</select>
</td>
</tr>
<tr>
<td>
<p>Introdusca la Contrase&ntilde;a del usuario</p>
</td>
<td>
<input class="textoinput" name="contrasena" type="password" placeholder="Introduzca password" required>
</td>
</tr>
</table>
<input type="submit" value="Ingresar">
</div>
<div class="banner3">
<a id="volver" class="lista" href="../controler/adminControler.php">Volver</a>

</body>
</html>