<?php
/*el namespace se crea cuando tenemos alguna libreria que pueda tener el mismo nombre que otrar libreria, el namespace 
se creo para evitar conflictos o confusiones y usarlos en donde sea requerido, sin necesidad de cambiarle el nombre 
a los metodos o construcores y para usar el namespece se debe utilizar el use, segudo del namespace y el metodo o contructor*/
namespace App\Models;//Se establece el namespace

//------------>Este es para usar el ORM o Mapeo relacional de objetos
use Illuminate\Database\Eloquent\Model; 
   
    /*este es un objeto que va a heredar elementos del padre o que podemos usar elementos del padre*/
    //class Project extends BaseElement
    class Project extends Model//------>hacemos la extencion a Modle para usar el ORM y no usar el objeto BaseElement que creamos
    {

        //---------->ponemos la table en donde queremos almacenar ORM
      protected $table = 'projects';

    }


?>