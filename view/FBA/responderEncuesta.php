<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../view/FBA/fba.css" />
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/funcionesFba.js" type="text/javascript"></script>
<script src="../libs/validacionesFba.js" type="text/javascript"></script>

<title>Responder encuestas</title>
</head>
<body>
<div class="cabecera">
<a class="lista" href="{{ valueCerrar }}">{{ nameCerrar }}</a>
</div>
<div id="titulo">
<img src="../view/img/bannerPersonalFBA.png" alt="baner"/>
</div> 

<select name="tipo" onChange="return cargarEncu( '{{agregar}}' , (this.value))" >
<option value="" >Seleccione un tipo de pruebas</option>
{% for tp in tipospr %}
<option value="{{tp['id_prueba']}}" >{{tp['nombre']}}</option>
{% endfor %}
</select>

<form method="POST" action="{{responder}}"   id="formulario_encuesta">
	{% for pr in res %}
		<h3>{{pr['nombre']}}</h3>	
        <div>
        <table>
           <tr> 
            <td class="separados"><p>Fecha inicio<input name="fecha_inicio" type="date" required/> </p></td>
                    <td class="separados"><p>Fecha fin<input name="fecha_fin" type="date" required/></p></td>
          </tr>
        	<tr><td class="separados"><p>Metodo
        								<select  name="metodo">
    									 	{% for met in pr['met'] %}
    									 	  
    									 	   
    									 	  		  <option value="{{met['id_metodo']}}">{{met['nombre']}}</option>
    									 	   
    									 	{% endfor %}
										</select></p></td>
                <td class="separados"><p>Reactivo
                                        <select name="reactivo">
                                            {% for reac in pr['ret'] %}
                                                
                                            
    									    	<option value="{{reac['id_reactivo']}}">{{reac['nombre']}}</option>
                                            {% endfor %}
										</select></p></td>
                
            </tr>
            <tr><td class="separados"><p>Calibrador
                                        <select name="calibrador">
                                            {% for cal in pr['calPapel'] %}
                                              {% if cal['tipo'] == 'Calibradores' %}
                                                    <option value="{{cal['id_calibradoresypapel']}}">{{cal['nombre']}}</option>
                                                {% endif %}
                                            {% endfor %}
                                        </select></p></td>
                <td class="separados"><p>Papel
                                        <select name="papel">
                                            {% for papel in pr['calPapel'] %}
                                                {% if papel['tipo'] == 'PapelDeFiltro' %}
                                                 <option value="{{papel['id_calibradoresypapel']}}">{{papel['nombre']}}</option>
                                                {% endif %}
                                            {% endfor %}
                                        </select></p></td>
            </tr>
            <tr>
                  <td class="separados"><p>Cut Off:
                                        <input id="mal" name="corte" type="text" value="" required/>mg/dl
                                        </p></td> 
            </tr>
            <tr>
                <td class="separados"><p>Resultado
                                        <input name="resultado1" type="text" value="" required/>mg/dl
                                        </p></td> 
                <td class="separados"><p>Interpretacion
                                        <select name="intera">
                                            {% for inte in pr['inter'] %}
                                             
                                             <option value="{{inte['id_interpretacion']}}">{{inte['nombre']}}</option>
                                               
                                            {% endfor %}
                                        </select></p></td>
                <td class="separados"><p>Decision
                                        <select name="decisiona">
                                            {% for desi in pr['decision'] %}
                                                
                                                 <option value="{{desi['id_decision']}}">{{desi['nombre']}}</option>
                                              
                                            {% endfor %}
                                        </select></p></td>
                
            </tr>
            <tr><td class="separados"><p>Resultado
                                        <input name="resultado2" type="text" value="" required/>mg/dl
                                        </p></td>
                <td class="separados"><p>Interpretacion
                                        <select name="interb">
                                            {% for inte in pr['inter'] %}
                                             
                                             <option value="{{inte['id_interpretacion']}}">{{inte['nombre']}}</option>
                                               
                                            {% endfor %}
                                        </select></p></td>
                <td class="separados"><p>Decision
                                        <select name="decisionb">
                                            {% for desi in pr['decision'] %}
                                                
                                                 <option value="{{desi['id_decision']}}">{{desi['nombre']}}</option>
                                              
                                            {% endfor %}
                                        </select></p></td>
                
            </tr>
            <tr>
            <td class="separados"><p>Comentario
                         <textarea rows="4" cols="50" name="coment"></textarea></p></td>
            </tr>
            
        </table>

         
        </div>
        <input name="ti_pr" type="hidden" value="{{pr['id_prueba']}}" /> 
    
    
            <input type="submit" value="Responder encuesta" />
    </form>
    {% endfor %}

<div id="navlist">
<ul>
	{% for li in list %}
		<li><a class="lista" href="{{ li ['value']}}"> <p>{{ li['name'] }}</p></a></li> 
	{% endfor %}
</ul>
</div>
</body>
</html>
