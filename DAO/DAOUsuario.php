<?php
namespace DAO;

require_once('../models/Usuario.php');
use MODELS\Usuario;

class DAOUsuario{

   public function logar($login, $senha){
      $conexaoDB = $this->conectarBanco();

      $usuario = new Usuario();
      $sql = $conexaoDB->prepare("select login, nome, email, celular from usuario
                                  where
                                  login = ?
                                  and
                                  senha = ?");
      $sql->bind_param("ss", $login, $senha);
      $sql->execute();

      $resultado = $sql->get_result();
      if($resultado->num_rows === 0){
         $usuario->addUsuario(null, null, null, null, FALSE);
      }else{
         While($linha = $resultado->fetch_assoc()){
            $usuario->addUsuario($linha['login'], $linha['nome'], $linha['email'], $linha['celular'], TRUE);
         }
      }
      $sql->close();
      $conexaoDB->close();
      return $usuario;
   }
   public function incluirUsuario($nome, $email, $login, $senha){
      $conexaoDB = $this->conectarBanco();

      $sqlInsert = $conexaoDB->prepare("insert into usuario
                                       (nome, email, login, senha)
                                       values
                                       (?, ?, ?, ?)");
      $sqlInsert->bind_param("ssss", $nome, $email, $login, $senha);
      $sqlInsert->execute();
      if(!$sqlInsert->error){
         $retorno =  TRUE;
      }else{
         $retorno =  FALSE;
      }
      $conexaoDB->close();
      $sqlInsert->close();
      return $retorno;
   }

   private function conectarBanco(){
      $conn = new \mysqli('localhost', 'root', '', 'bd_prospects');
      return $conn;
   }
}
?>