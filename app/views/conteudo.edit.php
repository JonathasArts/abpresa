<?php $path = RAIZ_PATH; ?>
<!-- views/categorias.create.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        <nav class="breadcrumb" style="padding-left:5em;margin-top:-3.5em;background-color:#fff;";>
            <div class="col-xs-10">
                <a class="breadcrumb-item" href="/abpresa/">Home</a> / 
                <a class="breadcrumb-item" href="/abpresa/dashboard/">Dashboard</a> / 
                <a class="breadcrumb-item" href="/abpresa/dashboard/">Boas Praticas</a> / 
                <a class="breadcrumb-item active" href="/abpresa/conteudo/edit/<?= $pratica->id ?>">Editar</a>
            </div>
            
            <div class="col-xs-2 dropdown text-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i><span class="caret"></span></a>
                <ul class="dropdown-menu text-center">
                    <li><a href="/abpresa/usuarios/show/<?= $_SESSION['id'] ?>">Perfil</a></li>
                    <li><a href="/abpresa/usuarios/edit/senha/<?= $_SESSION['id'] ?>">Mudar Senha</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/abpresa/logout/">Sair</a></li>
                </ul>
            </div>
        </nav>

        <header class="page-header text-center" style="margin-top:-.4em">
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-8"><h1><span>Editar Conteúdo - Boa Prática</span></h1></div>
                <div class="col-xs-2"><a href="/abpresa/dashboard/" class="btn btn-default">Cancelar</a></div>
            </div>
        </header>
        
        <div class="col-xs-1"></div>
        
        <div class="col-xs-10">
            <form method="POST" action="/abpresa/conteudo/edit/">
                <div class="card card-login card-hidden" style="padding: 2em"> 
                    
                    <div class="content">
                        <div class="form-group col-xs-12">
                            <label for="titulo_conteudo">Titulo</label>
                            <input type="text" name="titulo_conteudo" class="form-control" value="<?= $pratica->titulo_pratica ?>" required>
                        </div>

                        <div class="form-group col-xs-6">
                            <label for="categoria">Categoria</label>
                            <select name="categoria" class="form-control" style="height: 62px;" required>
                                <?php foreach ($categorias as $categoria) : ?>
                                    <?php if ($categoria->id == $pratica->categorias_id){
                                        echo "<option value='".$categoria->id."' selected>";
                                    } else {
                                        echo "<option value='".$categoria->id."'>";
                                    }
                                    ?>
                                    <?= $categoria->titulo_categoria ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group col-xs-6">
                            <label for="tags">Tags</label><br/>
                            <input type="text" name="tags" data-role="tagsinput" value="<?php foreach($tags_pratica as $tag){echo $tag->descricao_tag.',';}?>" class="bootstrap-tagsinput"/>
                        </div>

                        <div class="form-group col-xs-12">
                            <label for="descricao_conteudo">Descrição</label>
                            <textarea name="descricao_conteudo" cols="30" rows="5" class="form-control"><?= $pratica->descricao_pratica ?></textarea>
                        </div>

                        <div class="form-group col-xs-12">
                            <fieldset><legend><label for="" style="font-size:.7em;color:#abafb6;padding-left:1em;">Arquivos</label></legend>
                                <input id="upload_add" name="arquivos[]" type="file" multiple class="file-loading">
                            </fieldset>
                        </div>

                    </div>
                    <div class="text-right col-xs-12">
                        <div class="col-xs-8"><input type="hidden" name="id" value="<?= $pratica->id ?>"/></div>
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
    