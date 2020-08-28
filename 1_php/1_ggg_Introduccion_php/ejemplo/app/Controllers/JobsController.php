<?php

namespace App\Controllers;

use App\Models\job;

class JobsController
{
    public function getAddJobAction()
    {

        if(!empty($_POST['titleg_j']))//comprueba si  esta vacio el envio por post para evitar algun error si no hay nada
        {//--------------->con esto ya puede guardar en la base de datos gracias a la libreria que se instalo, para conectar la BD, 
          //sin tener que usar codigo de la BD
        
              $jjob1 = new job();
              $jjob1 ->title = $_POST['titleg_j'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
              $jjob1 ->description = $_POST['descriptiong_j'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
              $jjob1 ->save();
        }
        
        if(!empty($_POST['titleg_p']))//comprueba si  esta vacio el envio por post para evitar algun error si no hay nada
        {//----------->con esto ya puede guardar en la base de datos gracias a la libreria que se instalo, para conectar la BD, 
          //sin tener que usar codigo de la BD
        
              $jjob2 = new Project();
              $jjob2 ->title = $_POST['titleg_p'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
              $jjob2 ->description = $_POST['descriptiong_p'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
              $jjob2 ->save();
        }
        
        //usamos el var_dump para ver el contenido y la forma en la que mandan la informacion dependiendo el metodo que se use en el form
        var_dump($_GET);// Variable global para envia a la base de datos o paginas, mostrando el conteniod de varibles en la barra de direcciones
        var_dump($_POST);//Variable global para envia a la base de datos o paginas, sin mostrar el conteniod de varibles en la barra de direcciones
        

        include '../views/addJob.php';

    }
}