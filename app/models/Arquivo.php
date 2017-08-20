<?php
namespace App\Models;
use App\DB; 

class Arquivo {
	
	var $id;
    var $titulo_arquivo;
	var $descricao_arquivo;
    var $path_arquivo;
	
	// Construtor
	function Arquivo(){}

	// Persistir tag
	public static function save($titulo_arquivo, $descricao_arquivo, $path_arquivo, $tipo){
        $DB = new DB;
        $sql = "INSERT INTO arquivos(titulo_arquivo, descricao_arquivo, path_arquivo, tipo) VALUES(:titulo_arquivo, :descricao_arquivo, :path_arquivo, upper(:tipo))";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':titulo_arquivo', $titulo_arquivo);
        $stmt->bindParam(':descricao_arquivo', $descricao_arquivo);
        $stmt->bindParam(':path_arquivo', $path_arquivo);
        $stmt->bindParam(':tipo', $tipo);
 
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
        $arq = Arquivo::selectAll($id);

        $DB = new DB;
        $sql = "DELETE FROM arquivos WHERE id = :id";
        $stmt = $DB->prepare($sql);
        
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        
        if ($stmt->execute()){
            if (unlink($arq->path_arquivo)) {
                return true;
            } else {
                echo ("Erro ao deletar ".$arq);
            }            
        } else{
            echo "Erro ao remover arquivos ".$id;
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
        
        $sql = sprintf("SELECT * FROM arquivos %s ORDER BY titulo_arquivo ASC", $where); 

        $DB = new DB; 
        $stmt = $DB->prepare($sql);
 
        if (!empty($where)){
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }
 
        $stmt->execute();
        $arquivos = $stmt->fetchAll(\PDO::FETCH_OBJ);
 		
 		if (!empty($id)) {               // Retorna um objeto arquivos
            return $arquivos[0];
        }else{                          // Retorna um array de objetos arquivos
        	return $arquivos;
        }
	}

    // Buscar todas as tags de uma pratica no banco
    public static function selectArqsByPratica($id_pratica){
        
        $sql = sprintf("SELECT a.* FROM arquivos a
                        INNER JOIN praticas_arquivos pa ON pa.arquivos_id = a.id
                        INNER JOIN praticas p ON p.id = pa.praticas_id
                        WHERE p.id = %s", $id_pratica); 

        $DB = new DB; 
        $stmt = $DB->prepare($sql);
 
        $stmt->execute();

        $arquivos = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        // Retorna um array de objetos arquivos
        return $arquivos;
    }

    // Associa tag a pratica
    public static function assocArqPratica($id, $pratica_id){

        $DB = new DB;
        $sql = "INSERT INTO praticas_arquivos(praticas_id, arquivos_id) VALUES(:pratica_id, :id)";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':pratica_id', $pratica_id);
        $stmt->bindParam(':id', $id);
 
        if ($stmt->execute()){
            return true;
        }
        else{
            echo "Erro ao persistir arquivo";
            print_r($stmt->errorInfo());
            return false;
        }
    }

    // Desassocia tag a pratica
    public static function desassocArqPratica($id, $pratica_id){

        $DB = new DB;
        $sql = "DELETE FROM praticas_arquivos WHERE praticas_id = :pratica_id AND arquivos_id = :id";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':pratica_id', $pratica_id);
        $stmt->bindParam(':id', $id);
 
        if ($stmt->execute()){
            return true;
        }
        else{
            echo "Erro ao desassociar arquivos";
            print_r($stmt->errorInfo());
            return false;
        }
    }

    // verifica as tags que não estão ligadas a nenhuma pratica no banco
    public static function verificaTags(){
        
        // $sql = sprintf("SELECT t.* FROM tags t WHERE NOT EXISTS
        //                 (SELECT tags_id FROM praticas_tags tp WHERE t.id = tp.tags_id);"); 

        // $DB = new DB; 
        // $stmt = $DB->prepare($sql);
 
        // $stmt->execute();
        // $tagsSoltas = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        // foreach ($tagsSoltas as $t) {
        //     if(!Tag::remove($t->id)){
        //         return false;
        //     }
        // }

        // return true;
    }

}

?>