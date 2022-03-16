<?php

namespace Model;

class Blog extends activeRecord{
    protected static $tabla='blog';
    protected static $columnas_DB=['id','titulo','fecha','autor','imagen','descripcion'];

    public $id;
    public $titulo;
    public $fecha;
    public $autor;
    public $imagen;
    public $descripcion;

    public function __construct($args=[])
    {
        $this->id=$args['id']??null;
        $this->titulo=$args['titulo']??'';
        $this->fecha=$args['fecha']??'';
        $this->autor=$args['autor']??'';
        $this->imagen=$args['imagen']??'';
        $this->descripcion=$args['descripcion']??'';
    }
}