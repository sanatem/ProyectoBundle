<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../view/FBA/fba.css" />
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/funcionesFba.js" type="text/javascript"></script>


<title>Ver laboratorios</title>
</head>
<body >
<div class="cabecera">
<a class="lista" href="{{ valueCerrar }}">{{ nameCerrar }}</a>
</div>
<div id="titulo">
<img src="../view/img/bannerPersonalFBA.png" alt="bannerPersonalFBA"/>
</div>
{% set var = dire %}
<select name="estado" onChange="return cargarLab('{{var}}',(this.value))">
<option>Seleccione que Laboratorios desea ver</option>
<option value="0" >Activos</option>
<option value="1" >De baja </option>
</select>

        <div class="tablaDinamic">
        <table >
        	<tr>
                <td class="separados"><p>Institucion</p></td>
                <td class="separados"><p>Codigo</p></td>
                <td class="separados"><p>Responsable</p></td>
                <td class="separados"><p>Telefono</p></td>
                <td class="separados"><p>Eliminar</p></td>
                <td class="separados"><p>Modificar</p></td>

                
            </tr>
        	{% for lab in labs %}
                {% if lab['estado'] == est %}

                        <tr>
                            <td class="separados"><p>{{ lab['institucion'] }}</p></td>
                            <td class="separados"><p>{{ lab['codigo_lab'] }}</p></td>
                            <td class="separados"><p>{{ lab['responsable'] }}</p></td>
                            <td class="separados"><p>{{ lab['telefono'] }}</p></td>
                            {% if lab['estado'] == 0 %}
                            <td class="separados"><form method="POST" onSubmit="return confirmar()" action="{{baja}}">
                            <input name="idlab" type="hidden" value="{{lab['id_laboratorio']}}"/>
                            <input type="submit" value="Eliminar"/>
                            {% endif %}
                            
                            </form>
                            </td>
                            <td class="separados"><form method="POST" action="{{modi}}">
                            <input name="idlab" type="hidden" value="{{lab['id_laboratorio']}}"/>
                            <input type="submit" value="Modificar"/>
                            </form>
                            </td>
                        </tr>
                    {% endif %}
                {% endfor %}
        </div>
       
        </table>
       
      
<div id="navlist">
<ul>
	{% for li in list %}
		<li><a class="lista" href="{{ li ['value']}}"> <p>{{ li['name'] }}</p></a></li>
	    
	{% endfor %}
</ul>
</div>
</body>
</html>
