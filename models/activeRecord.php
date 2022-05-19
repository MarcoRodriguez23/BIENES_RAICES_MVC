<?php

namespace Model;

class activeRecord{
    //base de datos
    protected static $db;
    protected static $columnas_DB=[];
    protected static $tabla='';

    //errores y validacion
    protected static $errores=[];

    public static function setDB($database){
        self::$db=$database;
    }

    //validacion
    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
        static::$errores=[];
        return static::$errores;
    }

    public function guardar(){
        if(!is_null($this->id)){
            //actualizar
            $resultado=$this->actualizar();
        }
        else{
            //crear
            $resultado=$this->crear();
        }
        return $resultado;        
    }

    public function actualizar(){
        //sanitizando los datos
        $atributos= $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        
        $query = "UPDATE ". static::$tabla ." SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id). "' ";
        $query .= " LIMIT 1";

        $resultado=self::$db->query($query);

        return $resultado;
        
    }
    
    public function crear(){
        //sanitizando los datos
        $atributos= $this->sanitizarAtributos();

        //insertando informacion a la base de datos
        $insert = "INSERT INTO ". static::$tabla ." ( ";
        $insert .=  join(', ',array_keys($atributos)); 
        $insert .= " ) values (' ";
        $insert .=  join("', '",array_values($atributos)); 
        $insert .= " ') ";

        $resultado = self::$db->query($insert);
        
        return $resultado;
        
    }

    public function eliminar(){
        // eliminando propiedad
        $borrar = "DELETE FROM ". static::$tabla ." WHERE id= ". self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado= self::$db->query($borrar);

        if($resultado){
            $this->borrarImagen();
            header('Location: /admin?mensaje=3');
        }
    }

    //identificar y unir los atributos para la DB
    public function atributos(){
        $atributos=[];
        foreach (static::$columnas_DB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna]=$this->$columna;
        }
        return $atributos;
    }

    //imagen
    public function Setimagen($imagen){
        //eliminar imagen previa
        if(!is_null( $this->id )){
            $this->borrarImagen();
        }
        //asignando al atributo imagen del objeto, el nombre de la imagen
        if($imagen){
            $this->imagen=$imagen;
        }
    }

    //eliminar el archivo
    public function borrarImagen(){
        //comprobar si existe el archivo
        $existe = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existe){
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }


    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        
        $sanitizando = [];
        foreach ($atributos as $key => $value) {
            $sanitizando[$key]=self::$db->escape_string($value);
        }
        return $sanitizando;
    }

    //listar todas las propiedades
    public static function all(){
        $query = "SELECT * FROM ".static::$tabla;
        $resultado= self::consultarSQL($query);
        return $resultado;
    }

    //obtiene determinada cantidad de registros
    public static function get($cantidad){
        $query = "SELECT * FROM ".static::$tabla . " LIMIT ". $cantidad;
        $resultado= self::consultarSQL($query);
        return $resultado;
    }


    //buscar una registro por su ID
    public static function find($id){
        //obteniendo la propiedad
        $query = "SELECT * FROM ". static::$tabla ." WHERE id=${id}";
        $resultado=self::consultarSQL($query);
        return array_shift($resultado);
    }

    //buscar un registro por columna y valor
    public static function where($columna,$valor) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE ${columna} = '${valor}'";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    public static function consultarSQL($query){
        //consultar la bd
        $resultado = self::$db->query($query);
        //iterar resultados
        $array = [];
        while ($registro=$resultado->fetch_assoc()) {
            $array[]=static::crearObjeto($registro);
        }
        //liberar memoria
        $resultado->free();
        //retornar los resultados
        return $array;

    }
    protected static function crearObjeto($registro){
        $objeto = new static;
        foreach ($registro as $key => $value) {
            if(property_exists($objeto,$key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
    //sincronizar el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args=[]){
        foreach ($args as $key => $value) {
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key=$value;
            }
        }
    }
}