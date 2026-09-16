<?php
if (!isset($_SESSION)) {
    SESSION_START();
}

if ($_SESSION['LOGADO'] != 'LOGADO') {
    header("Location: ../login/login.php");
}

if ($_SESSION['COMPRA'] == 'COMPRA') {
    header("Location: ../login/compra.php");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KGIERR DRIVE</title>

    <link rel="stylesheet" href="../home/styles/styles.css">
    <link rel="stylesheet" href="../home/styles/media.css">
</head>

<body>

    <h3 class="carrinho_mensagem">
        Produto já está no carrinho
    </h3>

    <div class="popup_desc">
        Ver descrição
    </div>

    <div id="carrinho" class="carrinho">

        <h1 class="carrinho_title"></h1>

        <div class="carrinho_container">

            <div class="carrinho_produtos"></div>

            <div class="carrinho_sumario">

                <div class="sumario_title">

                    <h3 class="sumario_title_title">
                        Subtotal
                    </h3>

                    <h3 class="sumario_title_result">
                        R$ 0,00
                    </h3>

                </div>

                <div class="sumario_frete">

                    <h3 class="frete_title">
                        Frete
                    </h3>

                    <h3 class="frete_result">
                        0,00
                    </h3>

                </div>

                <div class="sumario_cupon">

                    <h3 class="sumario_cupon_title">
                        Cupom
                    </h3>

                    <input type="text" name="cupon" class="cupon" placeholder="Digite um cupom">

                </div>

                <div class="sumario_total">

                    <h3 class="sumario_total_title">
                        Total
                    </h3>

                    <h3 class="sumario_total_result">
                        R$ 0,00
                    </h3>

                </div>

                <button class="btn_sumario">
                    Finalizar compra
                </button>

            </div>

        </div>

    </div>

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

    <div class="html_progress"></div>

    <nav id="nav">

        <div class="nav_superior">

            <img src="../home/assets/loja_val.svg" class="logo_loja_img">

            <div class="pesquisa">

                <input type="search" id="pesquisa_input" placeholder="O que você procura?">

                <button class="pesquisar">
                    <img src="../home/assets/pesquisa_lupa.svg">
                </button>

            </div>

            <div class="right_btn">

                <a class="btn_prefil">
                    <!-- <img src=""> -->
                    perfil
                </a>

                <div class="menu_perfil">
                    <a href="" class="perfil_link"><?php echo $_SESSION['NOME_USU']; ?></a>
                    <a href="" class="perfil_link">lorem</a>
                    <a href="" class="perfil_link">lorem</a>
                    <a href="" class="perfil_link">lorem</a>
                    <form method="post" action="sair.php" class="sair_form">
                        <input type="submit" name="sair" value="sair" class="sair">
                    </form>
                </div>

                <div class="carrinho_btn">

                    <h3 class="contador_carrinho">
                        0
                    </h3>

                    <img src="../home/assets/carrinho_img.svg" class="carrinho_img">

                    <div class="img_anima_add_carrinho"></div>

                </div>

            </div>

        </div>

        <ul class="nav_links">

            <li>
                <div class="link_1">

                    <img src="../home/assets/nav_links_seta.svg" class="nav_links_seta">

                    <p>
                        Ofertas
                    </p>

                </div>
            </li>

            <li>
                <div class="link_2">

                    <img src="../home/assets/nav_links_seta.svg" class="nav_links_seta">

                    <p>
                        Plantas Decorativas
                    </p>

                </div>
            </li>

            <li>
                <div class="link_3">

                    <img src="../home/assets/nav_links_seta.svg" class="nav_links_seta">

                    <p>
                        Central
                    </p>

                </div>
            </li>

            <li>
                <div class="link_4">

                    <img src="../home/assets/nav_links_seta.svg" class="nav_links_seta">

                    <p>
                        Trabalhe conosco
                    </p>

                </div>
            </li>

            <div class="nav_links_itens">

                <div class="nav_links_item item_1">
                    1
                </div>

                <div class="nav_links_item item_2">
                    2
                </div>

                <div class="nav_links_item item_3">
                    3
                </div>

                <div class="nav_links_item item_4">
                    4
                </div>

            </div>

        </ul>

    </nav>

    <section id="hero">

        <a href="" class="hero_btn">
            Saiba Mais
        </a>

        <div class="carrossel">

            <div class="carrossel_container">

                <div class="carrossel_content content_1">

                    <img src="../home/assets/banner_3.jpg" class="banner" id="b_3">

                    <img src="../home/assets/banner_1.jpg" class="banner" id="b_1">

                    <img src="../home/assets/banner_2.jpg" class="banner" id="b_2">

                    <img src="../home/assets/banner_3.jpg" class="banner" id="b_3">

                    <img src="../home/assets/banner_1.jpg" class="banner" id="b_1">

                </div>

            </div>

        </div>

        <div class="banner_transformer">

            <button class="back">
                <img src="../home/assets/banner_transform.svg" class="back_image">
            </button>

            <button class="next">
                <img src="../home/assets/banner_transform.svg" class="next_image">
            </button>

        </div>

        <div class="banner_marker">

            <div class="marker marker_active m_1"></div>
            <div class="marker m_2"></div>
            <div class="marker m_3"></div>

        </div>

        <div class="side_bar">

            <div class="side_bar_container">

                <div class="side_bar_content">

                    <h4 class="side_bar_item">
                        CopaPromo 12%
                    </h4>

                    <h4 class="side_bar_item">
                        Site 100% Seguro
                    </h4>

                    <h4 class="side_bar_item">
                        Frete Grátis
                    </h4>

                    <h4 class="side_bar_item">
                        Entrega para todo o Brasil
                    </h4>

                    <h4 class="side_bar_item">
                        Cupons pra você aproveitar
                    </h4>

                </div>

                <div aria-hidden="true" class="side_bar_content">

                    <h4 class="side_bar_item">
                        CopaPromo 12%
                    </h4>

                    <h4 class="side_bar_item">
                        Site 100% Seguro
                    </h4>

                    <h4 class="side_bar_item">
                        Frete Grátis
                    </h4>

                    <h4 class="side_bar_item">
                        Entrega para todo o Brasil
                    </h4>

                    <h4 class="side_bar_item">
                        Cupons pra você aproveitar
                    </h4>

                </div>

            </div>

            <div class="borda_blur blur_left"></div>

        </div>

    </section>

    <main id="main">

        <section id="produtos">

            <!--
            <div class="prod_catalogo_itens">

                <a href="#sementes" class="cat_item">

                    <img
                        src="../home/assets/plantas.jpg"
                        class="cat_item_img"
                    >

                    <h4 class="cat_item_title">
                        Plantas
                    </h4>

                </a>

                <a href="#prod_pragas" class="cat_item">

                    <img
                        src="../home/assets/insetsida.svg"
                        class="cat_item_img"
                    >

                    <h4 class="cat_item_title">
                        Inseticidas
                    </h4>

                </a>

                <a href="#medidores" class="cat_item">

                    <img
                        src="../home/assets/adubo.svg"
                        class="cat_item_img"
                    >

                    <h4 class="cat_item_title">
                        Adubos
                    </h4>

                </a>

                <a href="#ferramentas" class="cat_item">

                    <img
                        src="../home/assets/ferramentas.svg"
                        class="cat_item_img"
                    >

                    <h4 class="cat_item_title">
                        Ferramentas
                    </h4>

                </a>

            </div>
            -->

            <div class="produtos_container"></div>

        </section>

    </main>

    <footer class="footer">

        <div class="footer_container">

            <div class="footer_desc">

                <div class="direitos">

                    <div class="footer_logo">

                        <img src="../home/assets/logo_footer.svg" class="footer_logo_img">

                        <strong>
                            VAL Plantios
                        </strong>

                    </div>

                    <h4>
                        Copyright 2026, todos os direitos reservados
                    </h4>

                    <h4>
                        Feito por Kaiki e Guilherme
                    </h4>

                </div>

                <div class="itens_footer">

                    <div class="item_footer"></div>
                    <div class="item_footer"></div>
                    <div class="item_footer"></div>
                    <div class="item_footer"></div>

                </div>

                <div class="footer_contact">

                    <div class="item_contact">

                        <p>
                            Instagram
                        </p>

                        <img src="../home/assets/insta.svg" class="img_contact">

                    </div>

                    <div class="item_contact">

                        <p>
                            Twitter
                        </p>

                        <img src="../home/assets/x.svg" class="img_contact">

                    </div>

                    <div class="item_contact">

                        <p>
                            Git
                        </p>

                        <img src="../home/assets/git.svg" class="img_contact">

                    </div>

                </div>

                <div class="footer_nav">

                    <ul class="footer_nav_container">

                        <a href="">
                            Home
                        </a>

                        <a href="">
                            Sobre
                        </a>

                        <a href="">
                            Produtos
                        </a>

                        <a href="">
                            Serviços
                        </a>

                        <a href="">
                            Trabalhe conosco
                        </a>

                        <a href="">
                            Agro
                        </a>

                    </ul>

                    <div class="footer_right right_btn">

                        <a href="" class="btn log_btn">
                            Login
                        </a>

                        <a href="" class="btn start_btn">
                            Voltar
                        </a>

                    </div>

                </div>

            </div>

            <img src="../home/assets/footer.svg">

        </div>

    </footer>

    <!-- Importando o Lenis -->
    <script src="https://unpkg.com/lenis@1.3.23/dist/lenis.min.js"></script>

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

        // Inserindo os produtos no HTML

        for (let i = 1; i < total_produtos; i++) {

            carrinho_com_conta[ids_carrinho[i]] = qtds_carrinho[i];

            produtos_html += `
                <div class="produto p_${ids[i]}">

                    <a href="../loja_logado/produto.php" class="desc_link_${ids[i]}">
                        <img
                            src="../home/${imagens[i]}"
                            class="prod_img"
                        >
                    </a>

                    <h3 class="prod_title prod_title_${ids[i]}"></h3>

                    <div class="prod_preco">

                        <h4 class="preco_${ids[i]}">
                            ${"R$ " +
                Number(precos[i])
                    .toFixed(2)
                    .toString()
                    .replace(".", ",")
                }
                        </h4>

                    </div>

                    <a class="btn_prod btn_prod_${ids[i]}">
                        Comprar
                    </a>

                    <div class="prod_quant">

                        <div class="prod_quant_container">

                            <img
                                src="../home/assets/quant_prod.svg"
                                class="prod_quant_add prod_quant_add_${ids[i]}"
                            >

                            <input
                                type="text"
                                value="1"
                                class="quant_prod_number quant_prod_number_${ids[i]}"
                            >

                            <img
                                src="../home/assets/quant_prod.svg"
                                class="prod_quant_remove prod_quant_remove_${ids[i]}"
                            >

                        </div>

                        <a class="btn_prod btn_prod_carrinho btn_carrinho_${ids[i]}">
                            Add ao carrinho
                        </a>

                    </div>

                </div>
            `;

            prod_container.innerHTML = produtos_html;

        }

    </script>

    <script src="../loja_logado/script/carrinho_logado.js"></script>
    <script src="../home/script/script.js"></script>
    <script src="../home/script/produto.js"></script>
    <script src="../home/script/hero.js"></script>

</body>

</html>