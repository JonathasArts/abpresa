<?php $path = RAIZ_PATH; ?>
<!-- views/categorias.html -->
<div class="contentAreaInner clearfix no-pad-left no-pad-right">
    <div class="row">
        
        <nav class="breadcrumb" style="padding-left:5em;margin-top:-3.5em;background-color:#fff;";>
            <div class="col-xs-10">
                <a class="breadcrumb-item" href="/abpresa/">Home</a> / 
                <a class="breadcrumb-item" href="/abpresa/dashboard/">Dashboard</a> / 
                <a class="breadcrumb-item active" href="/abpresa/categorias/">Categoria</a>
            </div>
            <div class="col-xs-2 dropdown text-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gear"></i><span class="caret"></span></a>
                <ul class="dropdown-menu text-center">
                    <li><a href="/abpresa/usuarios/show/<?= $_SESSION['id'] ?>">Perfil</a></li>
                    <li><a href="/abpresa/usuarios/edit/senha/<?= $_SESSION['id'] ?>">Mudar senha</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/abpresa/logout/">Sair</a></li>
                </ul>
            </div>
        </nav>

        <div class="text-center">
            <hr>
            <div class="row">
                <a href="/abpresa/dashboard/" class="btn btn-default btn-menu-list"><i class='fa fa-list'></i> Boas praticas</a>
                <a href="/abpresa/categorias/" class="btn btn-default btn-menu-list active"><i class='fa fa-th-list'></i> Categorias</a>
                <a href="/abpresa/usuarios/" class="btn btn-default btn-menu-list"><i class='fa fa-list-alt'></i> Usuários</a>
            </div><hr>

            <div class="row">
                <div class="col-xs-1"></div>
        
                <div class="col-xs-10">
                    
                    <div class="header">
                        <h2 class="title"><strong><span>Categorias cadastradas</span></strong></h2>
                    </div>

                    <div class="text-left" style="margin-bottom:2em">
                        <a href="/abpresa/categorias/add/" class="btn btn-default btn-menu-list"><i class='fa fa-plus'></i> Nova categoria</a>
                    </div>

                    <div class="content">
                    <?php if(!empty($categorias)) :?>
                        <div class="table-responsive text-left">
                            <table id="table-categorias" class="table tablesorter">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>CATEGORIA</th>
                                        <th class="text-center">OPÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categorias as $categoria) :?>
                                        
                                        <tr>
                                            <td><?= $categoria->id ?></td>
                                            <td>
                                                <?= $categoria->titulo_categoria ?>
                                            </td>
                                            <td class="text-center" style="width: 8em">
                                                <a href="/abpresa/categorias/edit/<?= $categoria->id ?>" class="col-xs-6" style="color: #ebc867" title="Editar"><i class="fa fa-edit"></i></a>
                                                
                                                <a href="#" class="col-xs-6" data-pathid="/abpresa/categorias/remove/<?= $categoria->id ?>" data-msg="Categoria <?= $categoria->titulo_categoria ?>" onclick="modalRemove(this)" style="color: #d63123" title="Excluir"><i class="fa fa-close"></i></a> 
                                            </td>
                                        </tr>
                                        
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <?php if($qtdepages > 1) : ?>
                            <div class="row">
                                <hr>
                                <div class="text-left col-sm-4">
                                   <strong> Exibindo <?= count($categorias) ?> de <?= $qtdereg ?> registros</strong>
                                </div>

                                <div class="text-right col-sm-8">
                                    <?php 
                                        if ($qtdepages > 1) {
                                            echo "<ul class='pagination pagination-mine' style='margin:0;'>";
                                            
                                            echo "<li class='active' ><a href='/abpresa/categorias/?page=1'><i class='fa fa-angle-double-left'></i></a></li>";
                                            for($i = 0; $i < $qtdepages; $i++){
                                                $b = $i + 1;
                                                if ($b == $numpage){ echo "<li class='active'>";}else{echo "<li>";}
                                                echo "<a href='/abpresa/categorias/?page=".$b."'>".$b."</a></li>";
                                            } 

                                            if($page < $qtdepages){
                                                echo "<li class='active' ><a href='/abpresa/categorias/?page=".$qtdepages."'><i class='fa fa-angle-double-right'></i></a></li>";
                                            }

                                            echo "</ul>";
                                        }
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php else:?>
                        <div class="alert alert-danger">
                            <span>
                                <a href="" style="color: red">
                                <strong> Não Existem categorias cadastradas. </strong>
                                Cadastre uma nova categoria   &nbsp     
                                <i class="zpdi ti-plus"></i></a>
                            </span>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>

                <div class="col-xs-1"></div>

            </div>
        </div>
    </div>
</div><!--contenAreaInner-->
<!-- END views/categorias.html -->