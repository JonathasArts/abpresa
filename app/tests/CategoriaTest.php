<?php
namespace App\Tests;
use App\Models\Categoria;
 
class CategoriaTest extends \PHPUnit_Framework_TestCase {
    
    // teste de tipo dos atributos
    public function testType() {
        $categoria = new \App\Models\Categoria;
        // $this->assertInternalType('string', $categoria->getTitulo_categoria());
        $this->assertEquals(false, $categoria::save("teste do teste"));
    }

}

?>