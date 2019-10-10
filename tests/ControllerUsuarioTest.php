<?php

namespace test;
require_once('../../uteis/vendor/autoload.php');
require_once('../models/Usuario.php');
require_once('../controllers/ControllerUsuario.php');
use PHPUnit\Framework\TestCase;
use models\Usuario;
use controllers\ControllerUsuario;

class UsuarioTest extends TestCase{

   /** @test */
   public function testLogar(){
      $ctrlUsuario = new ControllerUsuario();
      $usuario = new Usuario();

      $usuario->addUsuario("paulo", "paulo", "paulo@eu.com", "", TRUE);
      $this->assertEquals(
         $usuario,
         $ctrlUsuario->fazerLogin('paulo', '123')
      );
   }
   /** @test */
   public function testIncluirUsuario(){
      $ctrlUsuario = new ControllerUsuario();
      $usuario = new Usuario();
      try{
         $this->assertEquals(
            TRUE,
            $ctrlUsuario->salvarUsuario('Marcos Dias', 'dias@noites.com.br', 'dias', '45632')
         );
      }catch(\Exception $e){
         $this->fail($e->getMessage());
      }
   }
}
?>