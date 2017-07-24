<?php 
namespace App\Controllers; 
use \App\Models\Usuario; 
use \App\Models\Session; 

class SessionController { 

 
    // Exibe a tela de login
    public function login($msg=null){
        $page = "login";
        \App\View::make('login', [ 'page' => $page, 'msg' => $msg,]);
    }
 
 
    // Processa o formulário de login
    public function store() {
        // pega os dados do formuário
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        if (Session::login($username, $password)) {
            $_SESSION['msg'] = "Bem Vindo ".$username."!";
            header('Location: /abpresa/dashboard/');
            exit;
        } else {
        	$errormsg = "Usuario ou Senha incorretos";
	        \App\View::make('login', [ 'errormsg' => $errormsg,]);
        }
    }

    // Encerra a Sessão
    public function logout(){
    	// encerra a sessão
    	if(Session::logout()){
            header('Location: /abpresa/');
            exit;
    	}
    }

    //
}