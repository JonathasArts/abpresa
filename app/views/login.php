<?php $path = RAIZ_PATH; ?>
<!-- views/login.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        
        <nav class="breadcrumb" style="padding-left:5em;margin-top:-3.5em;background-color:#fff;";>
            <div class="col-xs-10">
                <a class="breadcrumb-item" href="/abpresa/">Home</a> / 
                <a class="breadcrumb-item active" href="/abpresa/admin/">Login</a>
            </div>
            
            
            <div class="col-xs-2 dropdown text-right">
            
                <?php if(!empty($_SESSION['username'])) : ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu text-center">
                        <li><a href="/abpresa/usuarios/show/<?= $_SESSION['id'] ?>">Meus Dados</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/abpresa/logout/">Sair</a></li>
                    </ul>
                <?php else : ?>

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-in"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu text-center">
                        <li><a href="/abpresa/cadastro/">Criar Conta</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/abpresa/admin/">Login</a></li>
                    </ul>
                <?php endif ?>
                
            </div>

        </nav><hr style="margin-bottom:-1em;"/>

        <header class="page-header text-center extra-top-pad">
            <h1><span>Login</span></h1>
        </header>
        
        <div class="col-xs-4"></div>
        
        <div class="col-xs-4">
            <form method="POST" action="/abpresa/admin/">
                <div class="card card-login card-hidden" style="padding: 2em"> 
                    <div class="content">
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" name="username" placeholder="usuario" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" name="password" placeholder="senha" class="form-control" required>
                        </div>
                        <div class="form-group" style="margin-top: -1em; margin-bottom: 2em;">
                            <small><a href="">Esqueceu a Senha?</a></small>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-block">Entrar</button>
                    </div>
                </div>
            </form>                
        </div>

        <div class="col-xs-4"></div>

    </div>
</div><!--contenAreaInner-->
<!-- END views/resultado.html -->
    