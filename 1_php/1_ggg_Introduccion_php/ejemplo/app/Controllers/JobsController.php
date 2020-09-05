<?php

//espacion de nombres este se llama cuando se nesesita usar el metodo y se escribre use y el namespace
namespace App\Controllers;

//llama los namespace que creamos para implementar los metodos que contiene
use App\Models\{job, Project};
use Respect\Validation\Validator as v;

class JobsController extends BaseController
{
    public function getAddJobAction($request)
    {
      $responseMessage =  null;
        var_dump($request->getMethod());
        echo '<br>';
        var_dump($request->getParsedBody());

    if($request->getMethod() == 'POST')
    {
      //este codigo valida que no este vacio el campo del formulario
      $postData = $request->getParsedBody();
      $jobValidator = v::key('titleg_j', v::stringType()->notEmpty())
                  ->key('descriptiong_j', v::stringType()->notEmpty());

        try{//esto intenta ejecutar el bloque de codigo y si falla pasa al catch
        // $jobValidator->validate($postData); // true
            $jobValidator->assert($postData); // muestra resultado
            $postData = $request->getParsedBody();
              $jjob1 = new job();//se hace un instancia al objeto job que esta en /app/Models/job.php para enviar a la BD              
              $jjob1 ->title = $postData['titleg_j'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
              $jjob1 ->description = $postData['descriptiong_j'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
              $jjob1 ->save();

              //mirar el codigo del final de esta pagina
              $responseMessage = 'Saved';//si se ejecuta bien el try guarda el Saved para mostrarlo en addJob.twig

        // if(!empty($_POST['titleg_j']))//comprueba si  esta vacio el envio por post para evitar algun error si no hay nada
        // {//--------------->con esto ya puede guardar en la base de datos gracias a la libreria que se instalo, para conectar la BD, 
        //   //sin tener que usar codigo de la BD
        
        //     // $postData = $request->getParsedBody();
        //     //   $jjob1 = new job();//se hace un instancia al objeto job que esta en /app/Models/job.php para enviar a la BD              
        //     //   $jjob1 ->title = $postData['titleg_j'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
        //     //   $jjob1 ->description = $postData['descriptiong_j'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
        //     //   $jjob1 ->save();

        //     //   $jjob1 = new job();
        //     //   $jjob1 ->title = $_POST['titleg_j'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
        //     //   $jjob1 ->description = $_POST['descriptiong_j'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
        //     //   $jjob1 ->save();
        // }  
        }catch(\Exception $e){//si falla el bloque de codigo muestra el error en addjob.twig
          //mirar el codigo del final de esta pagina  
          $responseMessage = $e->getMessage();
        }
        
        if(!empty($_POST['titleg_p']))//comprueba si  esta vacio el envio por post para evitar algun error si no hay nada
        {//----------->con esto ya puede guardar en la base de datos gracias a la libreria que se instalo, para conectar la BD, 
          //sin tener que usar codigo de la BD

          $postData = $request->getParsedBody();
              $jjob2 = new Project();
              $jjob2 ->title = $postData['titleg_p'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
              $jjob2 ->description = $postData['descriptiong_p'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
              $jjob2 ->save();

            //   $jjob2 = new Project();
            //   $jjob2 ->title = $_POST['titleg_p'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
            //   $jjob2 ->description = $_POST['descriptiong_p'];//title esta en BD, usuand el ORM, por eso llamamos el project que creamos para llamar la BD
            //   $jjob2 ->save();
        }
    }

        echo "</br>";
        echo "</br>";
        //usamos el var_dump para ver el contenido y la forma en la que mandan la informacion dependiendo el metodo que se use en el form
        var_dump($_GET);// Variable global para envia a la base de datos o paginas, mostrando el conteniod de varibles en la barra de direcciones
        echo "</br>";
        var_dump($_POST);//Variable global para envia a la base de datos o paginas, sin mostrar el conteniod de varibles en la barra de direcciones
        
       
        // include '../views/addJob.php';
           
        //Esta funcion es tomada de BaseController
        return $this->renderHTML('addJob.twig', [
          'responseMessage' =>$responseMessage 
        ]);

    }

}