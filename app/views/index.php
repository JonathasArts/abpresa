<?php $path = RAIZ_PATH; ?>
<!-- views/index.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        
        <nav class="breadcrumb" style="padding-left:5em;margin-top:-3.5em;background-color:#fff;";>
            <div class="col-xs-10">
                <a class="breadcrumb-item active" href="/abpresa/">Home</a>
            </div>
            <div class="col-xs-2 dropdown text-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i><span class="caret"></span></a>
                <ul class="dropdown-menu text-center">
                    <li><a href="#">Meus Dados</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/abpresa/logout/">Sair</a></li>
                </ul>
            </div>
        </nav><hr style="margin-bottom:-1em;"/>

        <header class="page-header text-center extra-top-pad">
            <h1>VOCÊ TEM UM <span>PROJETO DE SOFTWARE</span>?</h1>
            <strong>Encontre aqui as <span>melhores práticas</span> para desenvolve-lo!</strong>
        </header>

        <div class="text-center">
            <form action="/abpresa/pesquisar/" method="post"> <!-- Buscar Praticas aqui -->
                
                <div class="row row">
                    <div class="form-group col-sm-2 col-xs-0"></div>
                    <div class="form-group col-sm-6 col-xs-6">
                        <input type="text" id="i_keywords" name="palavra-chave" class="form-control" placeholder="Digite uma palavra-chave...">
                    </div>
                    <div class="form-group col-sm-2 col-xs-6">
                        <button type="submit" name="" class="btn btn-lg"><i class="fa fa-search"></i>&nbsp &nbsp Buscar</button>
                    </div>
                    <div class="form-group col-sm-2 col-xs-0"></div>
                </div>

                <!-- FILTROS -->
                <div class="row div-filtros">
                    <div class="form-group col-sm-2 col-xs-0"></div>
                    <div class="form-group col-sm-12 col-xs-10" style="text-align: left;padding: 0 5em;">
                    <fieldset style="margin-left: 2em;"><legend><small class="page-header" style="color: #abafb6;">FILTROS</small></legend>
                        
                        <div class="form-group col-sm-1 col-xs-0"></div>
                        <!-- Select Categorias -->
                        <div class="form-group col-sm-5 col-xs-12">
                            <label for="categoria_id">Categoria: </label>
                            <select name="categoria_id" class="form-control">
                            <option value="" selected="selected">Escolha uma Categoria</option>
                            <?php foreach ($categorias as $categoria) : ?>
                                <option value="<?= $categoria->id ?>"><?= $categoria->titulo_categoria ?></option>
                            <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-1 col-xs-0"></div>

                        <!-- Select Tags -->
                        <div class="form-group col-sm-5 col-xs-12">
                            <label for="tags">Tags: </label><br>
                            <select name="tags[]" id="select-tags" class="selectpicker" multiple="multiple">
                            <?php foreach ($tags as $tag) : ?>
                                <option value="<?= $tag->descricao_tag ?>"><?= $tag->descricao_tag ?></option>
                            <?php endforeach ?>
                            </select>
                        </div>

                    </fieldset>
                    </div>
                    <div class="form-group col-sm-2 col-xs-0"></div>
                </div>
                <!-- END FILTROS -->

            </form>
        </div>

    </div>
</div><!--contenAreaInner-->
<!-- END views/index.html -->