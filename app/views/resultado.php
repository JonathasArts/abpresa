<?php $path = RAIZ_PATH; ?>
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

<!-- views/resultado.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        
        <header class="page-header text-left" style="padding-left:7em;">
            
        </header>
        
        <div class="col-xs-1"></div>
        
        <div class="col-xs-7">
            <?php if (!empty($praticas)) : ?>
                <?php foreach ($praticas as $p) :?>
                
                <div class="panel panel-default">
                    <div class="panel-body" style="background-color:#eeeeee;">
                        <div class="col-xs-9">
                            <h2><span><?= $p->titulo_pratica ?></span></h2>
                            <div style="margin-top:-1rem;">
                                <strong style="font-size:1.3em;color:#213435;"><?= $categorias_das_praticas[$p->id][0]->titulo_categoria ?> </strong>
                                <small style="font-style: italic;">
                                    <?php foreach ($tags[$p->id] as $t) : ?>
                                        <?= "#".$t->descricao_tag."  " ?>
                                    <?php endforeach ?>
                                </small>
                            </div>
                            <hr style="margin-top: -.2rem;margin-bottom: 5px"/>
                            <p><?= $p->descricao_pratica ?></p>
                        </div>
                        <!-- Opções -->
                        <div class="col-xs-3 text-center">
                            <p class="title-col-pratica">OPÇÕES</p>
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Baixar Boa Pratica"><i class="fa fa-download"></i></button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Mais Detalhes"><i class="fa fa-eye"></i></button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Compartilhar"><i class="fa fa-share-square-o"></i></button>
                            </div>
                        </div>

                    </div>
                </div>

                <?php endforeach ?>
            <?php else : ?>
            <div>
                Sem Resultados...
            </div>
            <?php endif ?>
        </div>
        
        <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-body" style="background-color:#213435;">
                    <h2 class=" text-center"><span>FILTROS</span></h2>
                    <div class="row">
                        <div class="col-xs-12" style="margin-bottom:1em;">
                            <label for="palavra-chave text-left">Palavra-chave: </label>
                            <input type="text" value="<?php if($palavra != ''){echo $palavra;} ?>" name="palavra-chave" class="form-control">
                        </div>

                        <div class="col-xs-12" style="margin-bottom:1em;">
                            <label for="categoria_id">Categoria: </label>
                            <select name="categoria_id" class="form-control">
                            <option selected="selected">Escolha uma Categoria</option>
                            <?php //foreach ($categorias as $categoria) : ?>
                                <option value="<?= $categoria_buscada->id ?>"><?= $categoria_buscada->titulo_categoria ?></option>
                            <?php //endforeach ?>
                            </select>
                        </div>

                        <div class="col-xs-12" style="margin-bottom:1em;">
                            <label for="categoria_id">tags: </label>
                            <div>
                            <?php foreach ($tags_buscadas as $t) : ?>
                                    <span>#<?= $t ?> </span><br>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div><!--contenAreaInner-->
<!-- END views/resultado.html -->