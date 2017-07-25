<?php $path = RAIZ_PATH; ?>
<!-- views/usuarios.edit.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        <nav class="breadcrumb" style="padding-left:5em;margin-top:-3.5em;background-color:#fff;";>
            <div class="col-xs-10">
                <a class="breadcrumb-item" href="/abpresa/">Home</a> / 
                <a class="breadcrumb-item" href="/abpresa/dashboard/">Dashboard</a> / 
                <a class="breadcrumb-item" href="/abpresa/usuarios/">Usuários</a> / 
                <a class="breadcrumb-item active" href="/abpresa/usuarios/edit/<?= $usuario->id ?>">Editar</a>
            </div>
            
            <div class="col-xs-2 dropdown text-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i><span class="caret"></span></a>
                <ul class="dropdown-menu text-center">
                    <li><a href="#">Meus Dados</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/abpresa/logout/">Sair</a></li>
                </ul>
            </div>
        </nav>

        <header class="page-header text-center extra-top-pad">
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8"><h1><span>Editar Usuário</span> - <?= $usuario->nome ?></h1></div>
                <div class="col-xs-2"><a href="/abpresa/usuarios/" class="btn btn-default">Cancelar</a></div>
            </div>
        </header>
        
        <div class="col-xs-1"></div>
        
        <div class="col-xs-10">
            <form method="POST" action="/abpresa/usuarios/edit/">
                <div class="card card-login card-hidden" style="padding: 2em"> 
                    <div class="row content">
                        <div class="form-group col-xs-12">
                            <label>Nome do usuário</label>
                            <input type="text" name="nome" value="<?= $usuario->nome ?>" class="form-control" required>
                        </div>
                        
                        <div class="form-group col-xs-6">
                            <label>Login</label>
                            <input type="text" name="username" value="<?= $usuario->username ?>" class="form-control" required>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>email</label>
                            <input type="email" name="email" value="<?= $usuario->email ?>" class="form-control" required>
                        </div>
                        
                        <div class="form-group col-xs-6">
                            <label>Tipo de Usuário</label>
                            <select name="tipo_usuario" class="form-control" style="height: 62px;" required>
                                <?php if ($usuario->tipo_usuario == 'NORMAL') : ?>
                                    <option value="NORMAL">NORMAL</option>
                                    <option value="ADM">ADM</option>
                                <?php else : ?>
                                    <option value="ADM">ADM</option>
                                    <option value="NORMAL">NORMAL</option>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group col-xs-6">
                            <label> </label>
                            <a href="/abpresa/usuarios/edit/senha/<?= $usuario->id ?>" class="btn btn-lg btn-block">Mudar Senha</a>
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

        <div class="col-xs-1"></div>

    </div>
</div><!--contenAreaInner-->
<!-- END views/usuarios.edit.html -->