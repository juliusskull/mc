<?php
/**
 * Created by PhpStorm.
 * User: jgutierrez
 * Date: 11/01/18
 * Time: 13:11
 */
require_once "util.php";
require_once "../model/tratamiento_observaciones.php";


if(isset($_GET["tabla"])){
    if($_GET["tabla"]=="tratamiento_observaciones"){
        if(isset($_GET["accion"])){
            set_accion_tratamiento_observaciones($_GET["accion"]);
        }
    }
}

if(isset($_POST["tabla"])){
    if($_POST["tabla"]=="tratamiento_observaciones"){
        if(isset($_POST["accion"])){
            set_accion_tratamiento_observaciones($_POST["accion"]);

        }
    }

}
function set_accion_tratamiento_observaciones($accion){
    Twig_Autoloader::register();
    $loader = new Twig_Loader_String();
    $loader = new Twig_Loader_Filesystem("../views/");
    $twig = new Twig_Environment($loader);

    $obj = new Tratamiento_observaciones();
    switch($accion){
        case "add":
        try {
            $new_obj=getTratamiento_observacionesPost();
            $obj=$new_obj;
            $obj->commit();
             $output = array('status' => true, 'massage' =>get_message("modificacion") );
                echo json_encode($output);
            }
               catch(Exception $e) {
                $output = array('status' => false, 'massage' =>get_message("modificacion-error") , 'error' =>$e->getMessage());
                echo json_encode($output);
            }
        break;
        case "id":
            $id=$_GET["id"];
            $template = $twig->loadTemplate("tratamiento_observacionesOne.html");
            $array    = $obj->getOne($id);
            echo $template->render(array("CAMPOS" => $array[0],"ESTADOS"=>get_estados()));
        break;
        case "new":

            $template = $twig->loadTemplate("tratamiento_observacionesOne.html");
            $array = ["id" => $obj->id ];
            echo $template->render(array("CAMPOS" => $array));
        break;
        case "ver":
            $id=$_GET["id"];
            $template = $twig->loadTemplate("tratamiento_observacionesver.html");
            $array    = $obj->getOne($id);

            echo $template->render(array("CAMPOS" => $array[0]));
        break;
             case "delete":
            $id=$_GET["id"];

            if($obj->delete("id", $id)){
                $output = array('status' => true, 'massage' =>get_message("borrar-usuario") );
            }else{
                $output = array('status' => false, 'massage' =>get_message("modificacion-error") , 'error' =>"");
            }
            echo json_encode($output);
            break;
        case "all":
            $template = $twig->loadTemplate("tratamiento_observacionesall.html");
            $array    = $obj->getAll();
            echo $template->render(array("CAMPOS" => $array));
        break;

         case "json":
            echo $obj->getAll_json();

        break;
    }



}function getTratamiento_observacionesPost(){
   $obj = new Tratamiento_observaciones();
   $obj->id=$_POST["id"];
   $obj->id_tratamiento=$_POST["id_tratamiento"];
   $obj->fecha_alta=$_POST["fecha_alta"];
   $obj->id_tipo_tratamiento=$_POST["id_tipo_tratamiento"];
   $obj->usuarioid=$_POST["usuarioid"];
    return $obj;
}
