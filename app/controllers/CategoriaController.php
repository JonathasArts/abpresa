<?php 
namespace App\Controllers; 
use \App\Models\Pratica;
use \App\Models\Categoria;
use \App\Models\Tag;

class CategoriaController { 

    // Exibe a lista de categorias
    public function categorias($msg = null) {
        $page = "dashboard";
        // subpage aqui
        $allCategorias = Categoria::selectAll();

        $limit = 7; // Quantidade de registros por página
        $numpage = isset($_GET['page']) ? $_GET['page'] : 1;
        $qtdepages = ceil(count($allCategorias)/$limit);
        $categorias = pagination($allCategorias, $limit, $numpage);

        \App\View::make('categorias', [ 
        	'page' => $page, 
        	'categorias' => $categorias, 
            'numpage'   => $numpage, 
            'qtdepages' => $qtdepages,
            'qtdereg'   => count($allCategorias),
            'msg' => $msg,
        ]);
    }

    // Exibe o formulário para cadastro de categoria
    public function create() {
        $page = "dashboard";
        // subpage aqui
        $errormsg = "";
        \App\View::make('categorias.create', ['page' => $page, 'errormsg' => $errormsg,]);
    }

    // Processa o formulário de cadastro de categoria
    public function store() {
        // pega os dados do formuário
        $titulo_categoria = isset($_POST['titulo_categoria']) ? $_POST['titulo_categoria'] : null;

        $cTeste = Categoria::selectByTitulo($titulo_categoria);
        if (!empty($cTeste)){
            $_SESSION['msgE'] = "Categoria ".$titulo_categoria." já existente!";
            $var = "<script>javascript:history.back(-1)</script>";
            echo $var;
        } else {
            if (Categoria::save($titulo_categoria)) {
                $_SESSION['msg'] = "Categoria ".$titulo_categoria." criada!";
                header('Location: /abpresa/categorias/');
                exit;
            }
        }
    }

    // Exibe o formulário para edição de categoria
    public function edit($id) {
        $page = "dashboard";
        // subpage aqui
        $errormsg = "";
        $categoria = Categoria::selectAll($id);
        \App\View::make('categorias.edit', ['page' => $page, 'errormsg' => $errormsg, 'categoria' => $categoria,]);
    }

    // Processa o formulário de edicao de categoria
    public function update() {
        // pega os dados do formuário
        $titulo_categoria = isset($_POST['titulo_categoria']) ? $_POST['titulo_categoria'] : null;
        $id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : null;

        $cTeste = Categoria::selectByTitulo($titulo_categoria);
        if (!empty($cTeste) && $cTeste->id != $id_categoria){
            $_SESSION['msgE'] = "Categoria ".$cTeste->titulo_categoria." já existente!";
            $var = "<script>javascript:history.back(-1)</script>";
            echo $var;
        } else {
            if (Categoria::update($id_categoria, $titulo_categoria)) {
                $_SESSION['msg'] =  "Categoria ".$titulo_categoria." atualizada!";
                header('Location: /abpresa/categorias/');
                exit;
            }
        }
    }

    // Remove uma categoria
    public function remove($id) {
        $c = Categoria::selectAll($id);
        if (Categoria::remove($id)) {
            $_SESSION['msg'] = isset($c) ? "Categoria ".$c->titulo_categoria." Removida!" : "";
            header('Location: /abpresa/categorias/');
            exit;
        }
    }

}