<?php

namespace Controllers;



use MVC\Router as Router;
use Model\Propiedad as Propiedad;
use Model\Blog as Blog;
use PHPMailer\PHPMailer\PHPMailer as PHPMailer;

require_once '../Router.php';
require_once '../models/propiedad.php';
require_once '../models/Blog.php';

class PaginasController{

    public static function index(Router $router){
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->view('/paginas/index',[
            'propiedades'=>$propiedades,
            'inicio'=>$inicio
        ]);
    }

    public static function nosotros(Router $router){
        $router->view('/paginas/nosotros',[

        ]);
    }

    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();
        $router->view('/paginas/propiedades',[
            'propiedades'=>$propiedades
        ]);
    }

    public static function propiedad(Router $router){
        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);

        $router->view('/paginas/propiedad',[
            'propiedad'=>$propiedad
        ]);
    }

    public static function blog(Router $router){
        
        $router->view('/paginas/blog',[
            
        ]);
    }

    public static function entrada(Router $router){
        $id = validarORedireccionar('/blog');
        $entrada = Blog::find($id);

        $router->view('/paginas/entrada',[
            'entrada'=>$entrada
        ]);
    }

    public static function contacto(Router $router){
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD']==="POST"){
            $respuestas=$_POST['contacto'];
           
            //crear una instancia de PHPMailer
            $mail = new PHPMailer();

            //Configurando SMTP
            $mail->isSMTP();
            $mail->Host='smtp.mailtrap.io';
            $mail->SMTPAuth= true;
            $mail->Username='f8f5444957e76d';
            $mail->Password='0642cad10af248';
            $mail->SMTPSecure='tls';
            $mail->Port='2525';

            //configurando el contenido  del Email
            //quien lo envia
            $mail->setFrom('admin@bienesraices.com');
            //A donde va
            $mail->addAddress('admin@bienesraices.com','bienes raices.com');
            $mail->Subject='Tienes un nuevo mensaje';
            //habilitar html
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre:'. $respuestas['nombre'] . '</p>';
            
            //enviar de forma condicional algunos campos
            if($respuestas['contacto']==="telefono"){
                $contenido .= '<p>Eligio ser contactado por Teléfono: </p>';
                $contenido .= '<p>Teléfono:'. $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha de contacto: '. $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora de contacto: '. $respuestas['hora'] . '</p>';
            }
            else{
                $contenido .= '<p>Eligio ser contactado por Email: </p>';
                $contenido .= '<p>Email:'. $respuestas['email'] . '</p>';
            }
            
            $contenido .= '<p>Mensaje:'. $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o compra:'. $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio o presupuesto: $'. $respuestas['precio'] . '</p>';
            
            $contenido .= '<html>';

            $mail->Body = $contenido;
            $mail->AltBody = "texto alternativo";

            if($mail->send()){
                $mensaje= "mensaje enviado";
            }
            else{
                $mensaje = "mensaje no enivado";
            }
        }
        
        $router->view('/paginas/contacto',[
            'mensaje'=>$mensaje
        ]);
    }


}