<?php $path = RAIZ_PATH; ?>
<!-- template/sidebar.html -->
<header class="doc-header" style="width: 15em;">
    <div class="logoWrap">
        <img src="<?php echo $path ?>/app/assets/img/logo.png" alt="GPES" whidt="100px"> <!-- Adicionar Logo aqui -->
    </div>
    <a href="#" class="nav-trigger"><i class="fa fa-navicon"></i></a>
     <ul class="main-nav">
        <li class="active"><a href="/abpresa/dashboard/" class="btn-menu">DASHBOARD</a></li>
        <li><a href="" class="btn-menu">...</a></li>
        <li><a href="" class="btn-menu">...</a></li>
    </ul>
    <!-- <ul class="socialLinks">
        <li><a href="http://facebook.com/" target="_blank"><i class="fa fa-home"></i></a></li>
        <li><a href="http://facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a href="http://facebook.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li><a href="http://facebook.com/" target="_blank"><i class="fa fa-github"></i></a></li>
    </ul> -->
    <span class="copyRights"><small>&copy; 2017 - GPES-IFPB <br/> Todos os direitos reservados</small></span>
</header>
<!-- END template/sidebar.html -->

<?php if(!empty($msg)) : ?>
    <script>
        window.onload = function() {
            setTimeout(function() {
                alertMSG('<?= $msg ?>');
            },50);
        }
    </script>
<?php endif ?>

<?php if(!empty($_SESSION['msgE'])) : ?>
    <script>
        window.onload = function() {
            setTimeout(function() {
                alertERR('<?= $_SESSION['msgE'] ?>');
            },50);
        }
    </script>
    <?php $_SESSION['msgE'] = ""; ?>
<?php endif ?>