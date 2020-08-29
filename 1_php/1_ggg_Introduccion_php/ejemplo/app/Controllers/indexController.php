<?php

//espacion de nombres este se llama cuando se nesesita usar el metodo y se escribre use y el namespace
namespace App\Controllers;

//llama los namespace que creamos para implementar los metodos que contiene
use App\Models\{job, Project};


class IndexController
{
    public function indexAction()
    {
        //---->este va a obeneter todos los regisros que encuentre usando el objeto que esta en app/Models/job.php usando el ORM
        $jobs = job::all();

//$project1 = new Project('Project 1', 'Description 1');no es necesario cuando se tiene el ORM, este se usaba cuando se tenia el contructor 

//---->este va a obeneter todos los regisros que encuentre usando el objeto que esta en app/Models/job.php usando el ORM
        $projects = Project::all();

/*este ya no se va a usar por que se va a utilizar el ORM que hace la conecxion a BD 
    //arreglo de objetos
        $projects = [
          $project1
];*/
             
        $name = 'Hector Benitez';
        $limitMonths = 2000;

        include '../views/index.php';//incluye esta paginaen el codigo 
        
    }
}