<?php

include "../login/banco/cons.php";
require_once "../login/banco/DLL.php";

if (!isset($_SESSION)) {
    SESSION_START();
}

$id_usu = $_SESSION['ID_USU'];

$consulta = "SELECT * FROM usuario WHERE  Id = '$id_usu'";
$resultado = banco($server, $user, $password, $db, $consulta);
$linha = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/ca.css">
    <link rel="stylesheet" href="styles/media.css">
    <link rel="stylesheet" href="../home/styles/styles.css">
    <link rel="stylesheet" href="../home/styles/media.css">
    <title>VAL - Solicitar Acesso</title>
</head>

<body>

    <div id="carregamento">

        <div class="carregamento_container">

            <img src="../home/assets/loja_val.svg" class="onload_logo">

            <div class="circle_onload">

                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>

            </div>

        </div>

    </div>

    <div id="carrinho" class="carrinho_compra">

        <h1 class="carrinho_title"></h1>

        <div class="carrinho_container">

            <div class="carrinho_produtos"></div>

        </div>

    </div>

    <nav id="nav">

        <div class="nav_superior">
            <div class="right_btn">

                <div class="menu_perfil">
                    <a href="" class="perfil_link">
                        <?php echo $_SESSION['NOME_USU']; ?>
                    </a>
                    <a href="" class="perfil_link">lorem</a>
                    <a href="" class="perfil_link">lorem</a>
                    <a href="" class="perfil_link">lorem</a>
                    <form method="post" action="sair.php" class="sair_form">
                        <input type="submit" name="sair" value="sair" class="sair">
                    </form>
                </div>

                <div class="carrinho_btn">
                    <div class="img_anima_add_carrinho"></div>

                </div>

            </div>

        </div>

    </nav>

    <a href="../loja_logado/index.php" class="home"><img src="assets/seta.svg"></a>
    <div class="compra_avisos">
        <h1>Alguns avisos</h1>

        <p>Você poderá acompanha sua compra pelo por aq</p>
        
        <div class="prev_chegada">
            <p>Previsão de chagada para xxx</p>
            <p>O envio será feito pelo xxx</p>
            <p>frete: gratis</p>
        </div>
    </div>
    <div class="form_box">
        <img src="assets/loja_val.png" class="logo_loja">
        <form id="" method="post" action="processa_compra.php">

            <div id="resposta_cad" class="resposta">

            </div>

            <input type="text" name="nome" id="nome" placeholder="Nome Completo"
                value="<?php echo $_SESSION['NOME_USU'] ?>">
            <input type="email" name="email" id="email" placeholder="E-mail Corporativo"
                value="<?php echo $linha['Email'] ?>">
            <input type="text" name="cpf" id="cpf" placeholder="CPF" value="<?php echo $linha['Cpf'] ?>">

            <div class="ende_container">
                <input type="text" id="cidade" name="cidade" value="<?php echo $linha['Cidade'] ?>">

                <input type="text" name="cep" id="cep" placeholder="CEP" value="<?php echo $linha['Cep'] ?>">
            </div>

            <input type="text" name="bairro" id="bairro" placeholder="Bairro" value="<?php echo $linha['Bairro'] ?>">
            <input type="text" name="rua" id="rua" placeholder="Rua/Logradouro" value="<?php echo $linha['Rua'] ?>">
            <input type="text" name="numero" id="numero" placeholder="Número" value="<?php echo $linha['Numero'] ?>">


            <input type="submit" class="btn_comprar" name="cad" value="Finalizar_compra">

            <input type="hidden" class="carrinho_escondido" name="carrinho_escondido">
        </form>
    </div>


    <?php

    include "../login/banco/cons.php";
    require_once "../login/banco/DLL.php";

    $consulta = "SELECT * FROM produtos";
    $resultado = banco($server, $user, $password, $db, $consulta);

    $ids = [0];
    $nomes = [0];
    $descricoes = [0];
    $qtds_estoque = [0];
    $categorias = [0];
    $precos = [0];
    $imagens = [0];

    while ($linha = $resultado->fetch_assoc()) {

        array_push($ids, $linha['Id']);
        array_push($nomes, $linha['Nome']);
        array_push($descricoes, $linha['Descricao']);
        array_push($qtds_estoque, $linha['Qtd_estoque']);
        array_push($categorias, $linha['Categoria']);
        array_push($precos, $linha['Preco']);
        array_push($imagens, $linha['Imagem']);

    }

    $id_usu = (int) $_SESSION['ID_USU'];

    $consulta_carrinho = "
    SELECT Id,Usuario_id,Criado_em
    FROM carrinhos
    WHERE Usuario_id='$id_usu'
    LIMIT 1
";

    $resultado_carrinho = banco(
        $server,
        $user,
        $password,
        $db,
        $consulta_carrinho
    );

    $carrinho = $resultado_carrinho->fetch_assoc();

    if (!$carrinho) {
        echo "Carrinho não encontrado.";
        exit;
    }

    $carrinho_id = (int) $carrinho["Id"];

    $consulta_itens = "SELECT ci.Produto_id, ci.Quantidade, p.Nome, p.Preco FROM carrinho_itens AS ci INNER JOIN produtos AS p ON p.Id=ci.Produto_id WHERE ci.Carrinho_id='$carrinho_id'";

    $resultado_itens = banco($server, $user, $password, $db, $consulta_itens);

    $tamanho_carrinho = $resultado_itens->num_rows;

    $ids_carrinho = [];
    $nomes_carrinho = [];
    $qtds_carrinho = [];
    $precos_carrinho = [];

    while ($item = $resultado_itens->fetch_assoc()) {
        $ids_carrinho[] = (int) $item['Produto_id'];
        $nomes_carrinho[] = $item['Nome'];
        $qtds_carrinho[] = (int) $item['Quantidade'];
        $precos_carrinho[] = (float) $item['Preco'];
    }
    ?>

    <!-- Arquivo JavaScript -->
    <script>

        const tamanho_carrinho = <?php echo $tamanho_carrinho; ?>;
        const ids_carrinho = <?php echo json_encode($ids_carrinho); ?>;
        const nomes_carrinho = <?php echo json_encode($nomes_carrinho); ?>;
        const qtds_carrinho = <?php echo json_encode($qtds_carrinho); ?>;
        const precos_carrinho = <?php echo json_encode($precos_carrinho); ?>;

        const carrinho_com_conta = {};


        console.log("tamanho ", nomes_carrinho);

        // Pegando o conteúdo do banco para o JavaScript

        let ids = <?php echo json_encode($ids); ?>;
        let nomes = <?php echo json_encode($nomes); ?>;
        let descricoes = <?php echo json_encode($descricoes); ?>;
        let qtds_estoque = <?php echo json_encode($qtds_estoque); ?>;
        let categorias = <?php echo json_encode($categorias); ?>;
        let precos = <?php echo json_encode($precos); ?>;
        let imagens = <?php echo json_encode($imagens); ?>;

        let carrinho_produtos = document.querySelector(".carrinho_produtos");
        const prod_container = document.querySelector(".produtos_container");

        const total_produtos = ids.length;
        let produtos_html = "";

        console.log(total_produtos);
        console.log(ids);
    </script>

    <script>
        const input_carrinho = document.querySelector(".carrinho_escondido");
        input_carrinho.value = localStorage.getItem("carrinho");

    </script>

    <script src="script/ajax.js"></script>
    <script src="../loja_logado/script/carrinho_logado.js"></script>
    <script src="../home/script/script.js"></script>
     <script src="../home/script/produto.js"></script>
    <script src="../home/script/hero.js"></script>

</body>

</html>