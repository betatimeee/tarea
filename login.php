<?php
require_once("includes/config.php");
require_once("includes/classes/formatadorForm.php");
require_once("includes/classes/constantes.php");
require_once("includes/classes/conta.php");

    $conta = new Conta($con);

	if (isset($_POST["botaoConfirmar"])) {
        $nomeUsuario =  formatadorForm::formatarUsuario($_POST["nomeUsuario"]);
        $senha =  formatadorForm::formatarSenha($_POST["senha"]);

        $sucesso = $conta->login($nomeUsuario, $senha);

        if($sucesso){
            $_SESSION["usuarioLogado"] = $nomeUsuario;
            header("Location: index.php");
        }
    }

    function salvaValor($nome){
        if(isset($_POST[$nome])){
        echo $_POST[$nome];
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Maraflix</title>
        <link rel="stylesheet" type="text/css" href="./assets/style/style.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    </head>

    <body>       
    <style type="text/css">
 h3,input,a { font-family: 'Montserrat', sans-serif; }
</style>

        <div class="cadastro">
            <div class="colunas">
            	<div class="header">
            		<img src="assets/images/l.png" title="Logo" alt="Logo do Site"/>   
            		<h3>Sign In</h3>   		
            	</div>
            	<form method="POST">
                    <?php echo $conta->getErro(constantes::$loginFalhou);?>
            		<input type="text" name="nomeUsuario" placeholder="Username" value="<?php salvaValor("nomeUsuario");?>" required>
            		<input type="password" name="senha" placeholder="Password" required>
            		<input type="submit" name="botaoConfirmar" value="LOGIN">
            	</form>
            	<a href="registro.php" class="mensagemEntrar">Don't have an account yet?<a href="registro.php" class="mensagemEntrar" style="color: #dc1928;">  Register here!</a></a>
            </div>
        </div>

 

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



    </body>
</html>