<?php
/**
 * Created by PhpStorm.
 * User: jgutierrez
 * Date: 11/01/18
 * Time: 13:11
 */
require_once "util.php";
require_once "../model/historial.php";


if(isset($_GET["tabla"])){
    if($_GET["tabla"]=="historial"){
        if(isset($_GET["accion"])){
            set_accion_historial($_GET["accion"]);
        }
    }
}

if(isset($_POST["tabla"])){
    if($_POST["tabla"]=="historial"){
        if(isset($_POST["accion"])){
            set_accion_historial($_POST["accion"]);

        }
    }

}
function set_accion_historial($accion){
    Twig_Autoloader::register();
    $loader = new Twig_Loader_String();
    $loader = new Twig_Loader_Filesystem("../views/");
    $twig = new Twig_Environment($loader);

    $obj = new Historial();
    switch($accion){
        case "add":
        try {
            $new_obj=getHistorialPost();
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
            $template = $twig->loadTemplate("historialOne.html");
            $array    = $obj->getOne($id);
            echo $template->render(array("CAMPOS" => $array[0],"ESTADOS"=>get_estados()));
        break;
        case "new":

            $template = $twig->loadTemplate("historialOne.html");
            $array = ["id" => $obj->id ];
            echo $template->render(array("CAMPOS" => $array));
        break;
        case "ver":
            $id=$_GET["id"];
            $template = $twig->loadTemplate("historialver.html");
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
            $template = $twig->loadTemplate("historialall.html");
            $array    = $obj->getAll();
            echo $template->render(array("CAMPOS" => $array));
        break;

         case "json":
            echo $obj->getAll_json();

        break;
    }



}function getHistorialPost(){
   $obj = new Historial();
   $obj->id=$_POST["id"];
   $obj->id_cliente=$_POST["id_cliente"];
   $obj->observacion=$_POST["observacion"];
   $obj->fch_alta=$_POST["fch_alta"];
   $obj->id_tratamiento=$_POST["id_tratamiento"];
   $obj->usuarioid=$_POST["usuarioid"];
    return $obj;
}
