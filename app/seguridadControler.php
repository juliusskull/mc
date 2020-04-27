<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 20/02/18
 * Time: 08:51
 */
require_once 'db/database.php';
require_once 'model/usuario.php';
$seguridad = array(
    "permiso" => 0
);
function get_usuario_valido($us,$pas){
    $usuario= new Usuario();
    $s= $usuario->isExiste($us,$pas);
    $seguridad['permiso']=$usuario->getPermiso();
    echo $seguridad['permiso']."<p>";
    return $s;
}
