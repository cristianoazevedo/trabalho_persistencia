<?php

if (!$_SESSION["LOGADO"]) {
    header("location: FormLogin.php");
    exit();
}
?>
