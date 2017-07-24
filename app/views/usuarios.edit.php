<?php $path = RAIZ_PATH; ?>
<!-- views/categorias.create.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        
        <header class="page-header text-center extra-top-pad">
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8"><h1><span>Editar Usuário</span> - <?= $usuario->nome ?></h1></div>
                <div class="col-xs-2"><a href="/abpresa/usuarios/" class="btn btn-default">Cancelar</a></div>
            </div>
        </header>
        
        <div class="col-xs-1"></div>
        
        <div class="col-xs-10">
            <form method="POST" action="/abpresa/usuarios/add/">
                <div class="card card-login card-hidden" style="padding: 2em"> 
                    <div class="row content">
                        <div class="form-group col-xs-12">
                            <label>Nome do usuário</label>
                            <input type="text" name="nome" value="<?= $usuario->nome ?>" class="form-control" required>
                        </div>
                        
                        <div class="form-group col-xs-12">
                            <label>Login</label>
                            <input type="text" name="username" value="<?= $usuario->username ?>" class="form-control" required>
                        </div>
                        
                        <div class="form-group col-xs-6">
                            <label>Senha</label>
                            <input type="password" name="password" placeholder="senha" class="form-control" required>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Confirmação de Senha</label>
                            <input type="password" name="confirmPassword" placeholder="Confirmar Senha" class="form-control" required>
                        </div>

                        <input type="hidden" name="tipo_usuario" value="<?= $usuario->id ?>">
                        <input type="hidden" name="id_usuario" value="<?= $usuario->tipo_usuario ?>">

                    </div>
                    <div class="text-right col-xs-12">
                        <div class="col-xs-8"></div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-lg btn-block">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>             
        </div>

        <div class="col-xs-1"></div>

    </div>
</div><!--contenAreaInner-->
<!-- END views/categorias.create.html -->
    