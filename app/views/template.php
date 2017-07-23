<!doctype html>
<html lang="pt-BR">

<!-- template/head.php -->
<?php include_once("template/head.php") ?>

<body>
    <div class="bodyWrap">

        <?php if(empty($_SESSION['username'])) : ?>
            <!-- template/sidebar.php -->
            <?php include_once("template/sidebar.php") ?>
            <!-- template/optionsPanel.php -->
            <?php include_once("template/optionsPanel.php") ?>
        
        <main class="contentArea">

        <?php else : ?>
            <!-- template/sidebar.admin.php -->
            <?php include_once("template/sidebar.admin.php") ?>
            <!-- template/optionsPanel.php -->
            <?php include_once("template/optionsPanel.php") ?>
        
        <main class="contentArea" style="padding-left: 160px !important;">
        
        <?php endif ?>

            <?php 
                if (isset($viewName)) { 
                    $path = viewsPath() . $viewName . '.php'; 
                    if (file_exists($path)) { 
                        require_once $path; 
                    } 
                } 
            ?>

        </main>
    </div>
    <!-- template/modals.php -->
    <?php include_once("template/modals.php") ?>
    <!-- template/scripts.php -->
    <?php include_once("template/scripts.php") ?>
    
</body>
</html>
