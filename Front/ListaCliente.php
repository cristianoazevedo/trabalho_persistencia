<?php
include_once("Sessao.php");
include_once("Valida.php");
include_once("Cabecalho.php");
include_once("./ControllerCliente.php");

if ($_GET && $_GET["msg"] && $_GET["tpMsg"]) {
    ?>
    <div class="alert alert-<?php echo $_GET["tpMsg"] ?>" role="alert"> 
        <strong> Atenção: </strong> <?php echo $_GET["msg"] ?>
    </div>
    <?php
}
?>

<div>   
    <a class="btn btn-success" href="FormCliente.php"> Novo Cliente </a>
</div>

<hr>

<div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                 <th class="col-md-1 text-center"> Cód. </th>
                <th class="col-md-3"> Nome </th>
                <th class="col-md-2 text-center"> Idade </th>
                <th class="col-md-2 text-center"> Cidade </th>
                <th class="col-md-2 text-center"> UF </th>
                <th class="col-md-2 text-center"> Ações </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (ControllerCliente::all() as $cliente) {

                $urlAlterar = "FormCliente.php?comando=U&idCliente={$cliente->getIdCliente()}";
                $urlExcluir = "FormCliente.php?comando=D&idCliente={$cliente->getIdCliente()}";
                $urlExcluir = "JavaScript:if(confirm('Deseja realmente excluir o cliente?')) { document.location.href='{$urlExcluir}' }";

                echo
                "<tr>
                        <td class='text-center'> {$cliente->getIdCliente()} </td>
                        <td> {$cliente->getNome()} </td>
                        <td class='text-center'> {$cliente->getIdade()} </td>
                        <td class='text-center'> {$cliente->getCidade()->getNome()} </td>
                        <td class='text-center'> {$cliente->getCidade()->getUf()} </td>
                        <td class='text-center'>
                            <a class='btn btn-warning' href='{$urlAlterar}'> Alterar </a>
                            <a class='btn btn-danger' href=\"{$urlExcluir}\"> Excluir </a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

</div>

<?php
include_once("Rodape.php");
?>