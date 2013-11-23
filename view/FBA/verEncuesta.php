<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../view/FBA/fba.css" />
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/funcionesFba.js" type="text/javascript"></script>
<title>Ver encuesta</title>
</head>
<body>
<div class="cabecera">

<a class="lista" href="{{ valueCerrar }}">{{ nameCerrar }}</a>
</div>
<div id="titulo">
<img src="../view/img/bannerPersonalFBA.png" alt="baner"/>
</div> 
<div class="tabla">
 <table>
        <tr>
            <td><p>{{nombrePr}}</p></td>
        </tr>
           <tr> 
            <td class="separados"><p>Fecha inicio<input name="fecha_inicio" type="text" value="{{fechIn}}"  disabled/> </p></td>
                    <td class="separados"><p>Fecha fin<input name="fecha_fin" type="text" value="{{fechFin}}"  disabled/></p></td>
          </tr>
            <tr><td class="separados"><p>Metodo
                            <input name="" type="text" value="{{metodo}}" disabled />
                                               
                                
                <td class="separados"><p>Reactivo
                                        <input name="" type="text" value="{{reactivo}}" disabled />
                
            </tr>
            <tr><td class="separados"><p>Calibrador
                                        <input name="" type="text" value="{{calibrador}}" disabled />
                <td class="separados"><p>Papel
                                        <input name="" type="text" value="{{papel}}" disabled />
            </tr>
            <tr>
                  <td class="separados"><p>Cut Off:
                                        <input name="corte" type="text" value="{{corte}}" disabled/>mg/dl
                                        </p></td> 
            </tr>
            <tr>
                <td class="separados"><p>Resultado
                                        <input name="resultado1" type="text" value="{{res1}}" disabled/>mg/dl
                                        </p></td> 
                <td class="separados"><p>Interpretacion
                                        <input name="" type="text" value="{{intera}}" disabled/>
                <td class="separados"><p>Decision
                                        <input name="" type="text" value="{{decisiona}}" disabled />
                
            </tr>
            <tr><td class="separados"><p>Resultado
                                        <input name="resultado2" type="text" value="{{res2}}" disabled />mg/dl
                                        </p></td>
                <td class="separados"><p>Interpretacion
                                        <input name="" type="text" value="{{interb}}" disabled />
                <td class="separados"><p>Decision
                                        <input name="" type="text" value="{{decisionb}}" disabled />
                
            </tr>
            <tr>
            <td class="separados"><p>Comentario
                         <input name="" type="text" value="{{comentario}}" disabled />
                        
            </tr>
            
        </table>
</div>
<div id="navlist">
<ul>
	{% for li in list %}
		<li><a class="lista" href="{{ li ['value']}}"> <p>{{ li['name'] }}</p></a></li> 
	{% endfor %}
</ul>
</div>
</body>
</html>
