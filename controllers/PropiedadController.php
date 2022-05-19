<?php

namespace Controllers;

use MVC\Router as Router;
use Model\Propiedad as Propiedad;
use Model\Vendedor as Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

require_once '../Router.php';
require_once '../models/propiedad.php';
require_once '../models/vendedor.php';

class PropiedadController{

    public static function index(Router $router){

        $vendedores = Vendedor::all();
        $propiedades = Propiedad::all();
        $mensaje=$_GET['mensaje']??null;

        $router->view('propiedades/admin',[
            'propiedades'=>$propiedades,
            'vendedores'=>$vendedores,
            'mensaje'=>$mensaje
        ]); 
    }

    public static function create(Router $router){
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD']  === 'POST') {

            //creando nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);        
    
            //generando un nombre unico
            $nombreImagen = md5(uniqid(rand(),true)).".jpg";
            
            //seteando la imagen
            //haciendo un resize a la imagen
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $img = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
                
            }
            
            $errores = $propiedad->validar();
            // debuguear($errores);
    
            if(empty($errores)){
    
                //si la carpeta no existe, crearla
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                
                //guardando la imagen en el servidor
                $img->save(CARPETA_IMAGENES . $nombreImagen);
                // $img->save(trim(CARPETA_IMAGENES . $nombreImagen));
    
                //GUARDANDO EN LA BD
                $resultado=$propiedad->guardar();
                if($resultado){
                    header("Location: /admin?mensaje=1");
                }
            }        
        }

        $router->view('propiedades/crear',[
            'propiedad'=>$propiedad,
            'vendedores'=>$vendedores,
            'errores'=>$errores
        ]);
    }

    public static function update(Router $router){
        
        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $errores = $propiedad->validar();
        $vendedores = Vendedor::all();

        if ($_SERVER['REQUEST_METHOD']  === 'POST') {

            //asignar atributos
            $args=$_POST['propiedad'];
            
            $propiedad->sincronizar($args);
            // $imagen = $_FILES['propiedad']['tmp_name']['imagen'];
    
            $errores=$propiedad->validar();
            
            //generando un nombre unico
            $nombreImagen = md5(uniqid(rand(),true)).".jpg";
    
            //subida de archivos
            //haciendo un resize a la imagen
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $img = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
                
            }
    
            if(empty($errores)){

                //si la carpeta no existe, crearla
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //almacenar imagen
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    $img->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $resultado = $propiedad->guardar();
                // debuguear($resultado);
    
                if($resultado){
                    header("Location: /admin?mensaje=2");
                }
            }
        }

        $router->view('/propiedades/actualizar',[
            'propiedad'=>$propiedad,
            'errores'=>$errores,
            'vendedores'=>$vendedores
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
                    $propiedad= Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}



