<?php 
namespace App\Controllers; 
use \App\Models\Pratica;
use \App\Models\Categoria;
use \App\Models\Tag;

class AppController { 

    // Exibe a página index [home]
    public function index() {
        $page = "home";
        $praticas = Pratica::selectAll();
        $categorias = Categoria::selectAll();
        $tags = Tag::selectAll();

        \App\View::make('index', [ 
        	'page' => $page, 
        	'praticas' => $praticas, 
        	'categorias' => $categorias, 
        	'tags' => $tags,
        ]);
    }


    // Exibe a página index [home]
    public function dashboard($msg = null) {
        $page = "dashboard";
        $allPraticas = Pratica::selectAll();
        $categorias = Categoria::selectAll();
        $tags;

        $limit = 7; // Quantidade de registros por página
        $numpage = isset($_GET['page']) ? $_GET['page'] : 1;
        $qtdepages = ceil(count($allPraticas)/$limit);
        $praticas = pagination($allPraticas, $limit, $numpage);

        foreach ($praticas as $p) {
            $tags[$p->id] = Tag::selectTagsByPratica($p->id);
        }

        \App\View::make('dashboard', [ 
            'page' => $page, 
            'praticas' => $praticas, 
            'categorias' => $categorias, 
            'tags' => $tags,
            'numpage'   => $numpage, 
            'qtdepages' => $qtdepages,
            'qtdereg'   => count($allPraticas),
            'msg' => $msg,
        ]);
    }


    // Exibe a página de Resultado...  
    public function pesquisar() {
        $page = "resultado";
        
        // pega os dados do formuário
        $palavra = isset($_POST['palavra-chave']) ? $_POST['palavra-chave'] : null;
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
        $tags = isset($_POST['tags']) ? $_POST['tags'] : null;
        // pegar aquivos/link-arquivo para enviar aqui

        $praticas = Pratica::find($palavra, $categoria, $tags);
        $arquivos;
        $tags;
        $categorias;

        foreach ($praticas as $p) {
            $arquivos[$p->id] = Pratica::selectArquivosByPratica($p->id);
            $tags[$p->id] = Tag::selectTagsByPratica($p->id);
            $categorias[$p->id] = Categoria::selectByPratica($p->id);
        }

        \App\View::make('resultado', [ 
            'palavra' => $palavra,
        	'praticas' => $praticas, 
            'arquivos' => $arquivos,
            'tags' => $tags,
            'categorias' => $categorias,
        	// pegar aquivos/link-arquivo para enviar aqui
        ]);
    }
 
	//
	
}