<?php

/*el namespace se crea cuando tenemos alguna libreria que pueda tener el mismo nombre que otrar libreria, el namespace 
se creo para evitar conflictos o confusiones y usarlos en donde sea requerido, sin necesidad de cambiarle el nombre 
a los metodos o construcores y para usar el namespece se debe utilizar el use, segudo del namespace y el metodo o contructor*/
namespace App\Models;//Se establece el namespace

//esta interface es para mostrar algo especificamente publico
interface Printableggg 
{
    public function getDescription();
}

?>