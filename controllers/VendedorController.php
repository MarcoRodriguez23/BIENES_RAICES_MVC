<?php

namespace Controllers;

use MVC\Router as Router;
use Model\Vendedor as Vendedor;

require_once '../Router.php';
require_once '../models/vendedor.php';

class VendedorController{

    public static function create(Router $router){
        $vendedor = new Vendedor();
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD']  === 'POST') {
            //nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
            
            //validar que no haya campos vacios
            $errores=$vendedor->validar();
    
            //si no hay errores
            if(empty($errores)){
                $resultado=$vendedor->guardar();
                if($resultado){
                    header("Location: /admin?mensaje=1");
                }
            }
        }

        $router->view('vendedores/crear',[
            'vendedor'=>$vendedor,
            'errores'=>$errores
        ]);
    }

    public static function update(Router $router){
        $id = validarORedireccionar('/admin');
        $vendedor = Vendedor::find($id);
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD']  === 'POST') {

            //asignar atributos
            $args=$_POST['vendedor'];
            
            $vendedor->sincronizar($args);
    
            $errores=$vendedor->validar();
    
            if(empty($errores)){
                $resultado = $vendedor->guardar();
                // debuguear($resultado);
    
                if($resultado){
                    header("Location: /admin?mensaje=2");
                }
            }
        }

        $router->view('vendedores/actualizar',[
            'vendedor'=>$vendedor,
            'errores'=>$errores
        ]);


    }

    public static function delete(){
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            //validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if($id){
                
                $tipo=$_POST['tipo'];
        
                if(validarTipoContenido($tipo)){
                    //eliminando objeto
                    $vendedor= Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}



