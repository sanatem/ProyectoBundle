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
<div id="titulo">
<img src="../view/img/bannerPersonalFBA.png" alt ="bner"/>
</div> 
        <div class="tablaDinamic">
        <table >
        	<tr><td class="separados"><p>Encuesta numero</p></td>
                <td class="separados"><p>Fecha de inicio</p></td>
                <td class="separados"><p>Fecha de fin </p></td>
                <td class="separados"><p>Responder </p></td>
            </tr>
            {% for enc in encuestas %}   
                
                <tr>
                    <td class="separados"><p> {{ enc['id_encuesta'] }} </p></td>
                        <td class="separados"><p> {{ enc['fecha_inicio'] }}</p></td>
                        <td class="separados"><p> {{ enc['fecha_fin'] }} </p></td>        
                        <td class="separados">
                        <form method="POST" action="{{responder}}" >
                            <input name="id_encuesta" type="hidden" value=" {{enc['id_encuesta']}}" />
                            <input type="submit" value="Responder"/>
                        </form>
                    </td>
                </tr>
                {% endfor %}
        </table>
         <form method="POST" action="{{agregar}}" >
        <table>  
           <tr>
            <td>
                    <td class="separados"><p><input name="fecha_inicio" type="date" /></p></td>
                    <td class="separados"><p><input name="fecha_fin" type="date" /></p></td>
                    <td class="separados"><p><input type="submit" value="Agregar"/></p></td>   
            </tr>  
        </table>
        </form>
         
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
