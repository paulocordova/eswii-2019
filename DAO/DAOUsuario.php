<?php
namespace DAO;
mysqli_report(MYSQLI_REPORT_STRICT);
require_once('../models/Usuario.php');
<<<<<<< HEAD
use MODELS\Usuario;
/**
 * Esta classe é responsável por fazer a comunicação com o banco de dados,
 * provendo as funções de logar e incluir um novo usuário
 * @author Paulo Roberto Córdova
 * @package DAO
 */
class DAOUsuario{
   /**
    * Faz o login do usuário no sistema e retorna um objeto usuário
    * @param string $login Login do usuário
    * @param string $senha Senha do Usuário
   * @return Usuario Se logado com sucesso os atributos serão retornado com
   * os dados do usuário, senão retornarão com valor nulo, exceto o atributo
   * $logado, que retornará FALSE
   */
   public function logar($login, $senha){
      try{
         $conexaoDB = $this->conectarBanco();
      }catch(\Exception $e){
        die($e->getMessage());
      }

=======
use models\Usuario;

/**
 * Esta classe é reponsável por fazer a comunicação com o banco de dados,
 * provendo as funções de logar e incluir um novo usuário
 *
 * @author Paulo Roberto Córdova
 *
 */
class DAOUsuario{
   /**
    * Faz o login no sisema validando os dados fornecidos pelo usuário
    * @param string $login Login do usuário
    * @param string $senha Senha do usuário
    * @return Usuario
    */
   public function logar($login, $senha){
       try {
         $conexaoDB = $this->conectarBanco();
      } catch (\Exception $e) {
         die($e->getMessage());
      }
>>>>>>> ccb0de403b748499b03f19c4d813673c94994b95

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
   /**
<<<<<<< HEAD
    * Inclui um novo usuário no sistema
    * @param string $nome Nome do usuário
    * @param string $email Email do usuário
    * @param string $login Login do usuário
    * @param string $senha Senha do usuário
    * @return TRUE|Exception TRUE para inclusão bem sucedida ou Exception para inclusão mal sucedida
    */
   public function incluirUsuario($nome, $email, $login, $senha){
      try{
         $conexaoDB = $this->conectarBanco();
      }catch(\Exception $e){
=======
    * Inclui um novo usuário no banco de dados
    * @param string $nome Nome do usuário
    * @param string $email Email do usuário
    * @param string $login Login do usuário
    * @param string $senha senha do usuário
    * @return TRUE|Exception TRUE para inclusão bem sucedida ou Exception para inclusão mal sucedida
    */
   public function incluirUsuario($nome, $email, $login, $senha){
       try {
         $conexaoDB = $this->conectarBanco();
      } catch (\Exception $e) {
>>>>>>> ccb0de403b748499b03f19c4d813673c94994b95
         die($e->getMessage());
      }

      $sqlInsert = $conexaoDB->prepare("insert into usuario
                                       (nome, email, login, senha)
                                       values
                                       (?, ?, ?, ?)");
      $sqlInsert->bind_param("ssss", $nome, $email, $login, $senha);
      $sqlInsert->execute();

      if(!$sqlInsert->error){
         $retorno =  TRUE;
      }else{
         throw new \Exception("Não foi possível incluir novo usuário!");
         die;
      }
      $conexaoDB->close();
      $sqlInsert->close();
      return $retorno;
   }
   /**
    * Realiza a conexão com o banco de dados usando msqli
    * @return \mysqli|Exception
    */
   private function conectarBanco(){
<<<<<<< HEAD
      if(!defined('DS')){
         define('DS', DIRECTORY_SEPARATOR);
      }
      if(!defined('BASE_DIR')){
         define('BASE_DIR', dirname(__FILE__).DS);
      }
      require(BASE_DIR.'config.php');
      try{
         $conn = new \mysqli($dbhost, $user, $password, $banco);
         return $conn;
      }catch(mysqli_sql_exception $e){
=======
      if (!defined('DS')) {
         define( 'DS', DIRECTORY_SEPARATOR );
      }
      if (!defined('BASE_DIR')) {
         define( 'BASE_DIR', dirname( __FILE__ ) . DS );
      }
      require(BASE_DIR . 'config.php');

      try {
         $conn = new \MySQLi($dbhost, $user, $password, $banco);
         return $conn;
      }catch (mysqli_sql_exception $e) {
>>>>>>> ccb0de403b748499b03f19c4d813673c94994b95
         throw new \Exception($e);
         die;
      }
   }
}
?>