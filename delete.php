<?php

    require_once("includes/config.php");
    require_once("includes/classes/formatadorForm.php");
    require_once("includes/classes/constantes.php");
    require_once("includes/classes/conta.php");
    
    $conta = new Conta($con);

    if(isset($_POST["botaoConfirmar"])){
        header('Location: contaexcluida.php');
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css"/>
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
        <div class="cadastro">
            <div class="colunas">
            	<div class="header">
            		<img src="assets/images/l.png" title="Logo" alt="Logo do Site"/>   
            		<b><h1 style="text-align: left;">Are you sure?</h3>
                    <span style="text-align: justify;">This cannot be undone.</span>   </b>		
                </div>
                
            	<form method="POST">
                    
                    <span>
                        <a href="perfil.php" class="botaoCancelar">Go back</a>
                        <input type="submit" name="botaoConfirmar" value="Delete" style="cursor:pointer">
                    </span>
                </form>                           	
            </div>
        </div>
    </body>
</html>   