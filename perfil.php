<?php
require_once("includes/header.php");
require_once("includes/classes/conta.php");
require_once("includes/classes/formatadorForm.php");
require_once("includes/classes/constantes.php");

$mensagemDetalhes = "";
$mensagemSenhas = "";

if(isset($_POST["botaoSalvarDetalhes"])){
    $conta = new conta($con);

    $nome = formatadorForm:: formatarString($_POST["nome"]);
    $sobrenome = formatadorForm:: formatarString($_POST["sobrenome"]);
    $email = formatadorForm:: formatarEmail($_POST["email"]);

    if($conta->atualizarDetalhes($nome, $sobrenome, $email, $usuarioLogado)){
        // Dados alterados com sucesso
        $mensagemDetalhes = "<div class='alertaSucesso'>
        Successfully changed data!
                            </div>";
    }
    else{
        // Falha ao alterar dados
        $mensagemErro = $conta->getPrimeiroErro();

        $mensagemDetalhes = "<div class='alertaErro'>
                                $mensagemErro
                            </div>";
    }
}

if(isset($_POST["botaoSalvarSenhas"])){
    $conta = new conta($con);

    $senhaAntiga = formatadorForm:: formatarSenha($_POST["senhaAntiga"]);
    $novaSenha = formatadorForm:: formatarSenha($_POST["novaSenha"]);
    $novaSenha2 = formatadorForm:: formatarSenha($_POST["novaSenha2"]);

    if($conta->atualizarSenha($senhaAntiga, $novaSenha, $novaSenha2, $usuarioLogado)){
        // Dados alterados com sucesso
        $mensagemSenhas = "<div class='alertaSucesso'>
        Password changed successfully!
                            </div>";
    }
    else{
        // Falha ao alterar dados
        $mensagemErro = $conta->getPrimeiroErro();

        $mensagemSenhas = "<div class='alertaErro'>
                                $mensagemErro
                            </div>";
    }
}



?>

<div class="containerConfiguracoes colunas">

    <div class="formSection">

        <form method="POST">

            <h2>Profile</h2>

            <?php
            $usuario = new Usuario($con, $usuarioLogado);

            $nome = isset($_POST["nome"]) ? ($_POST["nome"]) : $usuario->getNome();
            $sobrenome = isset($_POST["sobrenome"]) ? ($_POST["sobrenome"]) : $usuario->getSobrenome();
            $email = isset($_POST["email"]) ? ($_POST["email"]) : $usuario->getEmail();
            
            ?>

            <input type="text" name="nome" placeholder="Name" value="<?php echo $nome; ?>">
            <input type="text" name="sobrenome" placeholder="Last Name" value="<?php echo $sobrenome; ?>">
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">

            <div class="mensagem">
                <?php echo $mensagemDetalhes; ?>
            </div>

            <input type="submit" name="botaoSalvarDetalhes" value="Save">

        </form>

    </div>

    <div class="formSection">

        <form method="POST">

            <h2>Edit Profile</h2>

            <input type="password" name="senhaAntiga" placeholder="Old password">
            <input type="password" name="novaSenha" placeholder="New password">
            <input type="password" name="novaSenha2" placeholder="Confirm New password">

            <div class="mensagem">
                <?php echo $mensagemSenhas; ?>
            </div>

            <input type="submit" name="botaoSalvarSenhas" value="Update" style="cursor:pointer">
            
            
            <a href="delete.php" class="botaoExcluir">Delete account</a>
            
            <style>
                a.botaoExcluir {
	background-color: #DC1928;
	color: #fff;
	height: 30px;
	width: 160px;
	border: none;
	border-radius: 2px;
	font-weight: 800;
	/*margin-top: 10px;*/
	margin-bottom: 20px;
	font-size: 16px;
	appearance: push-button;
    user-select: none;
    white-space: pre;
    align-items: flex-start;
    text-align: center;
    cursor: default;
    box-sizing: border-box;
	padding: 4px 10px;
	cursor:pointer;
}
                </style>

        </form>

    </div>

</div>