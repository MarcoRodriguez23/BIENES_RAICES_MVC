<?php

namespace Controllers;

use MVC\Router as Router;
use Model\Admin as Admin;

require_once '../Router.php';
require_once '../models/admin.php';

class LoginController{

    public static function login(Router $router){

        $errores=[];

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if(empty($errores)){
                //verificar si el usuario existe
                $resultado=$auth->existeUsuario();

                if(!$resultado){
                    $errores = Admin::getErrores();
                }
                else{
                    //verificar el password
                    $autenticado=$auth->comprobarPassword($resultado);
                    //autenticar al usuario
                    if($autenticado){
                        $auth->autenticar();
                    }
                    else{
                        $errores = Admin::getErrores();
                    }
                }
                
            }
        }

        $router->view('auth/login',[
            'errores'=>$errores
        ]);
    }

    public static function logout(Router $router){
        session_start();
        $_SESSION=[];
        header('Location: /');
    }
}