<?php
/*el namespace se crea cuando tenemos alguna libreria que pueda tener el mismo nombre que otrar libreria, el namespace 
se creo para evitar conflictos o confusiones y usarlos en donde sea requerido, sin necesidad de cambiarle el nombre 
a los metodos o construcores y para usar el namespece se debe utilizar el use, segudo del namespace y el metodo o contructor*/
namespace App\Models;//Se establece el namespace

//------------>Este es para usar el ORM o Mapeo relacional de objetos
use Illuminate\Database\Eloquent\Model; 

/*este es un objeto que va a heredar elementos del padre o que podemos usar elementos del padre*/
    //class job extends BaseElement  //implements es una palabra reservada que se utiliza para implementar la interfas que se creo
    class job extends Model//------>hacemos la extencion a Modle para usar el ORM y no usar el objeto BaseElement que creamos
    {
//---------->ponemos la table en donde queremos almacenar ORM
      protected $table = 'jobs';
/*este constructor se quita por que vamos a usar el ORM o mapeo relacional de objetos que se configuro en addJob.php y va usar la BD
        //se enruta el contructor al padre pero lo aprovechamos para anexarle algo
        public function __construct($titl, $descr)
        {
            //linea que se anexa al contructor
        $newTitle = 'Job: ' . $titl;


        //este se ve sin el constructor y por que se utilizo en el padre, el privated, en la variable title, para que los hijos 
        //unicamente puedan tener acceso a esa variable
        $this-> title = $newTitle . 'ggg'; //este se ve sin el constructor y por que se 
        

        //nrutamiento al contructor padre o para llamar al constructor padre. la anerior linea no se ve porque sobre escribe la 
        //varible title en el parametro del contructor 
        parent::__construct($newTitle, $descr);
        
}*/


        /*este metodo hace un polimorfismo, por que en BaseElement tiene el mismo metodo, pero 
        en este caso agregamos algo mas a este metodo que no tiene el padre*/
        public function getDurationAsString() {//metodo
            $years = floor($this->months / 12);
            $extraMonths = $this->months % 12;
          
            if ($years==0){
          //esta es la linea que se agrego a diferencia del metodo padre BaseElement y no interfiere con los codigos que usan el metodo padre
              return "job duration: $extraMonths months";//muestra solo el mes
            }
            if  ($extraMonths==0){
          //esta es la linea que se agrego a diferencia del metodo padre BaseElement y no interfiere con los codigos que usan el metodo padre
              return "job duration: $years years";//muestra solo el año
            }

          //esta es la linea que se agrego a diferencia del metodo padre BaseElement y no interfiere con los codigos que usan el metodo padre
            return "job duration: $years years $extraMonths months";//muestra mes y año 
          }
        

    }
?>