<?php
//session_start();
if (!$_SESSION["validar"]) {
    header ("location:index.php?action=ingresar");
}
$nom = $_SESSION["usuario"];
?>
<h1> Bienvenido <?= $nom ?></h1>