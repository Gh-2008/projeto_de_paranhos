<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/ca.css">
    <link rel="stylesheet" href="styles/media.css">
    <title>VAL - Solicitar Acesso</title>
</head>

<body>
    <a href="../home/index.php" class="home"><img src="assets/seta.svg"></a>
    <div class="form_box">
        <img src="assets/loja_val.png" class="logo_loja">
        <form id="cadform" method="post" action="processa_cad.php">

            <div id="resposta_cad" class="resposta">

            </div>

            <input type="text" name="nome" id="nome" placeholder="Nome Completo">
            <input type="email" name="email" id="email" placeholder="E-mail Corporativo">
            <input type="text" name="cpf" id="cpf" placeholder="CPF">

            <select id="estado" name="estado">
                <option value="">Selecione um estado</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
            <div class="ende_container">
                <select id="cidade" name="cidade">
                    <option value="">Selecione uma cidade</option>
                </select>

                <input type="text" name="cep" id="cep" placeholder="CEP">
            </div>

            <input type="text" name="bairro" id="bairro" placeholder="Bairro">
            <input type="text" name="rua" id="rua" placeholder="Rua/Logradouro">
            <input type="text" name="numero" id="numero" placeholder="Número">

            <div class="pass_container">
                <input type="password" name="senha" id="senha" placeholder="Definir Senha de Acesso">
                <input type="password" name="confirmarsenha" id="confirmarsenha" placeholder="Confirmar Senha">
            </div>
            <input type="submit" class="btn" name="cad" value="Cadastrar">

            <div class="register-link">
                <p>Já possui credenciais? <a href="login.php">Voltar ao login</a></p>
            </div>

            <input type="hidden" class="carrinho_escondido" name="carrinho_escondido">
        </form>
    </div>


    <script>
        const input_carrinho = document.querySelector(".carrinho_escondido");
        input_carrinho.value = localStorage.getItem("carrinho");

    </script>

    <script src="script/ajax.js"></script>
</body>

</html>