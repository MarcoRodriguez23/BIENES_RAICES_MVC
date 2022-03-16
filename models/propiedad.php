<?php

namespace Model;

class Propiedad extends activeRecord{
    protected static $tabla='propiedades';
    protected static $columnas_DB=['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args=[])
    {
        $this->id=$args['id']??null;
        $this->titulo=$args['titulo']??'';
        $this->precio=$args['precio']??'';
        $this->imagen=$args['imagen']??'';
        $this->descripcion=$args['descripcion']??'';
        $this->habitaciones=$args['habitaciones']??'';
        $this->wc=$args['wc']??'';
        $this->estacionamiento=$args['estacionamiento']??'';
        $this->creado=date('Y/m/d');
        $this->vendedorId=$args['vendedorId']??'';
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[]="debes de añadir un titulo";
        }
        if(!$this->precio){
            self::$errores[] = "debes agregar un precio";
        }
        if(strlen($this->descripcion)<50){
            self::$errores[] = "la descripcion es obligatoria y debe tener al menos 50 caracteres";
        }
        if(!$this->habitaciones){
            self::$errores[] = "El numero de habitaciones es obligatorio";
        }
        if(!$this->wc){
            self::$errores[] = "El numero de wc es obligatorio";
        }
        if(!$this->estacionamiento){
            self::$errores[] = "El numero de estacionamiento es obligatorio";
        }
        if (!$this->vendedorId) {
            self::$errores[] = "elige un vendedor";
        }
        if (!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        }
    
        return self::$errores;
    }
}



