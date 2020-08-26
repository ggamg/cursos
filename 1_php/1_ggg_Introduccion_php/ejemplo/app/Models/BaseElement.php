<?php
/*el namespace se crea cuando tenemos alguna libreria que pueda tener el mismo nombre que otrar libreria, el namespace 
se creo para evitar conflictos o confusiones y usarlos en donde sea requerido, sin necesidad de cambiarle el nombre 
a los metodos o construcores y para usar el namespece se debe utilizar el use, segudo del namespace y el metodo o contructor*/
namespace App\Models;//Se establece el namespace

require_once 'Printable.php';
class BaseElement implements Printableggg{//7)ggg objeto con sus atributos y metodos
  //8)ggg al ser un objeto lo que se utiliza como variables se le llaman atributos
    protected $title;//private solo se puede usar dentro del objeto, pero al pasarlo a protected lo pueden usar los objetos hijos
    public $description;//public se puede usar en todo el codigo, por fuera o por dentro del objeto job
    public $visible=true;
    public $months;
    

    public function __construct($tit, $des)
    {
      $this -> setTitleggg($tit);
      $this -> description = $des;
    }
  public function setTitleggg($t)//9)ggg al ser un objeto lo que se utiliza como funsiones se les llama metodos 
  {//al tener la variable $title en private, lo que se hizo fue usar este metodo para tomar los valores y enviarlo al atributo del objeto
    if($t==''){
      $this->title = 'N/A';
    }

    $this->title = $t;
  }

  public function getTitleggg()//9)ggg al ser un objeto lo que se utiliza como funsiones se les llama metodos 
  {//al tener el $title en private, lo que se hace es mostrar por medio de este metodo el contenido del atributo $title
    return $this->title;
  }

  public function getDurationAsString() {//metodo
    $years = floor($this->months / 12);
    $extraMonths = $this->months % 12;
  
    if ($years==0){
  
      return "$extraMonths months";//muestra solo el mes
    }
    if  ($extraMonths==0){
  
      return "$years years";//muestra solo el año
    }
  
    return "$years years $extraMonths months";//muestra mes y año 
  }
  public function getDescription()
  {
    return $this-> description;
  }

}
?>