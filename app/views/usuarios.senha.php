<?php $path = RAIZ_PATH; ?>
<!-- views/usuarios.edit.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        <nav class="breadcrumb" style="padding-left:5em;margin-top:-3.5em;background-color:#fff;";>
            <div class="col-xs-10">
                <a class="breadcrumb-item" href="/abpresa/">Home</a> / 
                <a class="breadcrumb-item" href="/abpresa/dashboard/">Dashboard</a> / 
                <a class="breadcrumb-item" href="/abpresa/usuarios/">Usuários</a> / 
                <a class="breadcrumb-item" href="/abpresa/usuarios/edit/<?= $usuario->id ?>">Editar</a> / 
                <a class="breadcrumb-item active" href="/abpresa/usuarios/edit/senha/<?= $usuario->id ?>">Mudar Senha</a>
            </div>
            
            <div class="col-xs-2 dropdown text-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i><span class="caret"></span></a>
                <ul class="dropdown-menu text-center">
                    <li><a href="/abpresa/usuarios/show/<?= $_SESSION['id'] ?>">Perfil</a></li>
                    <li><a href="/abpresa/usuarios/edit/senha/<?= $_SESSION['id'] ?>">Mudar Senha</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/abpresa/logout/">Sair</a></li>
                </ul>
            </div>
        </nav>

        <header class="page-header text-center extra-top-pad">
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8"><h1><span>Mudar Senha</span> - <?= $usuario->nome ?></h1></div>
                <div class="col-xs-2"><a href="/abpresa/usuarios/" class="btn btn-default">Cancelar</a></div>
            </div>
        </header>
        
        <div class="col-xs-2"></div>
        
        <div class="col-xs-8">
            <form method="POST" action="/abpresa/usuarios/edit/senha/">
                <div class="card card-login card-hidden" style="padding: 2em"> 
                    <div class="row content">
                        <div class="form-group col-xs-12">
                            <label>Senha Atual</label>
                            <input type="password" name="atual" placeholder="Senha Atual" class="form-control" required>
                        </div>
                        
                        <div class="form-group col-xs-12">
                            <label>Senha</label>
                            <input type="password" name="password" placeholder="Nova Senha" class="form-control" required>
                        </div>
                        <div class="form-group col-xs-12">
                            <label>Confirmação de Senha</label>
                            <input type="password" name="confirmPassword" placeholder="Confirmar Senha" class="form-control" required>
                        </div>

                        <input type="hidden" name="id_usuario" value="<?= $usuario->id ?>">

                    </div>
                    <div class="text-right col-xs-12" style="padding-right: 0;">
                        <hr/>
                        <div class="col-xs-8"></div>
                        <div class="col-xs-4 text-right" style="padding-right: 0;">
                            <button type="submit" class="btn btn-lg btn-block">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>             
        </div>

        <div class="col-xs-2"></div>

    </div>
</div><!--contenAreaInner-->
<!-- END views/usuarios.edit.html -->