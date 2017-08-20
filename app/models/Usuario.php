<?php 
namespace App\Models; 
use App\DB; 

class Usuario{ 

    public $nome;
    public $username;
    public $password;

    // Buscar um ou todos os usuarios no banco 
    public static function selectAll($id = null) { 
        $where = ''; 

        if (!empty($id)){ 
            $where = 'WHERE id = :id'; 
        } 
        
        $sql = sprintf("SELECT * FROM usuarios %s ORDER BY nome ASC", $where); 

        $DB = new DB; 

        $stmt = $DB->prepare($sql);
 
        if (!empty($where)){
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }
 
        $stmt->execute();
 
        $usuarios = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        if(!empty($id)){
            return $usuarios[0];
        }else{
            return $usuarios;
        }
    }


    // Buscar um usuario por username no banco 
    public static function selectByUsername($username){

        $sql = sprintf("SELECT * FROM usuarios WHERE username = :username");

        $DB = new DB; 

        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':username', $username);

        $stmt->execute();

        $usuarios = $stmt->FetchAll(\PDO::FETCH_OBJ);

        return $usuarios[0];
    }


    // Buscar um usuario por username no banco 
    public static function selectByEmail($email){

        $sql = sprintf("SELECT * FROM usuarios WHERE email = :email");

        $DB = new DB; 

        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $usuarios = $stmt->FetchAll(\PDO::FETCH_OBJ);

        return $usuarios[0];
    }
 

    // Salva no banco de dados um novo usuário
    public static function save($nome, $username, $email, $password, $tipo_usuario){

        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO usuarios(nome, username, email, password, tipo_usuario) VALUES(:nome, :username, :email, :password, :tipo_usuario)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
 
        if ($stmt->execute()){
            return true;
        }else{
            echo "Erro ao cadastrar usuario";
            print_r($stmt->errorInfo());
            return false;
        }
    }
  
 
    // Altera no banco de dados um usuário
    public static function update($id, $nome, $email, $username, $tipo_usuario){
          
        // insere no banco
        $DB = new DB;
        $sql = "UPDATE usuarios SET nome = :nome, username = :username, email = :email, tipo_usuario = :tipo_usuario WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
 
        if ($stmt->execute()){
            return true;
        }else{
            echo "Erro ao Atualizar usuario: ".$id." - ".$nome;
            print_r($stmt->errorInfo());
            return false;
        }
    }


    // Altera no banco a senha de um usuário
    public static function updateSenha($id, $password){
          
        // insere no banco
        $DB = new DB;
        $sql = "UPDATE usuarios SET password = :password WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
 
        if ($stmt->execute()){
            return true;
        }else{
            echo "Erro ao Atualizar senha do usuario: ".$id;
            print_r($stmt->errorInfo());
            return false;
        }
    }
 

    // Remove do banco de dados um usuário
    public static function remove($id){
          
        // remove do banco
        $DB = new DB;
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
          
        if ($stmt->execute()){
            return true;
        }else{
            echo "Erro ao remover";
            print_r($stmt->errorInfo());
            return false;
        }
    }

}