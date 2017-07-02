<?php $path = RAIZ_PATH; ?>
<!-- views/login.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        
        <header class="page-header text-center extra-top-pad">
            <h1><span>ADMIN Sistema</span></h1>
        </header>
        
        <div class="col-xs-4"></div>
        
        <div class="col-xs-4">
            <form method="POST" action="/abpresa/admin/">
                <div class="card card-login card-hidden" style="padding: 2em"> 
                    <div>
                        <?= $errormsg ?>
                    </div>
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
    