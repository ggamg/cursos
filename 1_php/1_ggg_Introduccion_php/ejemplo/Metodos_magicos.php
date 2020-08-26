<?php
/* __call() supongamos que tenemos una aplicacion para manejar restaurantes, y queremos que cuando se registre una nueva reservacion 
la agregue al contador de ese mismo restaurante (dentro del mismo objeto) pero aparte que ejecute una conexion a la base de datos
donde estan todos los otros restaurantes y registre todos lo que se hace como una especie de Log*/

class Restaurante {
  private $reservacionesTotales = 0;
  public $meseros;
  public $clientes;

  protected function agregarReservacion () {
    $this->reservacionesTotales ++;
  }

  public function __call($metodo, $parametros){

    /* verificamos primero si el método que están tratando de ejecutar en este objeto existe con la funcion "method_exists()"
    y si existe nos lo permitía ejecutarlo aun cuando este métodos fue definido como "protected"*/
    if (method_exists($this,$metodo)){
      call_user_func([$this,$metodo]);
      registrarEjecucion("Se ejecuto el método $metodo exitosamente con los parámetros <i>" .implode(' ',$parametros)."</i>");
      /* esta funcion ↑ lo que hace es guardar un string especificando que fue lo que se ejecuto y con que parámetros
      para poder llevar un registro de todos los movimientos de este programa */
    } else {
      registrarEjecucion("Se intentó ejecutar el método $metodo con los parámetros <i>" .implode(' ',$parametros)."</i> pero no fue posible");
    }
  }
}

/* para este ejemplo practico solo mostraremos el Log en pantalla pero esto bien podría conectarse
a una base de datos para tener un registro de todo lo que se intento ejecutar */
function registrarEjecucion(string $log){
  echo $log;
}

/* creamos el nuevo objeto de tipo Restaurante y asignamos las propiedades publicas*/
$pizzaPlatza = new Restaurante();
$pizzaPlatza->meseros = 8;
$pizzaPlatza->clientes = 43;


$pizzaPlatza->agregarReservacion(); // nos devolverá "Se ejecuto el método agregarReservacion exitosamente con los parámetros" en pantalla
echo "<br>";
$pizzaPlatza->noExiste('parametro de ejemplo'); // nos devolverá "Se intentó ejecutar el método noExiste con los parámetros parámetro de ejemplo pero no fue posible" en pantalla
echo "<br>";
$pizzaPlatza->agregarReservacion('hola'); // nos devolverá "Se ejecuto el método agregarReservacion exitosamente con los parámetros" en pantalla
echo "<br>";
$pizzaPlatza->pepe(); // nos devolverá "Se intentó ejecutar el método noExiste con los parámetros parámetro de ejemplo pero no fue posible" en pantalla
echo "<br>";
echo "<br>";echo "<br>";


class Automovil {
 /* __get() y __set() */

  private $marca; /* LAS PROPIEDADES ESTAN ESTABLECIDAS COMO PRIVADAS ESTA VEZ */
  private $color;

  public function __get($atributo){

    /* confirmaremos si un atributo existe al momento de querer acceder al mismo */
    if(property_exists($this, $atributo)) {
      return $this->$atributo; /* si existe regresara el valor que tenga guardado en dicho atributo/propiedad */
    } else {
      echo "El atributo <strong>$atributo</strong> no existe dentro de este objeto "; /* y si no existe solo regresara un mensaje indicandolo */
    }
  }

  /* para la funcion __set() es necesario darle 2 parametros, el atributo que queremos modificar o crear,
  y el valor que va a recibir dicho atributo */
  public function __set($atributo,$valor){
    $this->$atributo = $valor;
  }

}

/* Veamos como y cuando se ejecutan dichas funciones */

$auto1 = new Automovil(); //creamos el objeto de tipo "Automovil" vacio (sin propiedades aun)

/* El metodo __set() se ejecutara automaticamente al momento que nosotros asignemos una
propiedad a este objeto, ya sea para crearla o modificarla, como en este caso*/

$auto1->marca = 'ferrari';
$auto1->color = 'rojo'; //solo modificamos la propiedad "color" y "marca" que ya existian (aunque estas sean privadas)

$auto1->modelo = '1990'; //aqui creamos una nueva propiedad que no existia anteriormente en el objeto


/* El metodo __get() se ejecutara al momento que queramos acceder al valor de una de las propiedades
de los objetos */

echo "Su auto registrado es un $auto1->marca de color $auto1->color <br><br>";

echo "Su auto registrado es un $auto1->modelo <br><br>";

echo "el dueño es: $auto1->dueño"; 
//como no regitramos la propiedad dueño anteriormente lo que obtendremos aqui sera un mensaje indicando
//que esta propiedad "dueño" no existe (ya que esto lo programamos en el __get())


