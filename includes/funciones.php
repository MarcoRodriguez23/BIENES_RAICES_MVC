<?php


define('TEMPLATES_URL', __DIR__. '/templates');
define('FUNCIONES_URL', __DIR__. 'funciones.php');
define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'].'/imagenes/');


function incluirTemplate(string $nombre, bool $inicio = false){
    include TEMPLATES_URL."/${nombre}.php";
}

function estaAutenticado(){
    session_start();
    if(!$_SESSION['login']){
        return header('Location: /');
    }
}

function debuguear($variable){
    var_dump($variable);
    exit;
}

//escapar HTML
function s($html){
    $s=htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo){
    $tipos=['vendedor','propiedad'];

    return in_array($tipo,$tipos);
}

function mostrarNotificacion($codigo){
    $mensaje='';

    switch ($codigo) {
        case 1:
            $mensaje = "Creado Correctamente";
            break;
        
        case 2:
            $mensaje = "Actualizado Correctamente";
            break;

        case 3:
            $mensaje = "Eliminado Correctamente";
            break;

        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url){
    //validando la url
    $id = $_GET['id'];
    $id=filter_var($id,FILTER_VALIDATE_INT);
    if(!$id){
        header("Location: ${url}");
    }
    return $id;
}