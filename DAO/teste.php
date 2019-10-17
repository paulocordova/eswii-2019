<?php
require_once('DAOUsuario.php');
use DAO\DAOUsuario;
$daoUsuario = new DAOUsuario();


try{
   $daoUsuario->incluirUsuario("raul", "raul@gmail.com", "raul", "raul");
}catch(\Exception $e){
   die($e->getMessage());
}

?>