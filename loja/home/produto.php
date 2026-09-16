<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../home/styles/styles.css">
    <title>descrição produto</title>
</head>

<body>
    <h3 class="carrinho_mensagem">
        Produto já está no carrinho
    </h3>
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
                    <form method="post" action="processa_compra.php" class="compra_form">
                        <input type="submit" name="final_compra" value="Finalizar Compra">
                    </form>
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
                <div class="carrinho_btn">

                    <h3 class="contador_carrinho">
                        0
                    </h3>

                    <img src="../home/assets/carrinho_img.svg" class="carrinho_img">

                    <div class="img_anima_add_carrinho"></div>

                </div>

            </div>

        </div>
    </nav>
    <div id="produto_desc" class="prod_desc">

        <a href="../home/index.php" class="back_content">
            <img src="../home/assets/nav_links_seta.svg" class="prod_back">
        </a>

        <div class="prod_desc_topo">
            <div class="produto_desc_left">

                <div class="imagens_prod">
                    <div class="img_prod_content">
                        <img src="../home/assets/produtos_image/prod_1.jpg" class="prod_img_prod">
                    </div>
                </div>

                <h3 class="prod_desc_preco"></h3>

            </div>

            <div class="produto_desc_right">
                <h2 class="prod_desc_title"></h2>
                <p class="produto_desc_desc"></p>
                <a href="../login/login.php" class="comprar_btn">
                    Comprar
                </a>

                <div class="prod_quant">

                    <div class="prod_quant_container">
                        <img src="../home/assets/quant_prod.svg" class="quant_add">

                        <input type="text" value="1" class="quant_number desc_quant_number">

                        <img src="../home/assets/quant_prod_sub.svg" class="quant_remove">
                    </div>

                    <a class="btn_prod btn_prod_carrinho btn_prod_desc_carrinho">
                        Adicionar ao carrinho
                    </a>

                </div>

            </div>
        </div>

        <div class="prod_desc_baixo">
            <h1>Produtos da mesma</h1>
        </div>

    </div>


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

    ?>

    <!-- Arquivo JavaScript -->
    <script>

        // const local_id = localStorage.getItem();

        // Pegando o conteúdo do banco para o JavaScript

        let ids = <?php echo json_encode($ids); ?>;
        let nomes = <?php echo json_encode($nomes); ?>;
        let descricoes = <?php echo json_encode($descricoes); ?>;
        let qtds_estoque = <?php echo json_encode($qtds_estoque); ?>;
        let categorias = <?php echo json_encode($categorias); ?>;
        let precos = <?php echo json_encode($precos); ?>;
        let imagens = <?php echo json_encode($imagens); ?>;

        const carrinho_produtos = document.querySelector(".carrinho_produtos");
        const prod_container = document.querySelector(".prod_desc_baixo");

        // let total_produtos = ids.length;
        let produtos_html = "";

        let total_produtos = ids.length;
        console.log(total_produtos);
        console.log(ids);

        // Inserindo os produtos no HTML

        for (let i = 1; i < total_produtos; i++) {

            produtos_html += `
                <div class="produto p_${ids[i]}">

                    <a href="../home/produto.php" class="desc_link_${ids[i]}">
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

    <script src="../home/script/carrinho.js"></script>
    <script src="../home/script/script.js"></script>
    <script src="../home/script/produto.js"></script>
    <script src="../home/script/produto_desc.js"></script>
</body>

</html>