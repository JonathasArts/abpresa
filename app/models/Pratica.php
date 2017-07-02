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
	public static function save(){
        $DB = new DB;
        $sql = "INSERT INTO praticas(titulo_pratica, categorias_id) VALUES(:titulo_pratica, :categoria)";
        $stmt = $DB->prepare($sql);

        $stmt->bindParam(':titulo_pratica', $this->titulo_pratica);
        $stmt->bindParam(':categoria', $this->categoria);
 
        if ($stmt->execute()){
            return true;
        }
        else{
            echo "Erro ao persistir pratica".$this->titulo_pratica;
            print_r($stmt->errorInfo());
            return false;
        }
	}

	// Atualizar pratica no Banco
	public static function update(){

	}

	// Excluir Pratica do Banco
	public static function delete(){

	}

	// Buscar uma ou todas as praticas no banco
	public static function selectAll($id = null){
		$where = ''; 

        if (!empty($id)){ 
            $where = 'WHERE id = :id';
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

    // Buscar palavra-chave no titulo das praticas no banco
    public static function find($keyword, $categoria, $tags){
        $where = "";

        if(!empty($keyword)){
            $where = "WHERE UPPER(p.titulo_pratica) LIKE UPPER('%".$keyword."%')";
        }
        
        $sql = sprintf("SELECT * FROM praticas p %s ORDER BY titulo_pratica ASC", $where); 

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