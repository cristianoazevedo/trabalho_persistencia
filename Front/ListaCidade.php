<?php
include_once("./Sessao.php");
include_once("./Valida.php");
include_once("./Cabecalho.php");
include_once("./ControllerCidade.php");

if ($_GET && $_GET["msg"] && $_GET["tpMsg"]) {
    ?>
    <div class="alert alert-<?php echo $_GET["tpMsg"] ?>" role="alert"> 
        <strong> Atenção: </strong> <?php echo $_GET["msg"] ?>
    </div>
    <?php
}
?>

<div>   
    <a class="btn btn-success" href="FormCidade.php"> Novo Cidade </a>
</div>

<hr>

<div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="col-md-2 text-center"> Código </th>
                <th class="col-md-6"> Nome </th>
                <th class="col-md-2 text-center"> UF </th>
                <th class="col-md-2 text-center"> Ações </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (ControllerCidade::all() as $cidade) {

                $urlAlterar = "FormCidade.php?comando=U&idCidade={$cidade->getIdCidade()}";
                $urlExcluir = "FormCidade.php?comando=D&idCidade={$cidade->getIdCidade()}";
                $urlExcluir = "JavaScript:if(confirm('Deseja realmente excluir o cidade?')) { document.location.href='{$urlExcluir}' }";

                echo
                "<tr>
                    <td class='text-center'> {$cidade->getIdCidade()} </td>
                    <td> {$cidade->getNome()} </td>
                    <td class='text-center'> {$cidade->getUf()} </td>
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