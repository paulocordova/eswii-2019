<?php
namespace MODELS;
/**
 * Classe Model de usuário
 * @author Paulo Roberto Córdova
 * @package MODELS
 */
class Usuario{
   /**
    * Login do usuário
    *@var string
    */
   public $login;
   /**
    * Nome do usuário
    *@var string
    */
   public $nome;
   /**
    * Email do usuário
    *@var string
    */
   public $email;
   /**
    * Celular do usuário
    *@var string
    */
   public $celular;
   /**
    * Status do usuário no sistema
    *@var boolean
    */
   public $logado;
   /**
    *Carrega os atributos da classe
    *@param string $login Login do usuário
    * @param string $nome Nome do usuário
    * @param string $email Email do usuário
    * @param string $celular Celular do usuário
    * @param boolean $logado Status do usuário no sistema
    * @return void
    */
   public function addUsuario($login, $nome, $email, $celular, $logado){
      $this->login = $login;
      $this->nome = $nome;
      $this->email = $email;
      $this->celular = $celular;
      $this->logado = $logado;
   }
}
?>