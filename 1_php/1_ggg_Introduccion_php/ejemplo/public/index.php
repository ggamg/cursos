<?php
/*fijarse bien en las rutas, por que las librerias instaladas tomasn por defecto la raiz / y
muchas veces no toma encuenta las subcarpetas para tomar el index*/

ini_set('display_errors', 1); //inicializa las varialbes del php
ini_set('display_startup_errors', 1);//los enciende para mostrar los errore
error_reporting(E_ALL);//con esto muestra los errore en pantalla 

//en este require se pone ../ para acceder la carpeta superior,para que encuentre la ruta
require_once '../vendor/autoload.php';//------->ponemos este require para que reconosca los namespaces y reconosca la ruta usada al hacer el use;

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;//esto es de la libreria aura/router

$capsule = new Capsule;//esto hace parte de la instancia que traemos de las librerias instaladas 

$capsule->addConnection([// se realizan los cambios que sean necesarios segun la base de datos que se maneje y la forma en la que se puede acceder 
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',//nombre de la Base de Datos
    'username'  => 'root',// nombre de usuario de esta base de datos
    'password'  => '',// en este caso no hay clave 
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
//1---

//2 este no es necesario usarlo en este caso, por que se usar para despachar o utilizar manejadores de eventos o contenedores
//2-------------
// Set the event dispatcher used by Eloquent models... (optional)
/*use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));
*/
//2---

//3 Esto nos permite hacer todo dentro del concepto global
//3--
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
//3--

//4 nos permite inicializar el ORM, el mapeo relacional de objetos
//4--
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
//4--

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);//esto lo tomamos de la explicacion del repositorio en https://docs.laminas.dev/laminas-diactoros/v2/usage/

$routerContainer = new RouterContainer();//se hace una instancia para el contenedor de rutas de la libreria aura/router
$map = $routerContainer->getMap();//se define la estructura, para identificar la ruta definida a que pertenece. libreria aura/router

/*usa el metodo get para comparar el dato obtenido con lo que se puso, en este caso pusimos index y colocamos la ruta /ejemplo/ 
donde esta la raiz del proyecto y una ruta inventada / y al final lo que vamos a mostrar o la pagina que queremos mostrar ../index.php*/
$map->get('index', '/1_cursos/1_php/1_ggg_Introduccion_php/ejemplo/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);

/*usa el metodo get para comparar el dato obtenido con lo que se puso, en este caso pusimos index y colocamos la ruta /ejemplo/ 
donde esta la raiz del proyecto y una ruta inventada /jobs/add y al final lo que vamos a mostrar o la pagina que queremos mostrar ../addJobs.php*/
$map->get('addJobs', '/1_cursos/1_php/1_ggg_Introduccion_php/ejemplo/jobs/add', '../addJob.php');//este no sirve por que no tiene el mismo formato anterior, para que corra bien en el condicional que creamos del route

//segun lo que definimos con el $map->get, intentara hacer coincidir una solicitud con una ruta
$matcher = $routerContainer->getMatcher();

//toma lo que obtuvo del $request y utiliza el metodo para encontrar coincidencias y mostrar la ruta establecida en $map->get
$route = $matcher->match($request);
    if (!$route)
    {
     echo 'No route';
    }else
    {
        $handlerData = $route->handler; //variable almacena lo que obtuvo el route al enviar el $map->get
        $controllerName = $handlerData['controller'];//tomamos la variable $handlerData y buscamos dentro del array  el contenido de 'controler'
        $actionName = $handlerData['action'];//tomamos la variable $handlerData y buscamos dentro del array  el contenido de 'action'

        $controller = new $controllerName;//se hace una instancia del contenido de la variable para que identifique la ruta hacia indexController
        $controller -> $actionName();//se ejecuta el metodo usando el contenido de la variable para identificar cual metodo ejecutar

        echo "</br>";
        echo "</br>";
       var_dump($route->handler);//podemos ver que pasa en esta variable 
    }

    echo "</br>";
    echo "</br>";
var_dump($route);//podemos ver que pasa en esta variable 

 echo "</br>";
 echo "</br>"; 
  var_dump($request->getUri()->getPath());//con esto podemos ver la ruta a las quenos envia la libreria que instalamos

/*este es un parametro de ruta, 
si esta definido y tiene  un valor, agrega lo que tenga $_GET y sino tiene un valor pone esto: /  <--- */
// $route=$_GET['route'] ?? '/';

// if ($route=='/')
// {
//     //en este require se pone ../ para acceder a la carpeta superior,para que encuentre la ruta
//     require '../index.php';// llamamos el index de la carpeta superior a esta, indicamos la ruta de la pg que va a cargar
// }  elseif ($route=='addJob') 
//     {
//         require '../addJob.php';//indicamos la ruta de la pagina que va a cargar 
//     }