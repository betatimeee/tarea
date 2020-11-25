<?php
require_once("includes/header.php");

if(!isset($_GET["id"])){
	mensagemErro::show("ID not passed to the URL");
}

$provedorPreview = new provedorPreview($con, $usuarioLogado);
echo $provedorPreview->criadorCategoriaPreview($_GET["id"]);

$containers = new categorias($con, $usuarioLogado);
echo $containers->mostrarCategorias($_GET["id"]);
?>