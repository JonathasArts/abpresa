<?php $path = RAIZ_PATH; ?>
<!-- views/categorias.create.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        <nav class="breadcrumb" style="padding-left:5em;margin-top:-3.5em;background-color:#fff;";>
            <div class="col-xs-10">
                <a class="breadcrumb-item" href="/abpresa/">Home</a> / 
                <a class="breadcrumb-item" href="/abpresa/dashboard/">Dashboard</a> / 
                <a class="breadcrumb-item" href="/abpresa/categorias/">Categorias</a> / 
                <a class="breadcrumb-item active" href="/abpresa/categorias/add/">Cadastrar</a>
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

        <header class="page-header text-center extra-top-pad">
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8"><h1><span>Cadastrar categoria</span></h1></div>
                <div class="col-xs-2"><a href="/abpresa/categorias/" class="btn btn-default">Cancelar</a></div>
            </div>
        </header>
        
        <div class="col-xs-4"></div>
        
        <div class="col-xs-4">
            <form method="POST" action="/abpresa/categorias/add/">
                <div class="card card-login card-hidden" style="padding: 2em"> 
                    <div>
                        <?= $errormsg ?>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <label for="titulo_categoria">Titulo</label>
                            <input type="text" name="titulo_categoria" placeholder="titulo da categoria" class="form-control" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-block">Salvar</button>
                    </div>
                </div>
            </form>                
        </div>

        <div class="col-xs-4"></div>

    </div>
</div><!--contenAreaInner-->
<!-- END views/categorias.create.html -->
    