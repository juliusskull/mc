<?php
/**
 * Created by PhpStorm.
 * User: jgutierrez
 * Date: 11/01/18
 * Time: 13:11
 */
require_once "util.php";
require_once "../model/tratamiento.php";


if(isset($_GET["tabla"])){
    if($_GET["tabla"]=="tratamiento"){
        if(isset($_GET["accion"])){
            set_accion_tratamiento($_GET["accion"]);
        }
    }
}

if(isset($_POST["tabla"])){
    if($_POST["tabla"]=="tratamiento"){
        if(isset($_POST["accion"])){
            set_accion_tratamiento($_POST["accion"]);

        }
    }

}
function set_accion_tratamiento($accion){
    Twig_Autoloader::register();
    $loader = new Twig_Loader_String();
    $loader = new Twig_Loader_Filesystem("../views/");
    $twig = new Twig_Environment($loader);

    $obj = new Tratamiento();
    switch($accion){
        case "add":
        try {
            $new_obj=getTratamientoPost();
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
            $template = $twig->loadTemplate("tratamientoOne.html");
            $array    = $obj->getOne($id);
            echo $template->render(array("CAMPOS" => $array[0],"ESTADOS"=>get_estados()));
        break;
        case "new":

            $template = $twig->loadTemplate("tratamientoOne.html");
            $array = ["id" => $obj->id ];
            echo $template->render(array("CAMPOS" => $array));
        break;
        case "ver":
            $id=$_GET["id"];
            $template = $twig->loadTemplate("tratamientover.html");
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
            $template = $twig->loadTemplate("tratamientoall.html");
            $array    = $obj->getAll();
            echo $template->render(array("CAMPOS" => $array));
        break;

         case "json":
            echo $obj->getAll_json();

        break;
    }



}function getTratamientoPost(){
   $obj = new Tratamiento();
   $obj->id=$_POST["id"];
   $obj->id_cliente=$_POST["id_cliente"];
   $obj->id_tipo_tratamiento=$_POST["id_tipo_tratamiento"];
   $obj->fch_ini=$_POST["fch_ini"];
   $obj->fch_fin=$_POST["fch_fin"];
   $obj->fch_alta=$_POST["fch_alta"];
   $obj->id_usu_alta=$_POST["id_usu_alta"];
   $obj->fch_cad=$_POST["fch_cad"];
   $obj->usuarioid=$_POST["usuarioid"];
    return $obj;
}
