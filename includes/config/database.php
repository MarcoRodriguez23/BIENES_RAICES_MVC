<?php

    function conectarDB() : mysqli {
        $hostname='localhost';
        $username='root';
        $password='upiicsa23';
        $database='bienes_raices';
        $db= new mysqli($hostname,$username,$password,$database);

        if(!$db){
            echo "No se conecto";
            exit;
        }
        return $db;
    }