<?php $path = RAIZ_PATH; ?>
<!-- views/login.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        
        <nav class="breadcrumb" style="padding-left:5em;margin-top:-3.5em;background-color:#fff;";>
            <div class="col-xs-10">
                <a class="breadcrumb-item" href="/abpresa/">Home</a> / 
                <a class="breadcrumb-item active" href="/abpresa/cadastro/">Cadastro</a>
            </div>
            
            
            <div class="col-xs-2 dropdown text-right">
            
                <?php if(!empty($_SESSION['username'])) : ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu text-center">
                        <li><a href="/abpresa/usuarios/show/<?= $_SESSION['id'] ?>">Perfil</a></li>
                        <li><a href="/abpresa/usuarios/edit/senha/<?= $_SESSION['id'] ?>">Mudar senha</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/abpresa/logout/">Sair</a></li>
                    </ul>
                <?php else : ?>

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-in"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu text-center">
                        <li><a href="/abpresa/cadastro/">Criar conta</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/abpresa/admin/">Login</a></li>
                    </ul>
                <?php endif ?>
                
            </div>

        </nav><hr style="margin-bottom:-1em;"/>

        <header class="page-header text-center extra-top-pad">
            <h1><span>Criar Conta</span></h1>
        </header>
        
        <div class="col-xs-1"></div>
        
        <div class="col-xs-10">
            <form method="POST" action="/abpresa/usuarios/add/">
                <div class="card card-login card-hidden" style="padding: 2em"> 
                    <div class="row content">
                        <div class="form-group col-xs-12">
                            <label>Nome do usuário</label>
                            <input type="text" name="nome" placeholder="nome completo" class="form-control" required>
                        </div>
                        
                        <div class="form-group col-xs-12">
                            <label>Login</label>
                            <input type="text" name="username" placeholder="usuario" class="form-control" required>
                        </div>
                        
                        <div class="form-group col-xs-6">
                            <label>Senha</label>
                            <input type="password" name="password" placeholder="senha" class="form-control" required>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Confirmação de senha</label>
                            <input type="password" name="confirmPassword" placeholder="Confirmar Senha" class="form-control" required>
                        </div>

                        <input type="hidden" name="tipo_usuario" value="NORMAL" required>

                    </div>
                    <div class="row text-right" style="padding-top:2em;padding-right:1em;">
                        <a href="/abpresa/admin/" class="btn btn-lg">Cancelar</a>
                        <button type="submit" class="btn btn-lg">Salvar</button>
                    </div>
                </div>
            </form>                
        </div>

        <div class="col-xs-1"></div>

    </div>
</div><!--contenAreaInner-->
<!-- END views/resultado.html -->
    