<?php
require_once '../Twig/Autoloader.php';require_once '../db/database.php';

function get_estados(){
    $json_data = file_get_contents( '../asset/estados.json');
    return json_decode($json_data);
}

function get_message($i){
    $s="";
    switch ($i) {
        case "modificacion":
            $s= "Se actualizo correctamente la aplicacion";
            break;
        case "modificacion-error":
            $s= "Se produjo un error y no se pudo actualizar la aplicacion";
            break;
        case "caducar":
            $s= "La accion de borrado se realizo correctamente ";
            break;
        case "borrar-usuario":
            $s= "Se borro el usuario seleccionado";
            break;
    }
    return $s;

}