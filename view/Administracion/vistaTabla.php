<!DOCTYPE HTML>
<html>
<head>
<title>Administracion de tablas</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="../view/vista.css"/>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigoAdminUsuarios.js" type="text/javascript"></script>
<script src="../libs/validar.js" type="text/javascript"></script>
</head>
<body class="laboratorix" onload="esconder()">
<div id="titulo">
<img src="../view/img/bannerTablas.png" alt="bannerTablas"/>
</div>
<div class="banner2">
<table border="">
	<tr>
    <td class="separados"><p>Elija tabla</p></td>
    </tr>
        {% for zxb in prometo %}
        <tr>
        <td class="separados"><a class="lista" href="{{carga}}&amp;action={{tip_prub}}&amp;quesoy={{zxb}}">{{zxb}}</a></td>
        </tr>
        {% endfor %}
</table>
</div>
<div class="banner2">
<table border="">
	<tr>
	<td class="separados"><p>Nombre</p></td>
	<td class="separados"><p>Tipo</p></td>
	<td class="separados"><p>Codigo</p></td>
	<td class="separados"><p>Eliminar</p></td>
	<td class="separados"><p>Modificar</p></td>
	</tr>
        {% for zxb in tipotab %}
        <tr>
        <td class="separados"><p>{{zxb['nombre']}}</p></td>
        <td class="separados"><p>{{zxb['tipo']}}</p></td>
        <td class="separados"><p>{{zxb['codigo']}}</p></td>
        <td class="separados">
        <form method="POST" onSubmit="return confirmar()" action="{{baja}}">
        <input name="id1" type="hidden" value="{{zxb[0]}}">
        <input name="quesoy1" type="hidden" value="{{oculto}}">
       	<input name="tipoprub1" type="hidden" value="{{tip_prub}}">
        <input type="submit" value="Eliminar">
        </form>
        </td>
        <td class="separados">
        <form method="POST" action="{{modi}}">
        <input name="quesoy2" type="hidden" value="{{oculto}}">
       	<input name="tipoprub2" type="hidden" value="{{tip_prub}}">
        <input name="id2" type="hidden" value="{{zxb[0]}}">
        <input type="submit" value="Modificar">
        </form>
        </td>
        </tr>
        {% endfor %}
        </table>
       	<form method="POST" onSubmit="" action="{{alta}}">
        <table border="">
        <tr>
        <td><input name="nom" type="text" placeholder="Nombre" required="required"></td>
        <td><input name="tip" type="text" placeholder="Tipo" required="required"></td>
        <td><input name="cod" type="text" placeholder="Codigo" required="required">
        <input name="quesoy" type="hidden" value="{{oculto}}">
        <input name="tipoprub" type="hidden" value="{{tip_prub}}"></td>
        <td><input type="submit" value="{{prim}}"/></td>
        </tr>
        </table>
        </form>
</div>
<div class="banner2">
<a class="lista" href="{{logg}}">Volver</a><br>
<a class="lista" href="{{lagg}}">Cerrar sesión</a>
</div>
</body>
</html>