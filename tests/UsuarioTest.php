<?php
namespace test;
require_once('../vendor/autoload.php');
require_once('../models/Usuario.php');
use PHPUnit\Framework\TestCase;
use models\Usuario;

class UsuarioTest extends TestCase{

   /** @test */
   public function testLogar(){
      $usuario = new Usuario();
      $this->assertEquals(
         TRUE,
         $usuario->logar('paulo', '1213')
      );

      unset($usuario);
   }
}
?>