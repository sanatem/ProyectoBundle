<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../view/FBA/fba.css" />
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/funcionesFba.js" type="text/javascript"></script>
<title>Encuestas</title>
</head>
<body>
<div class="cabecera">
<a class="lista" href="{{ valueCerrar }}">{{ nameCerrar }}</a>
</div>
<div id="titulo">
<img src="../view/img/bannerPersonalFBA.png" alt ="bner"/>
</div> 
        <div class="tablaDinamic">
        <table >
        	<tr><td class="separados"><p>Encuesta numero</p></td>
                <td class="separados"><p>Fecha de inicio</p></td>
                <td class="separados"><p>Fecha de fin </p></td>
                <td class="separados"><p>Ver encuesta </p></td>
                <td class="separados"><p>
                    <form method="POST" action="{{agregar}}" >          
                                <input type="submit" value="Nueva encuesta"/>
                    </form></p>
                </td>

            </tr>
            {% for enc in encuestas %}   
                
                <tr>
                    <td class="separados"><p> {{ enc['id_encuesta'] }} </p></td>
                        <td class="separados"><p> {{ enc['fecha_inicio'] }}</p></td>
                        <td class="separados"><p> {{ enc['fecha_fin'] }} </p></td>        
                        <td class="separados">
                        <form method="POST" action="{{verEncuesta}}" >
                            <input name="id_encuesta" type="hidden" value=" {{enc['id_encuesta']}}" />
                            <input type="submit" value="Ver Encuesta"/>
                        </form>
                         </td>
                   
                </tr>
                {% endfor %}
        </table>
            
        </div>
<div id="navlist">
<ul>
	{% for li in list %}
		<li><a class="lista" href="{{ li ['value']}}"> <p> {{ li['name'] }}</p></a></li> 
	{% endfor %}
</ul>
</div>
</body>
</html>
