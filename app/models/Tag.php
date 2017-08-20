<?php
namespace App\Models; 
use App\DB; 

class Tag {
	
	var $id;
	var $descricao_tag;
	
	// Construtor
	function Tag(){}

	// Persistir tag
	public static function save($descricao_tag){
        $DB = new DB;
        $sql = "INSERT INTO tags(descricao_tag) VALUES(upper(:descricao_tag))";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':descricao_tag', $descricao_tag);
 
        if ($stmt->execute()){
            $_SESSION['ultimo_id'] = $DB->lastInsertId();
            return true;
        }
        else{
            echo "Erro ao persistir tag".$descricao_tag;
            print_r($stmt->errorInfo());
            return false;
        }
	}

	// Atualizar tag no Banco
	public static function update(){

	}

	// Excluir tag do Banco
	public static function remove($id){
        $DB = new DB;
        $sql = "DELETE FROM tags WHERE id = :id";
        $stmt = $DB->prepare($sql);
        
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        if ($stmt->execute()){
            return true;
        } else{
            echo "Erro ao remover tags ".$id;
            print_r($stmt->errorInfo());
            return false;
        }
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

    // Buscar uma ou todas as tags no banco
	public static function selectByDesc($desc = null){
        
        $sql = sprintf("SELECT * FROM tags WHERE descricao_tag = upper(:desc)"); 

        $DB = new DB; 
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':desc', $desc);
        $stmt->execute();

        $tags = $stmt->fetchAll(\PDO::FETCH_OBJ);
 		
 		// if (empty($tags)){
        //     return null;
        // }else {
            return $tags[0];
        // }

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
        
        // Retorna um array de objetos tags pratica
        return $tags;
    }

    // Associa tag a pratica
    public static function assocTagPratica($id, $pratica_id){

        $DB = new DB;
        $sql = "INSERT INTO praticas_tags(praticas_id, tags_id) VALUES(:pratica_id, :id)";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':pratica_id', $pratica_id);
        $stmt->bindParam(':id', $id);
 
        if ($stmt->execute()){
            return true;
        }
        else{
            echo "Erro ao persistir tag";
            print_r($stmt->errorInfo());
            return false;
        }
    }

    // Desassocia tag a pratica
    public static function desassocTagPratica($id, $pratica_id){

        $DB = new DB;
        $sql = "DELETE FROM praticas_tags WHERE praticas_id = :pratica_id AND tags_id = :id";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':pratica_id', $pratica_id);
        $stmt->bindParam(':id', $id);
 
        if ($stmt->execute()){
            return true;
        }
        else{
            echo "Erro ao persistir tag";
            print_r($stmt->errorInfo());
            return false;
        }
    }

    // verifica as tags que não estão ligadas a nenhuma pratica no banco
    public static function verificaTags(){
        
        $sql = sprintf("SELECT t.* FROM tags t WHERE NOT EXISTS
                        (SELECT tags_id FROM praticas_tags tp WHERE t.id = tp.tags_id);"); 

        $DB = new DB; 
        $stmt = $DB->prepare($sql);
 
        $stmt->execute();
        $tagsSoltas = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        foreach ($tagsSoltas as $t) {
            if(!Tag::remove($t->id)){
                return false;
            }
        }

        return true;
    }

}

?>