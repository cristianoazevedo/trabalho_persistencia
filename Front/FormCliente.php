<?php
include_once("./Sessao.php");
include_once("./Valida.php");
include_once("./ControllerCliente.php");
include_once("./ControllerCidade.php");

$cliente = ControllerCliente::build();

if ($_POST) {
    ControllerCliente::save($_POST);
    header("location: ListaCliente.php?tpMsg=success&msg=Cliente registrado com sucesso!");
    exit();
}

if ($_GET && isset($_GET["comando"])) {
    switch ($_GET["comando"]) {
        case "U":
            $idCliente = $_GET["idCliente"];

            if (!$cliente = ControllerCliente::get($idCliente)) {
                header("location: ListaCliente.php?tpMsg=danger&msg=Cliente não encontrado!");
                exit();
            }

            break;

        case "D":

            $idCliente = $_GET["idCliente"];

            if (ControllerCliente::delete($idCliente))
                header("location: ListaCliente.php?tpMsg=success&msg=Cliente excluido com sucesso!");
            else
                header("location: ListaCliente.php?tpMsg=danger&msg=Cliente não encontrado!");

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
            <input type="text" name="idCliente" class="form-control" readonly value="<?php echo $cliente->getIdcliente() ?>">
        </div>

        <div class="col-md-8 form-group">
            <label> Nome </label>
            <input type="text" name="nome" class="form-control" value="<?php echo $cliente->getNome() ?>" required>
        </div>

        <div class="col-md-2 form-group">
            <label> Idade </label>
            <input type="number" name="idade" class="form-control" value="<?php echo $cliente->getIdade() ?>" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 form-group">
            <label> Email </label>
            <input type="email" name="email" class="form-control" value="<?php echo $cliente->getEmail() ?>" required>
        </div>

        <div class="col-md-6 form-group">
            <label> Celular </label>
            <input type="text" name="celular" class="form-control" value="<?php echo $cliente->getCelular() ?>" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 form-group">
            <label> Cidade </label>
            <select name="idCidade" class="form-control" required>
                <option></option>
                <?php
                foreach (ControllerCidade::all() as $cidade) {
                    $selected = ($cliente->getCidade()) && $cliente->getCidade()->getIdCidade() == $cidade->getIdcidade() ? "selected" : "";
                    echo "<option value='{$cidade->getIdcidade()}' {$selected}> {$cidade->getNome()} </option>";
                }
                ?>
            </select>
        </div>

        <div class="col-md-4 form-group">
            <label> CEP </label>
            <input type="text" name="cep" class="form-control" value="<?php echo $cliente->getCep() ?>" required>
        </div>

        <div class="col-md-4 form-group">
            <label> Endereço </label>
            <input type="text" name="endereco" class="form-control" value="<?php echo $cliente->getEndereco() ?>" required>
        </div>


    </div>


    <div class="row pull-right">
        <div class="col-md-12 form-group">
            <a class="btn btn-danger" href="ListaCliente.php"> Cancelar </a>
            <button class="btn btn-success" type="submit"> Salvar </button>
        </div>
    </div>

</form>

<?php
include_once("Rodape.php");
?>