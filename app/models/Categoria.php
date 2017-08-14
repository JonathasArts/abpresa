<?php
namespace App\Models; 
use App\DB; 

class Categoria {
	
	public $id;
	public $titulo_categoria;
	
	// Construtor
    public static function Categoria($titulo=""){
        $this->titulo_categoria = $titulo;
    }

	// Persistir categoria
	public static function save($titulo_categoria){
        
        $DB = new DB;
        $sql = "INSERT INTO categorias(titulo_categoria) VALUES(:titulo_categoria)";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':titulo_categoria', $titulo_categoria);
 
        if ($stmt->execute()){
            return true;
        }
        else{
            echo "Erro ao persistir categoria".$titulo_categoria;
            print_r($stmt->errorInfo());
            return false;
        }
	}

	// Atualizar categoria no Banco
	public static function update($id, $titulo_categoria){

        $DB = new DB;
        $sql = "UPDATE categorias SET titulo_categoria = :titulo_categoria WHERE id = :id";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':titulo_categoria', $titulo_categoria);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
 
        if ($stmt->execute()){
            return true;
        }else{
            echo "Erro ao Atualizar Categoria: ".$id." - ".$titulo_categoria;
            print_r($stmt->errorInfo());
            return false;
        }
	}

	// Excluir categoria do Banco
	public static function remove($id){

        $DB = new DB;
        $sql = "DELETE FROM categorias WHERE id = :id";
        $stmt = $DB->prepare($sql);
        
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
          
        if ($stmt->execute()){
            return true;
        } else{
            echo "Erro ao remover categoria ".$id;
            print_r($stmt->errorInfo());
            return false;
        }
	}

	// Buscar uma ou todas as categorias no banco
	public static function selectAll($id = null){
		$where = ''; 

        if (!empty($id)){ 
            $where = 'WHERE id = :id';
        } 
        
        $sql = sprintf("SELECT * FROM categorias %s ORDER BY titulo_categoria ASC", $where); 

        $DB = new DB; 
        $stmt = $DB->prepare($sql);
 
        if (!empty($where)){
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }
 
        $stmt->execute();

        $categorias = $stmt->fetchAll(\PDO::FETCH_OBJ);
 		
 		if (!empty($id)) {               // Retorna um objeto categoria
            return $categorias[0];
        }else{                          // Retorna um array de objetos categoria
        	return $categorias;
        }
	}

    // Buscar uma ou todas as categorias no banco
	public static function selectByTitulo($titulo = null){
		
        $sql = sprintf("SELECT * FROM categorias WHERE UPPER(titulo_categoria) = UPPER(:titulo)"); 

        $DB = new DB; 
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':titulo', $titulo);
        $stmt->execute();

        $categorias = $stmt->fetchAll(\PDO::FETCH_OBJ);
 		
        return $categorias[0];
	}

    // Buscar categori de uma pratica no banco
    public static function selectByPratica($id_pratica){
        
        $sql = sprintf("SELECT c.* FROM praticas p 
                            INNER JOIN categorias c ON c.id = p.categorias_id
                            WHERE p.id = %s", $id_pratica); 

        $DB = new DB; 
        $stmt = $DB->prepare($sql);
 
        $stmt->execute();

        $categorias = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        // Retorna um array de objetos categoria
        return $categorias;
    }

}

?>