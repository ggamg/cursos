<?php
//espacion de nombres este se llama cuando se nesesita usar el metodo y se escribre use,para acceder por medio del namespace
namespace App\Controllers;
use Zend\Diactoros\Response\HtmlResponse;

class BaseController
{
  //se pone protected para declarar varialbe que solo es usada con metodos o funciones heredadas
  protected $templateEngine;

  public function __construct()
  {//ponemos el codigo que nos explican en la documentacion de twig y lo adaptamos a nuestro proyecto
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $this->templateEngine =  new \Twig\Environment($loader, [
      'debug' => true,//ayuda a mostrar errores si los encuentra
      'cache' => false
    ]);
  }

//creamos funcion para llamar el template 
  public function renderHTML($fileNme,$data=[]){
    return new HtmlResponse($this->templateEngine->render($fileNme,$data));//ejecutar el template
  }
}
