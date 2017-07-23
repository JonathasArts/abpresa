<?php 
namespace App\Controllers; 
use \App\Models\Pratica;
use \App\Models\Categoria;
use \App\Models\Tag;

class ConteudoController { 

    // Exibe as informações do conteudo/Boa pratica
    public function show($id = null) {
        $page = "dashboard";
        // subpage aqui
        $pratica = Pratica::selectAll($id);
        $categoria_pratica = Categoria::selectAll($pratica->id);
        $tags_pratica = Tag::selectTagsByPratica($pratica->id);

        \App\View::make('conteudo.show', [
            'page' => $page,
            // subpage aqui
            'pratica' => $pratica,
            'categoria_pratica' => $categoria_pratica,
            'tags_pratica' => $tags_pratica,
            ]);
    }

    // Exibe o formulário para cadastro de conteudo/Boa pratica
    public function create($msg = null) {
        $page = "dashboard";
        // subpage aqui
        $categorias = Categoria::selectAll();
        $errormsg = "";
        \App\View::make('conteudo.create', [
            'page' => $page,
            'errormsg' => $errormsg,
            'categorias' => $categorias,
            'msg' => $msg,
            ]);
    }

    // Processa o formulário de cadastro de conteudo/Boa Pratica
    public function store() {
        // pega os dados do formuário
        $titulo_conteudo = isset($_POST['titulo_conteudo']) ? $_POST['titulo_conteudo'] : null;
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
        $tags = isset($_POST['tags']) ? explode(',', $_POST['tags']) : null;
        $descricao_conteudo = isset($_POST['descricao_conteudo']) ? $_POST['descricao_conteudo'] : null;

        $pTeste = Pratica::selectByTitulo($titulo_conteudo);
        if (!empty($pTeste)){
            $_SESSION['msgE'] = "Título da Boa Pratica já existente!";
            $var = "<script>javascript:history.back(-1)</script>";
            echo $var;
        } else {

            if (Pratica::save($titulo_conteudo, $categoria, $descricao_conteudo)) {
                $pratica_id = $_SESSION['ultimo_id']; // retornar ultimo id inserido

                foreach ($tags as $tag) {
                    $t = Tag::selectByDesc($tag);
                    // caso a tag já exista
                    if ($t == null) {
                        // cadastra a tag
                        if (Tag::save($tag)) {
                            $tag_id = $_SESSION['ultimo_id'];

                            // associar tags a pratica
                            if(Tag::assocTagPratica($tag_id, $pratica_id)) {}
                        }                    
                    } else {
                        // associar tags a pratica
                        if(Tag::assocTagPratica($t->id, $pratica_id)) {}
                    }
                }

                // upload de arquivos
                // associar arquivos a pratica

                $_SESSION['msg'] = "Boa Prática ".$titulo_conteudo." cadastrada!";
                header('Location: /abpresa/dashboard/');
                exit;
            }
        }
    }

    // Exibe o formulário para edição de conteudo/Boa Pratica
    public function edit($id) {
        $page = "dashboard";
        // subpage aqui
        $errormsg = "";
        $pratica = Pratica::selectAll($id);
        $categorias = Categoria::selectAll();
        $tags_pratica = Tag::selectTagsByPratica($id);

        \App\View::make('conteudo.edit', [
            'page' => $page, 
            'errormsg' => $errormsg, 
            'pratica' => $pratica,
            'categorias' => $categorias,
            'tags_pratica' => $tags_pratica,
        ]);
    }

    // Processa o formulário de edicao de categoria
    public function update() {
        // pega os dados do formuário
        $id = $_POST['id'];
        $titulo_conteudo = isset($_POST['titulo_conteudo']) ? $_POST['titulo_conteudo'] : null;
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
        $tags = isset($_POST['tags']) ? explode(',', $_POST['tags']) : null;
        $descricao_conteudo = isset($_POST['descricao_conteudo']) ? $_POST['descricao_conteudo'] : null;

        $pTeste = Pratica::selectByTitulo($titulo_conteudo);
        if (!empty($pTeste) && $pTeste->id != $id){
            $_SESSION['msgE'] = "Título da Boa Pratica já existente!";
            $var = "<script>javascript:history.back(-1)</script>";
            echo $var;
        } else {
            if (Pratica::update($id, $titulo_conteudo, $categoria, $descricao_conteudo)) {
                $tags_atual;
                $tags_pratica = Tag::selectTagsByPratica($id);
                foreach ($tags_pratica as $t) {
                    $tags_atual[] = $t->descricao_tag;
                }

                // comparar as tags enviadas com as associadas a pratica
                // verificar forma para edição das tags

                // upload de arquivos
                // associar arquivos a pratica

                $_SESSION['msg'] =  "Boa Prática ".$titulo_categoria." atualizada!";
                header('Location: /abpresa/dashboard/');
                exit;
            }
        }
    }

    // Remove uma categoria
    public function remove($id) {
        $p = Pratica::selectAll($id);
        $tags = Tag::selectTagsByPratica($id);

        foreach ($tags as $tag) {
            if (Tag::desassocTagPratica($tag->id, $id)){
                // tag removida da pratica
                // verifica se a tag está associada a alguma outra pratica
                if (!Tag::verificaTags($tag->id)){
                    if (Tag::remove($tag->id)){
                        // Tag removida
                    }
                }
            }
        }

        if (Pratica::remove($id)) {
            $_SESSION['msg'] = isset($p) ? "Boa pratica ".$p->titulo_pratica." Removida!" : "";
            header('Location: /abpresa/dashboard/');
            exit;
        }
    }

}