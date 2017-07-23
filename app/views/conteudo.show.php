<?php $path = RAIZ_PATH; ?>
<!-- views/categorias.create.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        
        <header class="page-header text-center" style="margin-top:-.4em">
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8"><h1><span><?= $pratica->titulo_pratica ?></span></h1></div>
                <div class="col-xs-2"><a href="/abpresa/dashboard/" class="btn btn-default">voltar</a></div>
            </div>
        </header>
        
        <div class="row" style="margin-bottom:15em;">
            <div class="col-xs-1"></div>
            
            <div class="col-xs-10">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-6 col-md-12">
                            <h2><small><strong>Categoria:</strong></small> <span><?= $categoria_pratica->titulo_categoria ?></span></h2>
                            <strong>
                            <?php 
                                foreach ($tags_pratica as $tag) {
                                    echo "#".$tag->descricao_tag." ";
                                }
                            ?>
                            </strong>
                        </div>
                        <div class="col-xs-6 col-md-12">
                            <hr/>
                            <p><?= $pratica->descricao_pratica ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="row">
                        <h1 class="text-center"><small><strong>Arquivos</strong></small></h1>
                        <!-- foreach dos arquivos  -->
                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="<?= $path.'/app/assets/img/img_temp.svg' ?>" alt="...">
                            </a>
                        </div>
                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="<?= $path.'/app/assets/img/img_temp.svg' ?>" alt="...">
                            </a>
                        </div>
                        <div class="col-xs-6 col-md-4">
                            <a href="#" class="thumbnail">
                                <img src="<?= $path.'/app/assets/img/img_temp.svg' ?>" alt="...">
                            </a>
                        </div>
                        <!-- END foreach dos arquivos  -->
                    </div>
                </div>

            </div>

            <div class="col-xs-1"></div>
        </div>

        <div class="row">
            <div class="col-xs-1"></div>
                <div class="col-xs-5">
                    Comentários...
                </div>
                <div class="col-xs-5">
                    Boas praticas relacionadas...
                </div>
            <div class="col-xs-1"></div>
        </div>

        
    </div>
</div><!--contenAreaInner-->
<!-- END views/categorias.create.html -->
    