Promoción de Proyecto 2013
========================

El trabajo de promoción será realizado en el Framework Symfony 2 versión 4.
A  cargo del proyecto estamos:

- Filandini Juan Manuel
- Pravisani Santiago
- Sanchez Esteban.

========================
Bundles utilizados:
- FOSUserBundle

Informe final


Symfony

Nuestra elección fue symfony v2.4.3, porque queriamos aprender un framework con mucha documentación, varios tutoriales, seguir aprovechando la ventajas de usar twig, además algunos integrantes del grupo ya tenían alguna noción del mismo, entre otras cosas.


Modulos desarollados   

Para el módulo de estadísticas, usamos todo lo desarrollado en la cursada, desde la base de datos, las librerias highcharts en js y los metodos del controlador.

Módulos de symfony utilizados.
Utilizamos el bundle FOSUserBundle para la gestión de usuarios y el login.

Seguridad y Routing

Symfony 2 nos provee de varios mecanismos de seguridad:
1.	Utiliza tokens CSRF para evitar este tipo de ataques.
2.	Utiliza plantillas twig como primera medida para evitar XSS.
3.	A traves del manejo de roles de usuarios (Role_admin, Role_user, etc) tenemos un control de acceso a nuestra aplicación.
4.	Symfony provee un firewall para las URL.

En cuanto al routing, symfony 2 tiene un archivo router en el cual se configuran las rutas(URL, paths) de nuestra aplicación. Este archivo de routing nos permite crear rutas complejas y asociarlas a los controladores.

CRUD

Symfony 2  posee un ORM llamado doctrine que nos facilita el manejo de bases de datos relacionales utilizando objetos. Además nos provee un mecanismo para el CRUD mediante el comando php app/console doctrine:generate:crud.



MVC

El framework symfony 2 nos provee las herramientas necesarias para mantener las vistas y el controlador en partes diferenciadas, como asi tambien el uso de ORM para separar el controlador del modelo, obteniendose de esta manera un MVC. Pero para su creador Fabien Potencier, symfony 2 es un framewor HTTP, es decir solicitud / respuesta. En donde los principios fundamentales de Symfony2 se centran alrededor de la especificación HTTP.

 


Integrantes:
1.	Juan Manuel Filandini
2.	Santiago Pravisani
3.	Esteban Sanchez


