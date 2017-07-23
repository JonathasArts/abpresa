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
        $categorias = Categoria::selectAll();
        $allTags = Tag::selectAll();
        
        // pega os dados do formuário
        $palavra = isset($_POST['palavra-chave']) ? $_POST['palavra-chave'] : null;
        $categoria_id = isset($_POST['categoria_id']) ? $_POST['categoria_id'] : null;
        $tags_buscadas = isset($_POST['tags']) ? $_POST['tags'] : null;
        
        // $arquivos; // pegar aquivos/link-arquivo para enviar aqui
        $categorias_das_praticas = Array();
        $tags = Array();

        $categoria_buscada = Categoria::selectAll($categoria_id);
        $categoria_buscada = (sizeof($categoria_buscada) == 1) ? $categoria_buscada : null ;

        $praticas = Pratica::find($palavra, $categoria_buscada, $tags_buscadas);//die(var_dump($praticas));

        foreach ($praticas as $p) {
            // $arquivos[$p->id] = Pratica::selectArquivosByPratica($p->id);
            $tags[$p->id] = Tag::selectTagsByPratica($p->id);
            $categorias_das_praticas[$p->id] = Categoria::selectByPratica($p->id);
        }

        \App\View::make('resultado', [ 
            'page' => $page,
            'palavra' => $palavra,
            'categoria_buscada' => $categoria_buscada,
            'tags_buscadas' => $tags_buscadas,
            'categorias_das_praticas' => $categorias_das_praticas,
            'tags' => $tags,
            'praticas' => $praticas,
            'categorias' => $categorias,
        	'allTags' => $allTags,
            // 'arquivos' => $arquivos,
        	// pegar aquivos/link-arquivo para enviar aqui
        ]);
    }
 
	//
	
}