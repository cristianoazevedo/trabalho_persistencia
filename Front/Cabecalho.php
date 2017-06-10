<!DOCTYPE html>
<html>
    <head>
        <title> WEBDEV </title>
        <meta charset="UTF-8">
        <link href="./Lib/bootstrap.min.css" rel="stylesheet">
        <link href="./Lib/theme.css" rel="stylesheet">
        <script type="text/javascript" src="./Lib/jquery.min.js"></script>
        <script type="text/javascript" src="./Lib/bootstrap.min.js"></script>
    </head>
    <body>        
        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">WEBDEV</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <?php if ($_SESSION["LOGADO"]) { ?>
                            <li class="active"><a href="index.php">Home</a></li>                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cadastros <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="ListaCidade.php">Cidade</a></li>
                                    <li><a href="ListaCliente.php">Cliente</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="Logout.php">Sair</a></li>
                        </ul>
                    <?php } ?>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">