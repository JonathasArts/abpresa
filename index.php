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

// Exibe as informações do Conteudo "/abpresa/Conteudo/show/"
$app->get('/resultado/show/{id}', function ($request){
    // pega o ID da URL
    $id = $request->getAttribute('id');
    
    $AppController = new \App\Controllers\AppController; // Instancia o Controler
    $AppController->show($id);  // Chama o método do Controler
});

// 
$app->get('/resultado/return/', function (){
    $AppController = new \App\Controllers\AppController; // Instancia o Controler
    $AppController->returnResult();  // Chama o método do Controler
});

/*__________________________________________________________________________________________*/



/*==========================================================================================*/ 
/*                                      SESSÃO                                            */
/*==========================================================================================*/ 

// Carrega a Página de login para a URL "/abpresa/admin/"
$app->get('/admin/', function (){
    $SessionController = new \App\Controllers\SessionController; // Instancia o Controler
    $SessionController->login(getMensagem());  // Chama o método do Controler
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

// Exibe as informações do usuario "/abpresa/usuario/show/"
$app->get('/usuarios/show/{id}', function ($request){
    if(verificaLogin()){
        // pega o ID da URL
        $id = $request->getAttribute('id');
        
        $UsuarioController = new \App\Controllers\UsuarioController; // Instancia o Controler
        $UsuarioController->show($id);  // Chama o método do Controler
    }
});

// Lista de Usuários Cadastrados "/abpresa/usuarios/"
$app->get('/usuarios/', function (){
    $UsuarioController = new \App\Controllers\UsuarioController; // Instancia o Controler
    $UsuarioController->usuarios(getMensagem());  // Chama o método do Controler
});

// Carrega a Página de criar conta de usuario "/abpresa/cadastro/"
$app->get('/cadastro/', function (){
    $UsuarioController = new \App\Controllers\UsuarioController; // Instancia o Controler
    $UsuarioController->cadastro();  // Chama o método do Controler
});

// Carrega a Página de cadastro de usuario "/abpresa/usuario/add/"
$app->get('/usuarios/add/', function (){
    $UsuarioController = new \App\Controllers\UsuarioController; // Instancia o Controler
    $UsuarioController->create();  // Chama o método do Controler
});

// Realiza o login do usuario administrador "/abpresa/usuario/add/"
$app->post('/usuarios/add/', function (){
    $UsuarioController = new \App\Controllers\UsuarioController; // Instancia o Controler
    $UsuarioController->store();  // Chama o método do Controler
});

// Carrega o formulário de edição de usuario "/abpresa/usuario/edit/"
$app->get('/usuarios/edit/{id}', function ($request){
    if(verificaLogin()){
        // pega o ID da URL
        $id = $request->getAttribute('id');
        
        $UsuarioController = new \App\Controllers\UsuarioController; // Instancia o Controler
        $UsuarioController->edit($id);  // Chama o método do Controler
    }
});

// Processa formulário de edição de usuario "/abpresa/usuario/edit/"
$app->post('/usuarios/edit/', function (){
    if(verificaLogin()){
        $UsuarioController = new \App\Controllers\UsuarioController; // Instancia o Controler
        $UsuarioController->update();  // Chama o método do Controler
    }
});

// Carrega o formulário de mudança de senha "/abpresa/usuario/edit/"
$app->get('/usuarios/edit/senha/{id}', function ($request){
    if(verificaLogin()){
        // pega o ID da URL
        $id = $request->getAttribute('id');
        
        $UsuarioController = new \App\Controllers\UsuarioController; // Instancia o Controler
        $UsuarioController->mudarSenha($id);  // Chama o método do Controler
    }
});

// Processa formulário de mudança de senha "/abpresa/usuario/edit/"
$app->post('/usuarios/edit/senha/', function (){
    if(verificaLogin()){
        $UsuarioController = new \App\Controllers\UsuarioController; // Instancia o Controler
        $UsuarioController->updateSenha();  // Chama o método do Controler
    }
});

// Remover um usuario
$app->get('/usuarios/remove/{id}', function ($request){
    if(verificaLogin()){
        // pega o ID da URL
        $id = $request->getAttribute('id');
     
        $UsuarioController = new \App\Controllers\UsuarioController;
        $UsuarioController->remove($id);
    }
});

/*__________________________________________________________________________________________*/



/*==========================================================================================*/ 
/*                                      PRATICAS                                            */
/*==========================================================================================*/ 

// Exibe as informações do Conteudo "/abpresa/Conteudo/show/"
$app->get('/conteudo/show/{id}', function ($request){
    if(verificaLogin()){
        // pega o ID da URL
        $id = $request->getAttribute('id');
        
        $ConteudoController = new \App\Controllers\ConteudoController; // Instancia o Controler
        $ConteudoController->show($id);  // Chama o método do Controler
    }
});

// Carrega o formulário de cadastro de Conteudo "/abpresa/Conteudo/add/"
$app->get('/conteudo/add/', function (){
    if(verificaLogin()){
        $ConteudoController = new \App\Controllers\ConteudoController; // Instancia o Controler
        $ConteudoController->create();  // Chama o método do Controler
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
    $msg = isset($_SESSION['msg']) ? $_SESSION['msg'] : ""; // Pega a mensagem de confirmação
    $_SESSION['msg'] = ""; // Esvazia a msg na sessão

    return $msg;
}
/*__________________________________________________________________________________________*/