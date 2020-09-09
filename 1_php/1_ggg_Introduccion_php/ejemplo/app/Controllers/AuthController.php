<?php
//espacion de nombres este se llama cuando se nesesita usar el metodo y se escribre use y el namespace
namespace App\Controllers;

//llama los namespace que creamos para implementar los metodos que contiene
use App\Models\User;
use Respect\Validation\Validator as v;


class AuthController extends BaseController {
    public function getLogin() {//redirige de forma segura a addUser.twig por medio del get
        return $this->renderHTML('login.twig');
    }

    //metodo
    public function postLogin($request) {//redirige de forma segura a addUser.twig por medio del post
        $postData = $request->getParsedBody();

        // verifica que el correo y el password sea correcto
        /*aqui hace una busqueda donde el campo email en BD sea igual a $postData['email'] enviado desde el fomrulario login.twig
        esto con el fin de filtrar los correos y verificar despues el password*/
        $user = User::where('email', $postData['email'])->first();
        if($user)//si encuentra el correo del susario, sera true y pasamos el condicional
        {
            //hace verificacion con el hash, verifica con encriptacion
            //verifica el password enviado desde el formulario login.twig con el password de la BD
            if (password_verify($postData['password'], $user->password))
            {
                echo 'Correct';
            }else
            {
                echo 'Wrong';
            }
        }else{
            echo 'Not Found';
        }
        
        // $user = new User();
        // $user->email = $postData['email'];//usa el postData por medio de las librerias para validar el dato y almacenarlo en el campo email de la BD
        // $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);//usa el postData por medio de las librerias para validar dato y encriptar
        // $user->save();
        // return $this->renderHTML('addUser.twig');
    }
}