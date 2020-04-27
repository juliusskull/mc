<?php
/**
 * Created by PhpStorm.
 * User: jgutierrez
 * Date: 11/01/18
 * Time: 13:11
 */
require_once "util.php";
require_once "../model/tratamiento_tipo.php";


if(isset($_GET["tabla"])){
    if($_GET["tabla"]=="tratamiento_tipo"){
        if(isset($_GET["accion"])){
            set_accion_tratamiento_tipo($_GET["accion"]);
        }
    }
}

if(isset($_POST["tabla"])){
    if($_POST["tabla"]=="tratamiento_tipo"){
        if(isset($_POST["accion"])){
            set_accion_tratamiento_tipo($_POST["accion"]);

        }
    }

}
function set_accion_tratamiento_tipo($accion){
    Twig_Autoloader::register();
    $loader = new Twig_Loader_String();
    $loader = new Twig_Loader_Filesystem("../views/");
    $twig = new Twig_Environment($loader);

    $obj = new Tratamiento_tipo();
    switch($accion){
        case "add":
        try {
            $new_obj=getTratamiento_tipoPost();
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
            $template = $twig->loadTemplate("tratamiento_tipoOne.html");
            $array    = $obj->getOne($id);
            echo $template->render(array("CAMPOS" => $array[0],"ESTADOS"=>get_estados()));
        break;
        case "new":

            $template = $twig->loadTemplate("tratamiento_tipoOne.html");
            $array = ["id" => $obj->id ];
            echo $template->render(array("CAMPOS" => $array));
        break;
        case "ver":
            $id=$_GET["id"];
            $template = $twig->loadTemplate("tratamiento_tipover.html");
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
            $template = $twig->loadTemplate("tratamiento_tipoall.html");
            $array    = $obj->getAll();
            echo $template->render(array("CAMPOS" => $array));
        break;

         case "json":
            echo $obj->getAll_json();

        break;
    }



}function getTratamiento_tipoPost(){
   $obj = new Tratamiento_tipo();
   $obj->id=$_POST["id"];
   $obj->nombre=$_POST["nombre"];
   $obj->fecha_alta=$_POST["fecha_alta"];
   $obj->id_usu_alta=$_POST["id_usu_alta"];
   $obj->id_usu_cad=$_POST["id_usu_cad"];
   $obj->fch_cad=$_POST["fch_cad"];
   $obj->usuarioid=$_POST["usuarioid"];
    return $obj;
}
