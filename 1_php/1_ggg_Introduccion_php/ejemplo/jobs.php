<?php
//este require usa las librerias del compuser que intalamos para que localize los namespaces que colocamos en la ruta app dentro de cada documento
//require_once 'vendor/autoload.php';

// este require no usa las librerias del compuser por que no esta dentro de la ruta por defecto del compuser que se instalo
require 'lib1/Project.php';

//ponemos el use para que pueda identificar por medio del namespace que creamos, los metodos y objetos que usamos 
//para poder llamar a los metodos y contructores ponemos el use, luego el namespace y por ultimo el metodo o contructor 
use App\Models\{job, Project};

/* esto ya no se va usar porque vamos a utilizar la conexion a la BD
      //6)ggg
      $job1 = new job('PHP Developer', 'This is an awesome job!!!');//instancia del objeto job y los parametros que se ponen son del __construct que es un metodo magico, para recibir informacion
      //se usa la instancia del objeto para usar las variables, funciones, metodos y guardar informacion en variables
      $job1->visible = true;//se usa la instancia del objeto para usar las variables, y guardar informacion en las variables del objeto (job)
      $job1->months = 16;//se usa la instancia del objeto para usar las variables, y guardar informacion en las variables del objeto (job)

      $job2 = new job('Python Dev', '');//instancia del objeto job y los parametros que se ponen son del __construct que es un metodo magico
      //se usa la instancia del objeto para usar las variables, funciones, metodos y guardar informacion en variables
      $job2->visible = false;//se usa la instancia del objeto para usar las variables, y guardar informacion en las variables del objeto (job)
      $job2->months = 14;

      $job3 = new job('Devops', '');//instancia del objeto job y los parametros que se ponen son del __construct que es un metodo magico
      //se usa la instancia del objeto para usar las variables, funciones, metodos y guardar informacion en variables
      $job3->visible = true;//se usa la instancia del objeto para usar las variables, y guardar informacion en las variables del objeto (job)
      $job3->months = 5;
*/


$projectLib = new Lib1\Project();//para hacer la instancia de un contructor al que se le creo un namespace, debemos poner el namespace y luego el nombre del contructor

