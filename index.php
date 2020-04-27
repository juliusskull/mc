<?php
/**
 * Created by PhpStorm.
 * User: jgutierrez
 * Date: 22/01/18
 * Time: 13:00
 */
session_start();
require_once 'Twig/Autoloader.php';


require_once 'app/seguridadControler.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_String();
$loader = new Twig_Loader_Filesystem("pages/");
$twig = new Twig_Environment($loader);



$url="http://".$_SERVER['SERVER_NAME'].str_replace("index.php","",$_SERVER['PHP_SELF']);

if(isset($_POST["login"])){

    if(isset($_POST["username"])&& isset($_POST["password"]) ){
        $_SESSION['permiso'] = get_usuario_valido($_POST["username"],$_POST["password"]);
        if($_SESSION['permiso']>0){
            $_SESSION['usuario']=$_POST["username"];
            $_SESSION['count'] = 1;

        }

    }else{
        $_SESSION['count'] = 0;
        $_SESSION['permiso']=-1;
        $template = $twig->loadTemplate("sign-in.html");
    }

}
if(isset($_SESSION['count']) && $_SESSION['count']>0 ){

    if(isset($_GET["pantalla"])){
        $template = $twig->loadTemplate("principal.html");
    }else{
        $template = $twig->loadTemplate("index.html");
    }

}else{
    $_SESSION['count'] = 0;
    $template = $twig->loadTemplate("sign-in.html");
}


$json_url = "asset/menu.json";
$json = file_get_contents($json_url);
$menu = json_decode($json, TRUE);

$json_url = "asset/menu_configuracion.json";
$json = file_get_contents($json_url);
$menu_configuracion = json_decode($json, TRUE);

$json_url = "asset/config.json";
$json = file_get_contents($json_url);
$sistema = json_decode($json, TRUE);

$json_url = "asset/sub_menu.json";
$json = file_get_contents($json_url);
$sub_menu = json_decode($json, TRUE);

$json_url = "asset/destinos.json";
$json = file_get_contents($json_url);
$destino = json_decode($json, TRUE);

$json_url = $url.'app/index.php?tabla=clientes&accion=json';
$json = file_get_contents($json_url);
$cli = json_decode($json, TRUE);

$usuario="";

if(isset($_SESSION['usuario'])){
    $usuario=$_SESSION['usuario'];
}


$permiso_usuario=-1;
if(isset($_SESSION['permiso'])){
    $permiso_usuario =$_SESSION['permiso'];
}
echo $template->render(
    array("CAMPOS" => "","SISTEMA"=>$sistema,"MENU"=>$menu,"SUB_MENU"=>$sub_menu
,"USUARIO"=>$usuario
,"DESTINOS"=>$destino,"CLIENTES"=>$cli
,"MENU_CONFIGURACION"=>$menu_configuracion
,"PERMISO"=>$permiso_usuario
)
    );
