<?php
namespace App\Models; 
use App\DB; 

class Pratica {
	
	var $id;
	var $titulo_pratica;
	var $categoria;
	
	// Construtor
	function Pratica(){}

	// Persistir pratica
	public static function save($titulo_pratica, $categoria, $descricao_pratica){
        $DB = new DB;
        $sql = "INSERT INTO praticas(titulo_pratica, categorias_id, descricao_pratica) VALUES(:titulo_pratica, :categoria, :descricao_pratica)";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':titulo_pratica', $titulo_pratica);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':descricao_pratica', $descricao_pratica);
 
        if ($stmt->execute()){
            $_SESSION['ultimo_id'] = $DB->lastInsertId();
            return true;
        }
        else{
            echo "Erro ao persistir pratica".$titulo_pratica;
            print_r($stmt->errorInfo());
            return false;
        }
	}

	// Atualizar pratica no Banco
	public static function update($id, $titulo_pratica, $categoria, $descricao_pratica){
        $DB = new DB;
        $sql = "UPDATE praticas SET titulo_pratica = :titulo_pratica, categorias_id = :categorias_id, descricao_pratica = :descricao_pratica WHERE id = :id";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':titulo_pratica', $titulo_pratica);
        $stmt->bindParam(':categorias_id', $categoria);
        $stmt->bindParam(':descricao_pratica', $descricao_pratica);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
 
        if ($stmt->execute()){
            $_SESSION['ultimo_id'] = $DB->lastInsertId();
            return true;
        }
        else{
            echo "Erro ao persistir pratica".$titulo_pratica;
            print_r($stmt->errorInfo());
            return false;
        }
	}

	// Excluir Pratica do Banco
	public static function remove($id){
        $DB = new DB;
        $sql = "DELETE FROM praticas WHERE id = :id";
        $stmt = $DB->prepare($sql);
        
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        if ($stmt->execute()){
            return true;
        } else{
            echo "Erro ao remover Boa Prática ".$id;
            print_r($stmt->errorInfo());
            return false;
        }
	}

	// Buscar uma ou todas as praticas no banco
	public static function selectAll($id = null){
		$where = "";

        if (!empty($id)){ 
            $where = "WHERE id = :id";
        } 
        
        $sql = sprintf("SELECT * FROM praticas %s ORDER BY titulo_pratica ASC", $where); 

        $DB = new DB; 
        $stmt = $DB->prepare($sql);
 
        if (!empty($where)){
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }
 
        $stmt->execute();

        $praticas = $stmt->fetchAll(\PDO::FETCH_OBJ);
 		
 		if (!empty($id)) {               // Retorna um objeto pratica
            return $praticas[0];
        }else{                          // Retorna um array de objetos pratica
        	return $praticas;
        }
	}

    // Buscar uma praticas pelo título
	public static function selectByTitulo($titulo = null){
        
        $sql = sprintf("SELECT * FROM praticas WHERE UPPER(titulo_pratica) = UPPER(:titulo)"); 

        $DB = new DB; 
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
 
        $stmt->execute();
        $praticas = $stmt->fetchAll(\PDO::FETCH_OBJ);
 		
        return $praticas[0];
	}

    // Buscar palavra-chave no titulo das praticas no banco
    public static function find($keyword=null, $categoria, $tags){
        $where = "";

        if(!empty($keyword)){
            $where = "WHERE UPPER(p.titulo_pratica) LIKE UPPER('%".$keyword."%')";
        }

        if(!empty($categoria)){
            if(empty($where)){
                $where .= "WHERE UPPER(c.titulo_categoria) LIKE UPPER('".$categoria->titulo_categoria."')";
            } else {
                $where .= " AND UPPER(c.titulo_categoria) LIKE UPPER('".$categoria->titulo_categoria."')";
            }
        }

        if(!empty($tags)){
            $w = "";
            if(empty($where)){
                $w .= "WHERE ";
                foreach ($tags as $t) {
                    $w .= "UPPER(t.descricao_tag) LIKE UPPER('".$t."') AND ";
                }
                $where .= substr($w, 0, strlen($w)-4);
            } else {
                 $w .= " AND (";
                foreach ($tags as $t) {
                    $w .= "UPPER(t.descricao_tag) LIKE UPPER('".$t."') OR ";
                }
                $where .= substr($w, 0, strlen($w)-4);
                $where .= ")";
            }
        }
        
        $sql = sprintf("SELECT DISTINCT p.* FROM praticas p 
                    INNER JOIN categorias c ON c.id = p.categorias_id
                    INNER JOIN praticas_tags pt ON pt.praticas_id = p.id
                    INNER JOIN tags t ON t.id = pt.tags_id %s
                    ORDER BY titulo_pratica ASC", $where);

        $DB = new DB; 
        $stmt = $DB->prepare($sql);
 
        $stmt->execute();
        $praticas = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        // Retorna um array de objetos pratica
        return $praticas;
    }

    // Buscar arquivos de uma pratica no banco
    public static function selectArquivosByPratica($id_pratica){
        
        $sql = sprintf("SELECT a.* FROM arquivos a
                        INNER JOIN praticas_arquivos pa ON pa.arquivos_id = a.id
                        INNER JOIN praticas p ON p.id = pa.praticas_id
                        WHERE p.id = %s", $id_pratica); 

        $DB = new DB; 
        $stmt = $DB->prepare($sql);
 
        $stmt->execute();

        $praticas = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        // Retorna um array de objetos pratica
        return $praticas;
    }

}

?>