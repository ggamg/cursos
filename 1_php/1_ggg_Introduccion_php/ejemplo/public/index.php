<?php

ini_set('display_errors', 1); //inicializa las varialbes del php
ini_set('display_startup_errors', 1);//los enciende para mostrar los errore
error_reporting(E_ALL);//con esto muestra los errore en pantalla 

//en este require se pone ../ para acceder la carpeta superior,para que encuentre la ruta
require_once '../vendor/autoload.php';//------->ponemos este require para que reconosca los namespaces y reconosca la ruta usada al hacer el use;

use Illuminate\Database\Capsule\Manager as Capsule;

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


var_dump($request->getUri()->getPath());//con esto podemos ver la ruta a las quenos envia la libreria que instalamos

/*este es un parametro de ruta, 
si esta definido y tiene  un valor, agrega lo que tenga $_GET y sino tiene un valor pone esto: /  <---*/
// $route=$_GET['route'] ?? '/';

// if ($route=='/')
// {
//     //en este require se pone ../ para acceder a la carpeta superior,para que encuentre la ruta
//     require '../index.php';// llamamos el index de la carpeta superior a esta, indicamos la ruta de la pg que va a cargar
// }  elseif ($route=='addJob') 
//     {
//         require '../addJob.php';//indicamos la ruta de la pagina que va a cargar 
//     }