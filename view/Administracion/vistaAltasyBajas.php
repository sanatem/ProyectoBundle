<!DOCTYPE HTML>
<html>
<head>
<title>Administracion de entidades</title>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdminUsuarios.js" type="text/javascript"></script>
<meta charset="utf-8"/>
<link rel="stylesheet" type="css/text" href="../view/vista.css"/>
</head>
<body class="laboratorix">
<div id="titulo">
<img src="../view/img/bannerAdministracion.png" alt="bannerAdministracion"/>
</div>
<div class="tablaDinamic">
<table border="">
	<tr>
        <td class="separados"><p>Usuario</p></td>
        <td class="separados"><p>Tipo_roll</p></td>
        <td class="separados"><p>Eliminar Usuario</p></td>
        <td class="separados"><p>Modificar Usuario </p></td>
        </tr>
	{% for pro in probando %}
        <tr>
        <td class="separados"><p>{{ pro['nombre'] }}</p></td>
        <td class="separados"><p>{{ pro['tipo_roll'] }}</p></td>
        <td class="separados">
        <form method="POST" onSubmit="return confirmar()" action="{{baja}}">
        <input name="idusuario" type="hidden" value="{{pro['id_us']}}"/>
        <input name="typeUser" type="hidden" value="{{pro['tipo_roll']}}"/>
        <input type="submit" value="Eliminar"/>
        </form>
        </td>
        <td class="separados">
        <form method="POST" action="{{modi}}">
        <input name="iduser" type="hidden" value="{{pro['id_us']}}"/>
        <input type="submit" value="Modificar"/>
        </form>
        </td>
        {% endfor %}
        </tr>
</table>
</div>
<div id="navlist">
<ul>
<li class="horizontal"><a class="lista" href="{{raiz}}">Alta Usuario </a></li>
</ul>
</div>
<div class="tablaDinamica">
<a class="lista" href="{{logg}}">Volver</a>
</div>
<div class="banner2">
<a class="lista" href="{{lagg}}">Cerrar sesión</a>
</div>
{% if not error is empty %}
<div>
        <p>No es posible modificar el usuario con el que usted se encuentra loggeado</p> 
</div>
{% endif %}
</body>
</html>