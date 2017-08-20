<?php $path = RAIZ_PATH; ?>
<!-- views/categorias.create.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        <nav class="breadcrumb" style="padding-left:5em;margin-top:-3.5em;background-color:#fff;";>
            <div class="col-xs-10">
                <a class="breadcrumb-item" href="/abpresa/">Home</a> / 
                <a class="breadcrumb-item" href="/abpresa/dashboard/">Dashboard</a> / 
                <a class="breadcrumb-item" href="/abpresa/usuarios/">Usuários</a> / 
                <a class="breadcrumb-item" href="/abpresa/usuarios/edit/<?= $usuario->id ?>">Editar</a> / 
                <a class="breadcrumb-item active" href="/abpresa/usuarios/edit/senha/<?= $usuario->id ?>">Mudar senha</a>
            </div>
            
            <div class="col-xs-2 dropdown text-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i><span class="caret"></span></a>
                <ul class="dropdown-menu text-center">
                    <li><a href="/abpresa/usuarios/show/<?= $_SESSION['id'] ?>">Perfil</a></li>
                    <li><a href="/abpresa/usuarios/edit/senha/<?= $_SESSION['id'] ?>">Mudar senha</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/abpresa/logout/">Sair</a></li>
                </ul>
            </div>
        </nav>
        
        <header class="page-header text-center" style="margin-top:-.4em">
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8"><h1>Perfil: <span><?= $usuario->nome ?></span></h1></div>
                <div class="col-xs-2"><a href="/abpresa/usuarios/" class="btn btn-default">Voltar</a></div>
            </div>
        </header>
        
        <div class="row text-center" style="margin-bottom:15em;">
            <div class="col-xs-1"></div>
            
            <div class="col-xs-10">

                <div class="col-xs-2"></div>
                <div class="col-xs-4 text-left">
                    <strong>Login: <span><?= $usuario->username ?></span></strong><br/>
                    <strong>Email: <span><?= $usuario->email ?></span></strong><br/><br/>
                    <strong>Nivel de acesso: <span><?= $usuario->tipo_usuario ?></span></strong><br/>
                    <hr/>
                    <p></p>
                </div>
                <div class="col-xs-4">
                    <a href="/abpresa/usuarios/edit/<?= $usuario->id ?>" style="color: #ebc867;font-size:4em;" title="Editar"><i class="fa fa-edit"></i></a>
                    <span style="margin-left:3em;"></span>
                    <a href="" data-pathid="/abpresa/usuarios/remove/<?= $usuario->id ?>" data-msg="Usuario <?= $usuario->nome ?>" onclick="modalRemove(this)" style="color: #d63123;font-size:4em;" title="Excluir"><i class="fa fa-close"></i></a> 
                </div>
                <div class="col-xs-2"></div>
            </div>

            <div class="col-xs-1"></div>
        </div>
        
    </div>
</div><!--contenAreaInner-->
<!-- END views/categorias.create.html -->
    