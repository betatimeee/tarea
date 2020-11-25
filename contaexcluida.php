<?php

    require_once("includes/config.php");
    require_once("includes/classes/formatadorForm.php");
    require_once("includes/classes/constantes.php");
    require_once("includes/classes/conta.php");
    
?>

<!DOCTYPE html>
<html>

<head>

    <head lang="pt-br">
        <meta charset="UTF-8">
        <title>Bye</title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css" />


        <script type="text/javascript">
        var contador = 15;

        function contar() {
            document.getElementById('contador').innerHTML = contador;
            contador--;
        }

        function redirecionar() {
            contar();
            if (contador == 0) {
                document.location.href = 'logoutexclusao.php';
            }
        }
        setInterval(redirecionar, 1000);
        </script>

    </head>

<body>
    <div class="cadastro">
        <div class="colunas">
            <div class="header">
                <img src="assets/images/l.png" title="Logo" alt="Logo do Site" />
                <b>
                    <h1 style="text-align: left;">We'll miss you</h1>
                        <p>You'll be redirected in <label id="contador"></label> seconds.</p>
                        <h6>If it doesn't, <a href="logoutexclusao.php" style="color: #dc1928;">click here</a></h6>
                </b>
            </div>
        </div>
    </div>
</body>

</html>