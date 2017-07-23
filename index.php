<?php 
session_start();

// inclui o autoloader do Composer 
require 'vendor/autoload.php'; 

// inclui o arquivo de inicialização 
require 'init.php'; 

// instancia o Slim, habilitando os erros (útil para debug, em desenvolvimento) 
$app = new \Slim\App([ 
  'settings' => [
        'displayErrorDetails' => true
    ]
]);
/*__________________________________________________________________________________________*/



/*==========================================================================================*/ 
/*                                      APLICAÇÃO                                           */
/*==========================================================================================*/ 

// Carrega a Página Inicial para a URL "/abpresa/"
$app->get('/', function (){
    $AppController = new \App\Controllers\AppController; // Instancia o Controler
    $AppController->index();  // Chama o método do Controler
});

//  "/abpresa/pesquisar/"
$app->post('/pesquisar/', function (){
    $AppController = new \App\Controllers\AppController; // Instancia o Controler
    $AppController->pesquisar();  // Chama o método do Controler
});
/*__________________________________________________________________________________________*/



/*==========================================================================================*/ 
/*                                      SESSÃO                                            */
/*==========================================================================================*/ 

// Carrega a Página de login para a URL "/abpresa/admin/"
$app->get('/admin/', function (){
    $SessionController = new \App\Controllers\SessionController; // Instancia o Controler
    $SessionController->login();  // Chama o método do Controler
});

// Realiza o login do usuario administrador "/abpresa/admin/"
$app->post('/admin/', function (){
    $SessionController = new \App\Controllers\SessionController; // Instancia o Controler
    $SessionController->store();  // Chama o método do Controler
});

// Sair da área administrativa do sistema
$app->get('/logout/', function (){
    if(verificaLogin()){
        $SessionController = new \App\Controllers\SessionController; // Instancia o Controler
        $SessionController->logout();  // Chama o método do Controler
    }
});

// Carrega a Página de administraçao para a URL "/abpresa/dashboard/"
$app->get('/dashboard/', function (){
    if(verificaLogin()){
       $AppController = new \App\Controllers\AppController; // Instancia o Controler
       $AppController->dashboard(getMensagem());  // Chama o método do Controler
    }
});
/*__________________________________________________________________________________________*/



/*==========================================================================================*/ 
/*                                      USUARIOS                                            */
/*==========================================================================================*/ 

// Lista de Usuários Cadastrados "/abpresa/usuarios/"
$app->get('/usuarios/', function (){
    $UserController = new \App\Controllers\UserController; // Instancia o Controler
    $UserController->index();  // Chama o método do Controler
});


/*__________________________________________________________________________________________*/



/*==========================================================================================*/ 
/*                                      PRATICAS                                            */
/*==========================================================================================*/ 


// Carrega o formulário de cadastro de Conteudo "/abpresa/Conteudo/add/"
$app->get('/conteudo/add/', function (){
    if(verificaLogin()){
        $ConteudoController = new \App\Controllers\ConteudoController; // Instancia o Controler
        $ConteudoController->create(getMensagem());  // Chama o método do Controler
    }
});

// Processa formulário de cadastro de Conteudo "/abpresa/Conteudo/add/"
$app->post('/conteudo/add/', function (){
    if(verificaLogin()){
        $ConteudoController = new \App\Controllers\ConteudoController; // Instancia o Controler
        $ConteudoController->store();  // Chama o método do Controler
    }
});

// Carrega o formulário de edição de Conteudo "/abpresa/Conteudo/edit/"
$app->get('/conteudo/edit/{id}', function ($request){
    if(verificaLogin()){
        // pega o ID da URL
        $id = $request->getAttribute('id');
        
        $ConteudoController = new \App\Controllers\ConteudoController; // Instancia o Controler
        $ConteudoController->edit($id);  // Chama o método do Controler
    }
});

// Processa formulário de edição de Conteudo "/abpresa/Conteudo/edit/"
$app->post('/conteudo/edit/', function (){
    if(verificaLogin()){
        $ConteudoController = new \App\Controllers\ConteudoController; // Instancia o Controler
        $ConteudoController->update();  // Chama o método do Controler
    }
});

// Remover uma Categoria
$app->get('/conteudo/remove/{id}', function ($request){
    if(verificaLogin()){
        // pega o ID da URL
        $id = $request->getAttribute('id');
     
        $ConteudoController = new \App\Controllers\ConteudoController;
        $ConteudoController->remove($id);
    }
});


/*__________________________________________________________________________________________*/



/*==========================================================================================*/ 
/*                                      CATEGORIAS                                          */
/*==========================================================================================*/ 

// Carrega a Página com a lista de categorias "/abpresa/categorias/"
$app->get('/categorias/', function ($request){
    if(verificaLogin()){
        $CategoriaController = new \App\Controllers\CategoriaController; // Instancia o Controler
        $CategoriaController->categorias(getMensagem());  // Chama o método do Controler
    }
});

// Carrega o formulário de cadastro de categoria "/abpresa/categorias/add/"
$app->get('/categorias/add/', function (){
    if(verificaLogin()){
        $CategoriaController = new \App\Controllers\CategoriaController; // Instancia o Controler
        $CategoriaController->create();  // Chama o método do Controler
    }
});

// Processa formulário de cadastro de Categoria "/abpresa/categorias/add/"
$app->post('/categorias/add/', function (){
    if(verificaLogin()){
        $CategoriaController = new \App\Controllers\CategoriaController; // Instancia o Controler
        $CategoriaController->store();  // Chama o método do Controler
    }
});

// Carrega o formulário de edição de categoria "/abpresa/categorias/add/"
$app->get('/categorias/edit/{id}', function ($request){
    if(verificaLogin()){
        // pega o ID da URL
        $id = $request->getAttribute('id');

        $CategoriaController = new \App\Controllers\CategoriaController; // Instancia o Controler
        $CategoriaController->edit($id);  // Chama o método do Controler
    }
});

// Processa formulário de edicao de Categoria "/abpresa/categorias/add/"
$app->post('/categorias/edit/', function (){
    if(verificaLogin()){
        $CategoriaController = new \App\Controllers\CategoriaController; // Instancia o Controler
        $CategoriaController->update();  // Chama o método do Controler
    }
});

// Remover uma Categoria
$app->get('/categorias/remove/{id}', function ($request){
    if(verificaLogin()){
        // pega o ID da URL
        $id = $request->getAttribute('id');
     
        $CategoriaController = new \App\Controllers\CategoriaController;
        $CategoriaController->remove($id);
    }
});
/*__________________________________________________________________________________________*/




/*==========================================================================================*/ 
/*                                  INIT DO SLIM PHP                                        */
/*==========================================================================================*/ 
$app->run();
/*__________________________________________________________________________________________*/








/*==========================================================================================*/ 
/*                                      MÉTODOS                                          */
/*==========================================================================================*/ 

// Verificação se existe usuario logado
function verificaLogin(){
    if(!isset($_SESSION['nome'])){
        $SessionController = new \App\Controllers\SessionController;
        $SessionController->login();
        return false;
    }
    return true;
}

// 
function getMensagem(){
    $msg = $_SESSION['msg']; // Pega a mensagem de confirmação
    $_SESSION['msg'] = ""; // Esvazia a msg na sessão

    return $msg;
}
/*__________________________________________________________________________________________*/