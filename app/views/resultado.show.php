<?php $path = RAIZ_PATH; ?>
<!-- views/categorias.create.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        <nav class="breadcrumb" style="padding-left:5em;margin-top:-3.5em;background-color:#fff;";>
            
            <div class="col-xs-10">
                <a class="breadcrumb-item" href="/abpresa/">Home</a> / 
                <a class="breadcrumb-item" href="/abpresa/resultado/return/">Resultado</a> / 
                <a class="breadcrumb-item active" href="/abpresa/resultado/show/<?= $pratica->id ?>"><?= $pratica->titulo_pratica ?></a>
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
        </nav>

        <header class="page-header text-center" style="margin-top:-.4em">
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8"><h1><span><?= $pratica->titulo_pratica ?></span></h1></div>
                <div class="col-xs-2"><a href="/abpresa/resultado/return/" class="btn btn-default">Voltar</a></div>
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
                            <div class="row text-right" style="padding: 0 1em;">
                                <a href="/abpresa/conteudo/download/<?= $pratica->id ?>" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Baixar boa pratica"><i class="fa fa-download"></i></a>
                                <a href="" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Compartilhar"><i class="fa fa-share-square-o"></i></a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-12">
                            <hr/>
                            <p><?= $pratica->descricao_pratica ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 text-center">
                    <div class="row">
                        <h1><small><strong>Arquivos</strong></small></h1>
                        <!-- foreach dos arquivos  -->
                        <?php foreach ($arquivos_pratica as $arquivo) : ?>
                            <?php $caminho = $path.str_replace("C:/xampp/htdocs/abpresa", "", str_replace("\\", "/", $arquivo->path_arquivo)); ?>
                            <div class="col-xs-6 col-md-4">
                                
                                <!-- PDF  -->
                                <?php if ($arquivo->tipo == "PDF") : ?>

                                <div class="row text-center">
                                    <a class="fancybox" data-fancybox-type="iframe" href="<?= $caminho ?>">
                                        <img src="<?= $path.'/app/assets/img/pdf.png' ?>" alt="..." style="font-size:7em;color:red;margin-left:.2em;">
                                        <p style="margin:4px 0;font-size:.7em;"><?= $arquivo->titulo_arquivo ?></p>
                                    </a>
                                </div>

                                <!-- Imagem  -->
                                <?php elseif ($arquivo->tipo == "JPG" || $arquivo->tipo == "PNG" || $arquivo->tipo == "GIF" || $arquivo->tipo == "TIF") : ?>

                                <div class="row text-center">
                                    <a data-fancybox="gallery" href="<?= $caminho ?>" class="thumbnail" style="text-decoration:none;">
                                        <img src="<?= $caminho ?>" alt="">
                                        <div style="max-width:15em;font-size:.7em">
                                            <p style="margin:4px 0"><?= $arquivo->titulo_arquivo ?></p>
                                        </div>
                                    </a>
                                </div>

                                <?php endif ?>
                            </div>

                        <?php endforeach ?>
                        <!-- END foreach dos arquivos  -->
                    </div>
                </div>

            </div>

            <div class="col-xs-1"></div>
        </div>

        <div class="row">
            <div class="col-xs-1"></div>
                <div class="col-xs-5 text-center" style="heigth:4em;">
                    <form action="" method="GET">
                    <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
                    Adicionar opção de comentários
                    </form>
                </div>
                <div class="col-xs-5 text-center">
                    Lista de Boas praticas relacionadas

                </div>
            <div class="col-xs-1"></div>
        </div>
        
    </div>
</div><!--contenAreaInner-->
<!-- END views/categorias.create.html -->
    