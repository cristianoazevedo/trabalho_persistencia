<?php
include_once("./Sessao.php");
include_once("./Valida.php");
include_once("./ControllerCidade.php");

$cidade = ControllerCidade::build();

if ($_POST) {
    ControllerCidade::save($_POST);
    header("location: ListaCidade.php?tpMsg=success&msg=Cidade registrado com sucesso!");
    exit();
}

if ($_GET && isset($_GET["comando"])) {
    switch ($_GET["comando"]) {
        case "U":
            $idCidade = $_GET["idCidade"];

            if (!$cidade = ControllerCidade::get($idCidade)) {
                header("location: ListaCidade.php?tpMsg=danger&msg=Cidade não encontrado!");
                exit();
            }

            break;

        case "D":

            $idCidade = $_GET["idCidade"];

            if (ControllerCidade::delete($idCidade))
                header("location: ListaCidade.php?tpMsg=success&msg=Cidade excluido com sucesso!");
            else
                header("location: ListaCidade.php?tpMsg=danger&msg=Cidade não encontrado!");

            exit();

            break;
    }
}
?>

<?php
include_once("Cabecalho.php");
?>

<form action="" method="POST">

    <div class="row">
        <div class="col-md-2 form-group">
            <label> Código </label>
            <input type="text" name="idCidade" class="form-control" readonly value="<?php echo $cidade->getIdcidade() ?>">
        </div>
    </div>
    <div class="row">

        <div class="col-md-8 form-group">
            <label> Nome </label>
            <input type="text" name="nome" class="form-control" value="<?php echo $cidade->getNome() ?>" required>
        </div>

        <div class="col-md-4 form-group">
            <label> UF </label>
            <input type="text" name="uf" class="form-control" value="<?php echo $cidade->getUf() ?>" required maxlength="2">
        </div>
    </div>

    <div class="row pull-right">
        <div class="col-md-12 form-group">
            <a class="btn btn-danger" href="ListaCidade.php"> Cancelar </a>
            <button class="btn btn-success" type="submit"> Salvar </button>
        </div>
    </div>

</form>

<?php
include_once("Rodape.php");
?>