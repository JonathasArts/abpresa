<?php $path = RAIZ_PATH; ?>
<!-- views/categorias.edit.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        
        <header class="page-header text-center extra-top-pad">
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8"><h1><span>Editar Categoria</span></h1><strong><?= $categoria->titulo_categoria ?></strong></div>
                <div class="col-xs-2"><a href="/abpresa/categorias/" class="btn btn-default">Cancelar</a></div>
            </div>
        </header>
        
        <div class="col-xs-4"></div>
        
        <div class="col-xs-4">
            <form method="POST" action="/abpresa/categorias/edit/">
                <div class="card card-login card-hidden" style="padding: 2em"> 
                    <div>
                        <?= $errormsg ?>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <label for="titulo_categoria">Titulo</label>
                            <input type="text" name="titulo_categoria" value="<?= $categoria->titulo_categoria ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-block">Salvar</button>
                    </div>
                </div>
                <input type="hidden" name="id_categoria" value="<?= $categoria->id ?>" class="form-control" >
            </form>                
        </div>

        <div class="col-xs-4"></div>

    </div>
</div><!--contenAreaInner-->
<!-- END views/categorias.edit.html -->
    