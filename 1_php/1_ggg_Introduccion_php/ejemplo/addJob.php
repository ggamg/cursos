<?php
/*fijarse bien en las rutas, por que las librerias instaladas tomasn por defecto la raiz / y
muchas veces no toma encuenta las subcarpetas para tomar el index*/

//1 necesario para conectar a con MySQL, Postgres, SQL Server y SQLite 
//1---
use App\Models\job;//namespace y objeto o metodo
use App\Models\Project;//namespace y objeto o metodo


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

?>
<html>
    <head>
      <title>Add Job</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
    </head>
    <body>
      <h1>Add Job</h1>
      <form action="addJob.php" method="post"><!-- con este formulario se puede indicar como quiero enviar los datos que se piden-->
       <label for="">Title:</label>
       <input type="text" name="titleg_j"><br>
       <label for="">Description:</label>
       <input type="text" name="descriptiong_j"><br>
       <!-- <button type="submint">Save</button> con este boton puedo indicar el momento en que envio los datos del formulario-->
      <!-- </form> --> 

      <h1>Add Project</h1>
      <!-- <form action="addJob.php" method="post">con este formulario se puede indicar como quiero enviar los datos que se piden -->
       <label for="">Title:</label>
       <input type="text" name="titleg_p"><br>
       <label for="">Description:</label>
       <input type="text" name="descriptiong_p"><br>
       <button type="submint">Save</button><!-- con este boton puedo indicar el momento en que envio los datos del formulario-->
      </form>
    </body>
 </html>