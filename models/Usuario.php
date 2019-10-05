<?php
namespace MODELS;

class Usuario{
   public $login;
   public $nome;
   public $email;
   public $celular;
   public $logado;

   public function addUsuario($login, $nome, $email, $celular, $logado){
      $this->login = $login;
      $this->nome = $nome;
      $this->email = $email;
      $this->celular = $celular;
      $this->logado = $logado;
   }
}
?>