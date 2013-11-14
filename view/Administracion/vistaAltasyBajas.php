<!DOCTYPE HTML>
<?php
session_start();
if ( (isset($_SESSION['estado'])) && ($_SESSION['tipo_roll']==1)) {
	
}else header( "Location: ../index.php" );
?>
<html>
<title>Administracion de entidades</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="css/text" href="../view/vista.css"/>
<body class="laboratorix">
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

<div class="tablaDinamica">
<table border="1" cellpadding="3" align="center">
		<tr><td class="separados"><p>Usuario</p></td>
        <td class="separados"><p>Tipo_roll</p></td>
        <td class="separados"><p>Id Usuario:</p></td>
        </tr>
		{% for pro in probando %}
        <tr><td class="separados"><p>{{ pro['nombre'] }}</p></td>
        <td class="separados"><p>{{ pro['tipo_roll'] }}</p></td>
        <td class="separados"><p>{{ pro['id_us'] }}</p></td>
        </tr>
        {% endfor %}
        </tr>
</table>
</div>
<div id="navlist">
<ul>
<li><a class="lista" href="{{raiz}}">Alta Usuario</a></p></li>
</ul>
</div>
<div class="tablaDinamica">
<a class="lista" href="{{logg}}">Volver</a>

</body>
</html>