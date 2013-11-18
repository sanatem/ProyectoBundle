
  $(document).ready(function(){
       $("#formulario_laboratorio").submit(function()  {
        if( /^\s+$/.test($("#institucion").val()))
        {
           $(".requerido").css("border-color","red");
           alert("los campos requeridos son los marcados en rojo");
           return false;
        }
        if( /^\s+$/.test($("#codigoLab").val()))
        {
           $(".error").css("border-color","red");
           alert("El codigo debe de tener 5 digitos numericos, o 1 letra y 4 digitos numericos, o 2 letras y 3 digitos "); 
           return false;
        }
        return true;


       
     });
  });
