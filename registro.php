<?php
require_once("includes/config.php");
require_once("includes/classes/formatadorForm.php");
require_once("includes/classes/constantes.php");
require_once("includes/classes/conta.php");

	$conta = new Conta($con);

	if (isset($_POST["botaoConfirmar"])) {
		$nome =  formatadorForm::formatarString($_POST["nome"]);
		$sobrenome =  formatadorForm::formatarString($_POST["sobrenome"]);
		$nomeUsuario =  formatadorForm::formatarUsuario($_POST["nomeUsuario"]);
		$email =  formatadorForm::formatarEmail($_POST["email"]);
		$email2 =  formatadorForm::formatarEmail($_POST["email2"]);
		$senha =  formatadorForm::formatarSenha($_POST["senha"]);
		$senha2 =  formatadorForm::formatarSenha($_POST["senha2"]);

		$sucesso = $conta->registro($nome, $sobrenome, $nomeUsuario, $email, $email2, $senha, $senha2);

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
        <link rel="stylesheet" type="text/css" href="assets/style/style.css"/>
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
            		<h3>Register</h3> 		
            	</div>
            	<form method="POST">
            		<?php echo $conta->getErro(constantes::$caracteresNome);?>
            		<input type="text" name="nome" placeholder="Name" value="<?php salvaValor("nome");?>" required>
            		<?php echo $conta->getErro(constantes::$caracteresSobrenome);?>
            		<input type="text" name="sobrenome" placeholder="Last Name" value="<?php salvaValor("sobrenome");?>" required>
            		<?php echo $conta->getErro(constantes::$caracteresNomeUsuario);?>
            		<?php echo $conta->getErro(constantes::$nomeUsuarioUsado);?>
            		<input type="text" name="nomeUsuario" placeholder="Username" value="<?php salvaValor("nomeUsuario");?>" required>
            		<?php echo $conta->getErro(constantes::$emailInvalido);?>
            		<?php echo $conta->getErro(constantes::$emailUsado);?>
            		<input type="email" name="email" placeholder="Email" value="<?php salvaValor("email");?>" required>
            		<?php echo $conta->getErro(constantes::$emailNaoConfere);?>
            		<input type="email" name="email2" placeholder="Confirm e-mail" value="<?php salvaValor("email2");?>" required>
            		<?php echo $conta->getErro(constantes::$caracteresSenha);?>
            		<input type="password" name="senha" placeholder="Password" required>
            		<?php echo $conta->getErro(constantes::$senhaNaoConfere);?>
            		<input type="password" name="senha2" placeholder="Confirm Password" required>
            		<input type="submit" name="botaoConfirmar" value="Register">
            	</form>
            	<a href="login.php" class="mensagemCadastro">Already have an account? <a href="login.php" class="mensagemEntrar" style="color: #dc1928;">Sign in</a></a>
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