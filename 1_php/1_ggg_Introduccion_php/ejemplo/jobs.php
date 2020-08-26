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

//---->este va a obeneter todos los regisros que encuentre usando el objeto que esta en app/Models/job.php usando el ORM
$jobs = job::all();


/*este ya no se va a usar por que se va a utilizar el ORM que hace la conecxion a BD 
    //arreglo de objetos
    $jobs = [//4)ggg Array que contiene los objetos 
      $job1,//5)ggg objeto job
      $job2,//objeto job
      $job3//objeto job

    ];
*/

//$project1 = new Project('Project 1', 'Description 1');no es necesario cuando se tiene el ORM, este se usaba cuando se tenia el contructor 

//---->este va a obeneter todos los regisros que encuentre usando el objeto que esta en app/Models/job.php usando el ORM
$projects = Project::all();

/*este ya no se va a usar por que se va a utilizar el ORM que hace la conecxion a BD 
    //arreglo de objetos
        $projects = [
          $project1
];*/

$projectLib = new Lib1\Project();//para hacer la instancia de un contructor al que se le creo un namespace, debemos poner el namespace y luego el nombre del contructor



//2)ggg recibe el parametro de la pagina index.php donde fue llamada la funsion para buscar la coleccion de objetos dentro del array $jobs segun el id 
function printElement($jobbb) {//funsion que va a recibir como parametro el id del array $jobs[$idx] y el printable se refiere a la interface que se creo

/* no se va a usar  por que se va a utilizar la BD
  //3)ggg usa el parametro para buscar dentro del array $jobs que contiene el id y buscar dentro del objeto (job) la variable  (visible) que esta dentro del array
  if($jobbb->visible == false) {//aqui se usa la variable $job que contiene el id del array $jobs[$idx] para indicar que compare el contenido de la variable del array llamada visible
    return;//si cumple la condicion solo retorna, sin mostrar ningun valor, sin mostrar las lineas siguientes
  }
*/
  echo '<li class="work-position">';
  
    //3)ggg con el id del array accedemos al objeto (job) que se encuentra dentro de array ($jobs) y dentro del objeto llamamos el metodo getTitleggg()
  //echo '<h5>' . $jobbb->getTitleggg() . '</h5>';//con el id del array y el nombre de la variable de ese array muestra el contenido de title
  echo '<h5>' . $jobbb->title . '</h5>';//usa el nombre de la base de datos

  //3)ggg usa el parametro para buscar dentro del array $jobs que contiene el id y buscar dentro del objeto (job) la variable (description) que esta dentro del array
 // if(isset($jobbb->getDescription())){//isset() verifica si existe para devolver TRUE y si no existe devuelve FALSE 
 // echo '<p>' . $jobbb->getDescription() . '</p>';//con el id del array y el nombre de la variable de ese array muestra el contenido de description
  echo '<p>' . $jobbb->description. '</p>';
  //}

  if(isset($jobbb->months)){//comprueba si existe el campo o atributo months dentro de la tabla 

  //3)ggg usa el parametro para buscar dentro del array $jobs que contiene el id y buscar dentro del objeto (job) la variable (months) que esta dentro del array
  echo '<p>' . $jobbb->getDurationAsString() . '</p>';//este llama la funcion que se creo para mostrar los meses y el año que retorna
}
  echo '<strong>Achievements:</strong>';
  echo '<ul>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '</ul>';
  echo '</li>';
  
}