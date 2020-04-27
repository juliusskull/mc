<?php
/**
 * Created by PhpStorm.
 * User: jgutierrez
 * Date: 11/01/18
 * Time: 13:11
 */
require_once "util.php";
require_once "../model/clientes.php";


if(isset($_GET["tabla"])){
    if($_GET["tabla"]=="clientes"){
        if(isset($_GET["accion"])){
            set_accion_clientes($_GET["accion"]);
        }
    }
}

if(isset($_POST["tabla"])){
    if($_POST["tabla"]=="clientes"){
        if(isset($_POST["accion"])){
            set_accion_clientes($_POST["accion"]);

        }
    }

}
function set_accion_clientes($accion){
    Twig_Autoloader::register();
    $loader = new Twig_Loader_String();
    $loader = new Twig_Loader_Filesystem("../views/");
    $twig = new Twig_Environment($loader);

    $obj = new Clientes();
    switch($accion){
        case "add":
        try {
            $new_obj=getClientesPost();
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
            $template = $twig->loadTemplate("clientesOne.html");
            $array    = $obj->getOne($id);
            echo $template->render(array("CAMPOS" => $array[0],"ESTADOS"=>get_estados()));
        break;
        case "new":

            $template = $twig->loadTemplate("clientesOne.html");
            $array = ["id" => $obj->id ];
            echo $template->render(array("CAMPOS" => $array));
        break;
        case "ver":
            $id=$_GET["id"];
            $template = $twig->loadTemplate("clientesver.html");
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
            $template = $twig->loadTemplate("clientesall.html");
            $array    = $obj->getAll();
            echo $template->render(array("CAMPOS" => $array));
        break;

         case "json":
            echo $obj->getAll_json();

        break;
    }



}function getClientesPost(){
   $obj = new Clientes();
   $obj->id=$_POST["id"];
   $obj->nombre=$_POST["nombre"];
   $obj->apellido=$_POST["apellido"];
   //echo  "fch_nac=".$_POST["fecha_nac"];

   $obj->fecha_nac=$obj->get_new_date_db($_POST["fecha_nac"]);
   $obj->fecha_nac=$_POST["fecha_nac"];
   $obj->peso=$_POST["peso"];
   $obj->telefono1=$_POST["telefono1"];
   $obj->dni=$_POST["dni"];
   $obj->sexo=$_POST["sexo"];
   $obj->direccion=$_POST["direccion"];
   $obj->ciudad=$_POST["ciudad"];
   $obj->fch_alta=$_POST["fch_alta"];
   $obj->id_usu_alta=$_POST["id_usu_alta"];
   $obj->estado=$_POST["estado"];
   $obj->usuarioid=$_POST["usuarioid"];
    return $obj;
}
