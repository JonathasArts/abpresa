<?php
namespace App\Models; 
use App\DB; 

class Tag {
	
	var $id;
	var $descricao_tag;
	
	// Construtor
	function Tag(){}

	// Persistir tag
	public static function save(){
        $DB = new DB;
        $sql = "INSERT INTO tags(descricao_tag) VALUES(:descricao_tag)";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':descricao_tag', $this->descricao_tag);
 
        if ($stmt->execute()){
            return true;
        }
        else{
            echo "Erro ao persistir tag".$this->descricao_tag;
            print_r($stmt->errorInfo());
            return false;
        }
	}

	// Atualizar tag no Banco
	public static function update(){

	}

	// Excluir tag do Banco
	public static function delete(){

	}

	// Buscar uma ou todas as tags no banco
	public static function selectAll($id = null){
		$where = ''; 

        if (!empty($id)){ 
            $where = 'WHERE id = :id';
        } 
        
        $sql = sprintf("SELECT * FROM tags %s ORDER BY descricao_tag ASC", $where); 

        $DB = new DB; 
        $stmt = $DB->prepare($sql);
 
        if (!empty($where)){
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }
 
        $stmt->execute();

        $tags = $stmt->fetchAll(\PDO::FETCH_OBJ);
 		
 		if (!empty($id)) {               // Retorna um objeto tag
            return $tags[0];
        }else{                          // Retorna um array de objetos tag
        	return $tags;
        }
	}

    // Buscar todas as tags de uma pratica no banco
    public static function selectTagsByPratica($id_pratica){
        
        $sql = sprintf("SELECT t.* FROM tags t
                        INNER JOIN praticas_tags pt ON pt.tags_id = t.id
                        INNER JOIN praticas p ON p.id = pt.praticas_id
                        WHERE p.id = %s", $id_pratica); 

        $DB = new DB; 
        $stmt = $DB->prepare($sql);
 
        $stmt->execute();

        $tags = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        // Retorna um array de objetos pratica
        return $tags;
    }

}

?>