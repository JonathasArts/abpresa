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
        <nav class="breadcrumb" style="padding-left:5em;margin-top:-3.5em;background-color:#fff;";>
            <div class="col-xs-10">
                <a class="breadcrumb-item" href="/abpresa/">Home</a> / 
                <a class="breadcrumb-item active" href="/abpresa/resultado/return/">Resultado</a>
            </div>
            
            <div class="col-xs-2 dropdown text-right">
            
                <?php if(!empty($_SESSION['username'])) : ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i><span class="caret"></span></a>
                    <ul class="dropdown-menu text-center">
                        <li><a href="#">Meus Dados</a></li>
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
        </nav>
        <header class="page-header text-left" style="padding-left:7em;">
            <div>
                <!-- ESPAÇO PARA MAIS FILTROS E/OU LINKS  -->
            </div>
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
                                <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Baixar Boa Pratica"><i class="fa fa-download"></i></a>
                                <a href="/abpresa/resultado/show/<?= $p->id ?>" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Mais Detalhes"><i class="fa fa-eye"></i></a>
                                <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Compartilhar"><i class="fa fa-share-square-o"></i></a>
                            </div>
                        </div>

                    </div>
                </div>

                <?php endforeach ?>
            <?php else : ?>
            <div class="text-center">
                <h1 class="text-danger"><i class="fa fa-frown-o"></i></h1>
                <h2 class="text-danger"><strong>Infelizmente não encontramos resultados para esta busca.</strong></h2>
            </div>
            <?php endif ?>
        </div>
        
        <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-body" style="background-color:#eee;">
                    <h2 class=" text-center"><span></span></h2>
                    <div class="row">
                        <form action="/abpresa/pesquisar/" method="post"> <!-- Buscar Praticas aqui -->
                            <div class="col-xs-12" style="margin-bottom:1em;">
                                <label for="palavra-chave text-left">Palavra-chave: </label>
                                <input type="text" id="i_keywords" name="palavra-chave" class="form-control" value="<?php if($palavra != ''){echo $palavra;} ?>">
                            </div>

                            <div class="col-xs-12" style="margin-bottom:1em;">
                                <label for="categoria_id">Categoria: </label>
                                <select name="categoria_id" class="form-control">
                                    <?php if (!empty($categoria_buscada)) : ?>
                                        <option value="" >Escolha uma Categoria</option>
                                        <option value="<?= $categoria_buscada->id ?>" selected="selected"><?= $categoria_buscada->titulo_categoria ?></option>
                                    <?php else : ?>
                                        <option value="" selected="selected">Escolha uma Categoria</option>
                                    <?php endif ?>
                                    
                                    <?php foreach ($categorias as $categoria) : ?>
                                        <?php if ($categoria_buscada->titulo_categoria != $categoria->titulo_categoria) : ?>
                                            <option value="<?= $categoria->id ?>"><?= $categoria->titulo_categoria ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>

                                </select>
                            </div>

                            <div class="col-xs-12" style="margin-bottom:1em;">
                                <label for="categoria_id">tags: </label>
                                <div>
                                <select name="tags[]" id="select-tags" class="selectpicker" multiple="multiple">
                                    <?php foreach ($allTags as $tag) : ?>
                                        <?php if (in_array($tag->descricao_tag, $tags_buscadas)) : ?>
                                            <option value="<?= $tag->descricao_tag ?>" selected><?= $tag->descricao_tag ?></option>
                                        <?php else : ?>
                                            <option value="<?= $tag->descricao_tag ?>"><?= $tag->descricao_tag ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-xs-12 text-center" style="padding:2em 0 0 0">
                                <button type="submit" name="" class="btn btn-block"><i class="fa fa-search"></i>&nbsp &nbsp Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div><!--contenAreaInner-->
<!-- END views/resultado.html -->