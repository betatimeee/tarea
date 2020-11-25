<?php
require_once("includes/config.php");
require_once("includes/classes/provedorPreview.php");
require_once("includes/classes/categorias.php");
require_once("includes/classes/entidade.php");
require_once("includes/classes/provedorEntidade.php");
require_once("includes/classes/mensagemErro.php");
require_once("includes/classes/provedorTemporadas.php");
require_once("includes/classes/temporada.php");
require_once("includes/classes/provedorVideo.php");
require_once("includes/classes/video.php");
require_once("includes/classes/usuario.php");

if(!isset($_SESSION["usuarioLogado"])){
	header("Location: registro.php");
}

$usuarioLogado = $_SESSION["usuarioLogado"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Maraflix</title>
        <link rel="stylesheet" type="text/css" href="./assets/style/style.css"/>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/9e77834378.js" crossorigin="anonymous"></script>
        <script src="assets/js/script.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">


    </head>

    <body>        
    <style type="text/css">
 h3,input,a,h4 { font-family: 'Montserrat', sans-serif; }
 .tegorias {
     margin-left:10vmin;
 }
 

</style>

<script>
      $(document).ready(function() {
          $("body").on("contextmenu", function(e) {
              return false;
            });
        });


		$(document).keydown(function (event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
})
    </script>




    	<div class="wrapper">
    		
<?php
    if(!isset($escondeBarraNaveg)){
        include_once("includes/barraNaveg.php");
    }
?>
