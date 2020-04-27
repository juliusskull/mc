<?php
/**
 * Created by PhpStorm.
 * User: jgutierrez
 * Date: 11/01/18
 * Time: 13:11
 */
require_once "util.php";
require_once "../model/cta_cte_det.php";


if(isset($_GET["tabla"])){
    if($_GET["tabla"]=="cta_cte_det"){
        if(isset($_GET["accion"])){
            set_accion_cta_cte_det($_GET["accion"]);
        }
    }
}

if(isset($_POST["tabla"])){
    if($_POST["tabla"]=="cta_cte_det"){
        if(isset($_POST["accion"])){
            set_accion_cta_cte_det($_POST["accion"]);

        }
    }

}
function set_accion_cta_cte_det($accion){
    Twig_Autoloader::register();
    $loader = new Twig_Loader_String();
    $loader = new Twig_Loader_Filesystem("../views/");
    $twig = new Twig_Environment($loader);

    $obj = new Cta_cte_det();
    switch($accion){
        case "add":
        try {
            $new_obj=getCta_cte_detPost();
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
            $template = $twig->loadTemplate("cta_cte_detOne.html");
            $array    = $obj->getOne($id);
            echo $template->render(array("CAMPOS" => $array[0],"ESTADOS"=>get_estados()));
        break;
        case "new":

            $template = $twig->loadTemplate("cta_cte_detOne.html");
            $array = ["id" => $obj->id ];
            echo $template->render(array("CAMPOS" => $array));
        break;
        case "ver":
            $id=$_GET["id"];
            $template = $twig->loadTemplate("cta_cte_detver.html");
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
            $template = $twig->loadTemplate("cta_cte_detall.html");
            $array    = $obj->getAll();
            echo $template->render(array("CAMPOS" => $array));
        break;

         case "json":
            echo $obj->getAll_json();

        break;
    }



}function getCta_cte_detPost(){
   $obj = new Cta_cte_det();
   $obj->id=$_POST["id"];
   $obj->id_cta_cte=$_POST["id_cta_cte"];
   $obj->sub_total=$_POST["sub_total"];
   $obj->fch_alta=$_POST["fch_alta"];
   $obj->id_usu_alta=$_POST["id_usu_alta"];
   $obj->usuarioid=$_POST["usuarioid"];
    return $obj;
}
