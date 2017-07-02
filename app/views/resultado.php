<?php $path = RAIZ_PATH; ?>
<!-- views/resultado.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        
        <header class="page-header text-center extra-top-pad">
            <?php if(!empty($palavra)) : ?>
                <h1><small>Resultados para: </small><span>'<?= $palavra ?>'</span></h1>
            <?php else : ?>
                <h1><span>Praticas Cadastradas</span></h1>
            <?php endif ?>
        </header>
        
        <div class="col-xs-1"></div>
        
        <div class="col-xs-10">
            <?php foreach ($praticas as $p) :?>
            
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h2><span><?= $p->titulo_pratica ?></span></h2></div>
                <div class="panel-body">
                    <!-- Definição/descricao da Pratica -->
                    <div class="col-xs-6">
                        <p class="title-col-pratica">DEFINIÇÃO</p>
                        <p style="text-align: justify;">&nbsp&nbsp<?= $p->descricao_pratica ?> <span>lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus eaque velit id veritatis, excepturi dolorem est similique. Dolore magnam sunt repellat laborum quam, ab, laudantium, doloribus a atque nam voluptatum.</span><span>Nemo illum rem beatae excepturi id. Amet aliquid repellat expedita perspiciatis modi ratione totam dolores natus quibusdam quos rem, tempore quaerat. Quo laborum, dolorem necessitatibus quis. Eligendi corporis explicabo in.</span></p>
                        <p style="text-align: justify;">&nbsp&nbspLorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae, voluptates quibusdam! Voluptatum a, totam maxime est perferendis sequi consequuntur incidunt! Dolore hic eligendi eveniet recusandae, nostrum, explicabo ut magnam unde.</p>
                    </div>

                    <!-- Link para os arquivos -->
                    <div class="col-xs-3">
                        <div class="row m-l-5 text-center">
                            <p class="title-col-pratica">CATEGORIA</p>
                            <div style="font-weight: bold;">
                                <?= $categorias[$p->id][0]->titulo_categoria ?>
                            </div>
                        </div>
                        <div class="row m-l-5" style="margin-top:3em">
                            <p class="title-col-pratica">ARQUIVOS</p>
                            <?php foreach ($arquivos[$p->id] as $a) : ?>
                                <a href="<?= $a->path_arquivo ?>" class="col-xs-12 link-arq">
                                    <small><i class="fa fa-file-pdf-o"></i></small>
                                    <!-- 
                                    <small><i class="fa fa-volume-up"></i></small> aúdio
                                    <small><i class="fa fa-sitemap"></i></small> diagrama
                                    <small><i class="fa fa-film"></i></small> vídeo
                                    <small><i class="fa fa-book"></i></small> livro
                                    <small><i class="fa fa-picture-o"></i></small> imagem
                                    <small><i class="fa fa-file-text"></i></small> doc
                                    <small><i class="fa fa-file-zip-o"></i></small> arquivo zip
                                    <small><i class="fa fa-bitbucket"></i></small> bitbucket
                                    <small><i class="fa fa-github"></i></small> github
                                    <small><i class="fa fa-youtube"></i></small> youtube
                                    -->
                                    <small><?= $a->titulo_arquivo ?></small>
                                </a>
                            <?php endforeach ?>
                        </div>
                    </div>

                    <!-- Opções -->
                    <div class="col-xs-3 text-center">
                        <div class="row m-l-5">
                            <p class="title-col-pratica">OPÇÕES</p>
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Baixar Boa Pratica"><i class="fa fa-download"></i></button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Mais Detalhes"><i class="fa fa-eye"></i></button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Compartilhar"><i class="fa fa-share-square-o"></i></button>
                            </div>
                        </div>
                        <div class="row m-l-5" style="margin-top:3em">
                            <p class="title-col-pratica">TAGS</p>
                            <div>
                                <?php foreach ($tags[$p->id] as $t) : ?>
                                    <span>#<?= $t->descricao_tag ?> </span><br>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="panel-footer">footer</div> -->
            </div>

            <?php endforeach ?>
        </div>
        
        <div class="col-xs-1"></div>

    </div>
</div><!--contenAreaInner-->
<!-- END views/resultado.html -->