<?php 
namespace App\Controllers; 
use \App\Models\Pratica;
use \App\Models\Categoria;
use \App\Models\Tag;
use \App\Models\Usuario;

class UsuarioController { 

    // Exibe a lista de categorias
    public function usuarios($msg = null) {
        $page = "dashboard";
        // subpage aqui
        $allUsuarios = Usuario::selectAll();

        $limit = 7; // Quantidade de registros por página
        $numpage = isset($_GET['page']) ? $_GET['page'] : 1;
        $qtdepages = ceil(count($allUsuarios)/$limit);
        $usuarios = pagination($allUsuarios, $limit, $numpage);

        \App\View::make('usuarios', [ 
        	'page' => $page, 
        	'usuarios' => $usuarios, 
            'numpage'   => $numpage, 
            'qtdepages' => $qtdepages,
            'qtdereg'   => count($allUsuarios),
            'msg' => $msg,
        ]);
    }

    // Exibe o formulário para cadastro de categoria
    public function cadastro() {
        $page = "cadastro";
        // subpage aqui
        \App\View::make('cadastro', ['page' => $page,]);
    }

    // Exibe o formulário para cadastro de categoria
    public function create() {
        $page = "cadastro";
        // subpage aqui
        \App\View::make('usuarios.create', ['page' => $page,]);
    }

    // Processa o formulário de cadastro de usuario
    public function store() {
        // pega os dados do formuário
        $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null;
        $tipo_usuario = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : null;

        if ($confirmPassword != $password){
            $_SESSION['msgE'] = "Senha e Confirmação de senha não conferem!";
            $var = "<script>javascript:history.back(-1)</script>";
            echo $var;
        } else {
            $uTeste = Usuario::selectByUsername($username);
            if (!empty($uTeste)) {
                $_SESSION['msgE'] = "Username ".$username." indisponível!";
                $var = "<script>javascript:history.back(-1)</script>";
                echo $var;
            } else {
                if (Usuario::save($nome, $username, $email, $password, $tipo_usuario)) {
                    if (!empty($_SESSION['username'])){
                        $_SESSION['msg'] = "Usuário ".$nome." cadastrado!";
                        header('Location: /abpresa/usuarios/');
                        exit;
                    } else {
                        $_SESSION['msg'] = "Conta cadastrada com sucesso!";
                        header('Location: /abpresa/admin/');
                        exit;
                    }
                }
            }
        }
    }

    // Exibe o formulário para edição de usuario
    public function edit($id) {
        $page = "dashboard";
        // subpage aqui
        $usuario = Usuario::selectAll($id);
        \App\View::make('usuarios.edit', ['page' => $page, 'usuario' => $usuario,]);
    }

    // Processa o formulário de edição de usuario
    public function update() {
        // pega os dados do formuário
        $id = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : null;
        $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $tipo_usuario = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : null;
       
        $uTeste = Usuario::selectByUsername($username);
        if (!empty($uTeste) && $uTeste->id != $id){
            $_SESSION['msgE'] = "Username ".$username." indisponível!";
            $var = "<script>javascript:history.back(-1)</script>";
            echo $var;
        } else {
            if (Usuario::update($id, $nome, $username, $email, $tipo_usuario)) {
                $_SESSION['msg'] = "Usuário ".$nome." atualizado!";
                header('Location: /abpresa/usuarios/');
                exit;                    
            } else {
                $_SESSION['msgE'] = "Erro ao atualizar usuário!";
                $var = "<script>javascript:history.back(-1)</script>";
                echo $var;
            }
        }
    }

    // Exibe o formulário para mudança de senha
    public function mudarSenha($id) {
        $page = "dashboard";
        // subpage aqui
        $usuario = Usuario::selectAll($id);
        \App\View::make('usuarios.senha', ['page' => $page, 'usuario' => $usuario,]);
    }

    // Processa o formulário de mudança de senha
    public function updateSenha() {
        // pega os dados do formuário
        $id = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : null;
        $atual = isset($_POST['atual']) ? $_POST['atual'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null;
        
        if (Usuario::selectAll($id)->password == $atual) {
            if ($confirmPassword != $password){
                $_SESSION['msgE'] = "Senha e Confirmação de senha não conferem!";
                $var = "<script>javascript:history.back(-1)</script>";
                echo $var;
            } else {
                if (Usuario::updateSenha($id, $password)) {
                    $_SESSION['msg'] = "Senha atualizada!";
                    header('Location: /abpresa/usuarios/');
                    exit;                    
                } else {
                    $_SESSION['msgE'] = "Erro ao mudar senha!";
                    $var = "<script>javascript:history.back(-1)</script>";
                    echo $var;
                }
            }
        } else {
            $_SESSION['msgE'] = "Senha atual incorreta!";
            $var = "<script>javascript:history.back(-1)</script>";
            echo $var;
        }
    }

    // Remove um usuario
    public function remove($id) {
        $u = Usuario::selectAll($id);
        if (Usuario::remove($id)) {
            $_SESSION['msg'] = isset($u) ? "Usuario ".$u->nome." Removido!" : "";
            header('Location: /abpresa/usuarios/');
            exit;
        } else {
            $_SESSION['msgE'] = "Erro ao remover usuário!";
            $var = "<script>javascript:history.back(-1)</script>";
            echo $var;
        }
    }

}