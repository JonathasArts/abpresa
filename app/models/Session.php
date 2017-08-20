<?php 
namespace App\Models; 
use App\DB; 
use App\Models\Usuario;

class Session { 

    public $usuario;
    public $username;
    public $password;
    
    /********Realiza o Login********/
    public static function login($username, $password) {

        $usuario = @Usuario::selectByUsername($username);

        if (!empty($usuario) && $usuario->password == $password){
            // session_start inicia a sessão
            session_start();
            // iniciar a sessão e adicionar usuario na sessão
            $_SESSION['username'] = $username;
            $_SESSION['nome'] = $usuario->nome;
            $_SESSION['id'] = $usuario->id;
            return true;
        }else{
            return false;
        }
    }

    public static function logout() {
        session_destroy();
        return true;
    }
}