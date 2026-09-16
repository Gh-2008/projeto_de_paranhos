<?php

if (!isset($_SESSION)) {
    SESSION_START();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/ca.css">
    <link rel="stylesheet" href="styles/media.css">
    <title>VAL - Entrar no Sistema</title>
</head>

<body>
    <a href="../home/index.php" class="home"><img src="assets/seta.svg"></a>

    <div class="form_box">
        <img src="assets/loja_val.png" class="logo_loja">
        <form id="logform" method="post" action="processa_login.php">

            <div id="resposta_login" class="resposta">

            </div>
            <input type="text" name="cpf" id="cpf" placeholder="CPF">
            <input type="password" name="senha" id="senha" placeholder="Definir Senha de Acesso">
            <input type="submit" class="btn" name="btn_logar" value="Entrar">

            <div class="register-link">
                <p>não possui uma conta? <br> cadastre-se <a href="cad.php">ir ao cadastro</a></p>
            </div>
        </form>
    </div>


    <script src="script/ajax.js"></script>
</body>

</html>