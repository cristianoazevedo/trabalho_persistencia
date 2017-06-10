<?php
include_once("Sessao.php");

if ($_POST) {
    $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : false;
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : false;

    if ($usuario == "admin" && $senha == "admin") {
        $_SESSION["LOGADO"] = true;
        header("location: index.php");
        exit();
    }
}
?>

<?php
include_once("Cabecalho.php");
?>

<form action="" method="POST">

    <div class="row">
        <div class="col-md-12 form-group">
            <label> Usuário </label>
            <input type="text" name="usuario" class="form-control" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 form-group">
            <label> Senha </label>
            <input type="password" name="senha" class="form-control" required>
        </div>
    </div>

    <div class="row pull-right">
        <div class="col-md-12 form-group">
            <button class="btn btn-success" type="submit"> Entrar </button>
        </div>
    </div>

</form>

<?php
include_once("Rodape.php");
?>