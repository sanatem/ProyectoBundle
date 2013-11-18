<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../view/FBA/fba.css" />
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/funcionesFba.js" type="text/javascript"></script>
<title>Responder encuestas</title>
</head>
<body>
<div id="titulo">
<img src="../view/img/bannerPersonalFBA.png" alt="baner"/>
</div> 
<form method="POST" action="{{responder}}">
	{% for pr in res %}
		<h3>{{pr['nombre']}}</h3>	
        <div class="tablaDinamic">
        <table border="">
          
        	<tr><td class="separados"><p>Metodo
        								<select name="{{pr['nombre']}}metodo">
    									 	{% for met in pr['met'] %}
    									 	  
    									 	   
    									 	  		  <option value="{{met['id_metodo']}}">{{met['nombre']}}</option>
    									 	   
    									 	{% endfor %}
										</select></p></td>
                <td class="separados"><p>Reactivo
                                        <select name="{{pr['nombre']}}reactivo">
                                            {% for reac in pr['ret'] %}
                                                
                                            
    									    	<option value="{{reac['id_reactivo']}}">{{reac['nombre']}}</option>
                                            {% endfor %}
										</select></p></td>
                
            </tr>
            <tr><td class="separados"><p>Calibrador
                                        <select name="{{pr['nombre']}}calibrador">
                                            {% for cal in pr['calPapel'] %}
                                              {% if cal['tipo'] == 'Calibradores' %}
                                                    <option value="{{cal['id_calibradoresypapel']}}">{{cal['nombre']}}</option>
                                                {% endif %}
                                            {% endfor %}
                                        </select></p></td>
                <td class="separados"><p>Papel
                                        <select name="{{pr['nombre']}}papel">
                                            {% for papel in pr['calPapel'] %}
                                                {% if papel['tipo'] == 'PapelDeFiltro' %}
                                                 <option value="{{papel['id_calibradoresypapel']}}">{{papel['nombre']}}</option>
                                                {% endif %}
                                            {% endfor %}
                                        </select></p></td>
            </tr>
            <tr>
                  <td class="separados"><p>Cut Off:
                                        <input name="{{pr['nombre']}}corte" type="text" value=""/>mg/dl
                                        </p></td> 
            </tr>
            <tr>
                <td class="separados"><p>Resultado
                                        <input name="{{pr['nombre']}}resultado1" type="text" value=""/>mg/dl
                                        </p></td> 
                <td class="separados"><p>Interpretacion
                                        <select name="{{pr['nombre']}}intera">
                                            {% for inte in pr['inter'] %}
                                             
                                             <option value="{{inte['id_interpretacion']}}">{{inte['nombre']}}</option>
                                               
                                            {% endfor %}
                                        </select></p></td>
                <td class="separados"><p>Decision
                                        <select name="{{pr['nombre']}}decisiona">
                                            {% for desi in pr['decision'] %}
                                                
                                                 <option value="{{desi['id_decision']}}">{{desi['nombre']}}</option>
                                              
                                            {% endfor %}
                                        </select></p></td>
                
            </tr>
            <tr><td class="separados"><p>Resultado
                                        <input name="{{pr['nombre']}}resultado2" type="text" value=""/>mg/dl
                                        </p></td>
                <td class="separados"><p>Interpretacion
                                        <select name="{{pr['nombre']}}interb">
                                            {% for inte in pr['inter'] %}
                                             
                                             <option value="{{inte['id_interpretacion']}}">{{inte['nombre']}}</option>
                                               
                                            {% endfor %}
                                        </select></p></td>
                <td class="separados"><p>Decision
                                        <select name="{{pr['nombre']}}decisionb">
                                            {% for desi in pr['decision'] %}
                                                
                                                 <option value="{{desi['id_decision']}}">{{desi['nombre']}}</option>
                                              
                                            {% endfor %}
                                        </select></p></td>
                
            </tr>
            <tr>
            <td class="separados"><p>Comentario
                         <textarea rows="4" cols="50" name="{{pr['nombre']}}coment"></textarea></p></td>
            </tr>
            
        </table>

         
        </div>
    {% endfor %}	
    <input name="id_encuesta" type="hidden" value="{{id_encuesta}}"/>
            <input type="submit" value="Responder encuesta"/>
    </form>
<div id="navlist">
<ul>
	{% for li in list %}
		<li><a class="lista" href="{{ li ['value']}}"> <p>{{ li['name'] }}</p></a></li> 
	{% endfor %}
</ul>
</div>
</body>
</html>