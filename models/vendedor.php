<?php

namespace Model;

class Vendedor extends activeRecord{
    protected static $tabla='vendedores';
    protected static $columnas_DB=['id','nombre','apellido','telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args=[])
    {
        $this->id=$args['id']??null;
        $this->nombre=$args['nombre']??'';
        $this->apellido=$args['apellido']??'';
        $this->telefono=$args['telefono']??'';
    }

    public function validar(){
        if(!$this->nombre){
            self::$errores[]="debes de añadir un nombre";
        }
        if(!$this->apellido){
            self::$errores[]="debes de añadir un apellido";
        }
        if(!$this->telefono){
            self::$errores[]="debes de añadir un teléfono";
        }
        if(!preg_match('/[0-9]{10}/',$this->telefono)){
            self::$errores[]="Formato de teléfono no valido";
        }
        return self::$errores;
    }
}