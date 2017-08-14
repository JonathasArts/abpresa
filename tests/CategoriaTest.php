<?php
include('Categoria.php');
use App\DB; 
 
class CategoriaTest extends \PHPUnit_Framework_TestCase {
    
    // teste de tipo dos atributos
    public function testType() {
        $categoria = new App\Models\Categoria("teste");
        // $this->assertInternalType('string', $categoria->getTitulo_categoria());
        $this->assertEquals(true, $categoria::save("teste do teste"));
    }

}

?>