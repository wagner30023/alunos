<?php require_once("./app/class/autoload.php"); ?>

<?php
// Active na página atual
$active = "index";
if (isset($_GET['active']))
    $active = $_GET['active'];
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> SISUNEB </title>

        <!-- Bootstrap -->
        <link href="./app/css/login.css" rel="stylesheet">
        <link href="./app/css/bootstrap.min.css" rel="stylesheet">
        <!-- Próprios estilos -->
        <link href="./app/css/style.css" rel="stylesheet">
        <script type="text/javascript" src="./app/js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="./app/js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="./app/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./app/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="./app/js/scripts.js"></script>

    </head>
    <body>

        <div class="container">

            <header class="row header">
                <div class="col-sm-12">

                    <!-- Logo do topo -->
                    <a href="index.php" class="header-logo">
                        <img src="./app/img/logo-header.jpg" alt="Logo">
                    </a>

                    <!-- Nav geral -->
                    <ul class="header-nav">
                        <li class="header-nav-item <?php if ($active == "index") echo "active" ?>" title="Index">
                            <a href="index.php?active=index" class="btn btn-primary btn-nav"><span class="glyphicon glyphicon-home"></span></a>
                        </li>

                        <li class="header-nav-item <?php if ($active == "listar") echo "active" ?>" title="Listar">
                            <a href="listar.php?active=listar" class="btn btn-primary btn-nav"><span class="glyphicon glyphicon-list"></span></a>
                        </li>
                        <li class="header-nav-item <?php if ($active == "cadastrar") echo "active" ?>"  title="Cadastrar">
                            <a href="cadastrar.php?active=cadastrar" class="btn btn-primary btn-nav"><span class="glyphicon glyphicon-plus"></span></a>
                        </li>
                    </ul> <!-- end .header-nav -->

                </div> <!-- end .col-sm-12 -->
            </header> <!-- end header -->

