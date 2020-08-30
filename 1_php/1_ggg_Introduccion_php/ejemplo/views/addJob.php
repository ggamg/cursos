<html>
    <head>
      <title>Add Job</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
    </head>
    <body>
      <h1>Add Job</h1><!--en action pusiomos la ruta programada en /public/index.php-->
      <form action="/1_cursos/1_php/1_ggg_Introduccion_php/ejemplo/jobs/add" method="post"><!-- con este formulario se puede indicar como quiero enviar los datos que se piden-->
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