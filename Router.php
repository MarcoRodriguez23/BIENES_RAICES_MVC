<?php

namespace MVC;

class Router{
    public array $rutasGET=[];
    public array $rutasPOST=[];
    
    public function get($url, $fn){
        $this->rutasGET[$url]=$fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url]=$fn;
    }

    public function comprobarRutas(){
        session_start();

        $auth= $_SESSION['login']??null;

        //arreglo de rutas protegidas
        $rutas_protegidas=['/admin','propiedades/crear','propiedades/actualizar','propiedades/eliminar','vendedores/crear','vendedores/actualizar','vendedores/eliminar'];
        
        //CAMBIAR PATH_INFO POR REQUEST_URI AL PASAR A HEROKU
        $urlActual =  ($_SERVER['REQUEST_URI']==='')?'/': $_SERVER['REQUEST_URI'];
        $metodo = $_SERVER['REQUEST_METHOD'];

        //dividimos la URL actual cada vez que exista un '?' eso indica que se están pasando variables por la url
        $splitURL = explode('?', $urlActual);
        // debuguear($splitURL);
        
        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$splitURL[0]] ?? null; //$splitURL[0] contiene la URL sin variables 
        } else {
            $fn = $this->rutasPOST[$splitURL[0]] ?? null;
        }

        //protegiendo rutas
        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header('Location: /');
        }


        if($fn){
            //la URL existe y tiene una funcion asociada, el this le pasa las rutas get y post (atributos)
            call_user_func($fn,$this);
        }
        else{
            echo "pagina no encontrada";
        }
        // debuguear($this);
    }

    // muestra la vista
    public function view($view, $datos=[]){
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }

}