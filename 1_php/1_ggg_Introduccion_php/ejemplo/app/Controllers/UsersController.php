<?php
//espacion de nombres este se llama cuando se nesesita usar el metodo y se escribre use y el namespace
namespace App\Controllers;

//llama los namespace que creamos para implementar los metodos que contiene
use App\Models\User;
use Respect\Validation\Validator as v;


class UsersController extends BaseController {
    public function getAddUser() {//redirige de forma segura a addUser.twig por medio del get
        return $this->renderHTML('addUser.twig');
    }

    public function postSaveUser($request) {//redirige de forma segura a addUser.twig por medio del post
        $postData = $request->getParsedBody();

        // Validation here
        $user = new User();
        $user->email = $postData['email'];//usa el postData por medio de las librerias para validar el dato y almacenarlo en el campo email de la BD
        $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);//usa el postData por medio de las librerias para validar dato y encriptar con password_hash
        $user->save();
        return $this->renderHTML('addUser.twig');
    }
}