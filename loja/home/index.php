<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KGIERR DRIVE</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/media.css">
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
                        Cupon
                    </h3>
                    <input type="text" name="cupon" class="cupon" placeholder="Digite um cupon">
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
            <img src="assets/loja_val.svg" class="onload_logo">
            <div class="circle_onload">
                <div class="circle">

                </div>
                <div class="circle">

                </div>
                <div class="circle">

                </div>
            </div>
        </div>
    </div>
    <div class="html_progress">

    </div>

    <nav id="nav">
        <div class="nav_superior">
            <img src="assets/loja_val.svg" class="logo_loja_img">
            <div class="pesquisa">
                <input type="search" id="pesquisa_input" placeholder="O que você procura?">
                <button class="pesquisar">
                    <img src="assets/pesquisa_lupa.svg">
                </button>
            </div>
            <div class="right_btn">
                <a href="../login/login.php" class="btn log_btn">
                    Login
                </a>
                <div class="carrinho_btn">
                    <h3 class="contador_carrinho">0</h3>
                    <img src="assets/carrinho_img.svg" class="carrinho_img">
                    <div class="img_anima_add_carrinho"></div>
                </div>
            </div>
        </div>
        <ul class="nav_links">
            <li>
                <div class="link_1">
                    <img src="assets/nav_links_seta.svg" class="nav_links_seta">
                    <p>
                        Ofertas
                    </p>
                </div>
            </li>
            <li>
                <div class="link_2">
                    <img src="assets/nav_links_seta.svg" class="nav_links_seta">
                    <p>
                        Plantas Decorativas
                    </p>
                </div>
            </li>
            <li>
                <div class="link_3">
                    <img src="assets/nav_links_seta.svg" class="nav_links_seta">
                    <p>
                        Central
                    </p>
                </div>
            </li>
            <li>
                <div href="" class="link_4">
                    <img src="assets/nav_links_seta.svg" class="nav_links_seta">
                    <p>
                        Trabalhe conosco
                    </p>
                </div>
            </li>
            <div class="nav_links_itens">
                <div class="nav_links_item item_1">1</div>
                <div class="nav_links_item item_2">2</div>
                <div class="nav_links_item item_3">3</div>
                <div class="nav_links_item item_4">4</div>
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
                    <img src="assets/banner_3.jpg" class="banner" id="b_3">
                    <img src="assets/banner_1.jpg" class="banner" id="b_1">
                    <img src="assets/banner_2.jpg" class="banner" id="b_2">
                    <img src="assets/banner_3.jpg" class="banner" id="b_3">
                    <img src="assets/banner_1.jpg" class="banner" id="b_1">
                </div>
            </div>
        </div>
        <div class="banner_transformer">
            <button class="back"><img src="assets/banner_transform.svg" class="back_image"></button>
            <button class="next"><img src="assets/banner_transform.svg" class="next_image"></button>
        </div>
        <div class="banner_marker">
            <div class="marker marker_active m_1"></div>
            <div class="marker m_2"></div>
            <div class="marker m_3"></div>
        </div>
        <div class="side_bar">
            <div class="side_bar_container">
                <div class="side_bar_content">
                    <h4 class="side_bar_item">CopaPromo 12%</h4>
                    <h4 class="side_bar_item">Site 100% Seguro</h4>
                    <h4 class="side_bar_item">Frete Grátis</h4>
                    <h4 class="side_bar_item">Entrega para todo o Brasil</h4>
                    <h4 class="side_bar_item">Cupons pra você aproveitar</h4>
                </div>

                <div aria-hidden class="side_bar_content">
                    <h4 class="side_bar_item">CopaPromo 12%</h4>
                    <h4 class="side_bar_item">Site 100% Seguro</h4>
                    <h4 class="side_bar_item">Frete Grátis</h4>
                    <h4 class="side_bar_item">Entrega para todo o Brasil</h4>
                    <h4 class="side_bar_item">Cupons pra você aproveitar</h4>
                </div>
            </div>

            <div class="borda_blur blur_left">

            </div>
        </div>
    </section>
    <main id="main">
        <section id="produtos">
            <!-- <div class="prod_catalogo_itens">
                <a href="#sementes" class="cat_item">
                    <img src="assets/plantas.jpg" class="cat_item_img">
                    <h4 class="cat_item_title">
                        Plantas
                    </h4>
                </a>
                <a href="#prod_pragas" class="cat_item">
                    <img src="assets/insetsida.svg" class="cat_item_img">
                    <h4 class="cat_item_title">
                        Insetsidas
                    </h4>
                </a>
                <a href="#medidores" class="cat_item">
                    <img src="assets/adubo.svg" class="cat_item_img">
                    <h4 class="cat_item_title">
                        Adubos
                    </h4>
                </a>
                <a href="#ferramentas" class="cat_item">
                    <img src="assets/ferramentas.svg" class="cat_item_img">
                    <h4 class="cat_item_title">
                        Ferramentas
                    </h4>
                </a>
            </div> -->
            <div class="produtos_container">
                
            </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer_container">
            <div class="footer_desc">
                <div class="direitos">
                    <div class="footer_logo">
                        <img src="assets/logo_footer.svg" class="footer_logo_img">
                        <strong> VAL Plantios</strong>
                    </div>
                    <h4>
                        Copyright 2026, todos os direitos reservados
                    </h4>
                    <h4>
                        Feito por Kaiki e Guilherme
                    </h4>
                </div>
                <div class="itens_footer">
                    <div class="item_footer">

                    </div>
                    <div class="item_footer">

                    </div>
                    <div class="item_footer">

                    </div>
                    <div class="item_footer">

                    </div>
                </div>
                <div class="footer_contact">
                    <div class="item_contact">
                        <p>
                            instagram
                        </p>
                        <img src="assets/insta.svg" class="img_contact">
                    </div>

                    <div class="item_contact">
                        <p>
                            twiter
                        </p>
                        <img src="assets/x.svg" class="img_contact">
                    </div>

                    <div class="item_contact">
                        <p>
                            git
                        </p>
                        <img src="assets/git.svg" class="img_contact">
                    </div>
                </div>
                <div class="footer_nav">
                    <ul class="footer_nav_container">
                        <a href="">
                            home
                        </a>
                        <a href="">
                            sobre
                        </a>
                        <a href="">
                            produtos
                        </a>
                        <a href="">
                            serviços
                        </a>
                        <a href="">
                            trabalhe conosco
                        </a>
                        <a href="">
                            agro
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
            <img src="assets/footer.svg">
        </div>
    </footer>

    <!--Importando o lenis-->
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


    ?>

    <!--Arq_js-->
    <script>
        // pegando o conteudo do banco pro js

        let ids = <?php echo json_encode($ids) ?> 
        let nomes = <?php echo json_encode($nomes) ?> 
        let descricoes = <?php echo json_encode($descricoes) ?> 
        let qtds_estoque = <?php echo json_encode($qtds_estoque) ?> 
        let categorias = <?php echo json_encode($categorias) ?> 
        let precos = <?php echo json_encode($precos) ?> 
        let imagens = <?php echo json_encode($imagens) ?> 

        let carrinho_produtos = document.querySelector(".carrinho_produtos");
        const prod_container = document.querySelector(".produtos_container");
        let total_produtos = ids.length;
        let produtos_html = "";
        console.log(total_produtos)
        console.log(ids)

        // inserindo os produtos no html

        for (i = 1; i < total_produtos; i++) {
            produtos_html += `<div class="produto p_${ids[i]}">
                    <a href="../home/produto.php" class="desc_link_${ids[i]}"><img src="${imagens[i]}" class="prod_img"></a>
                    <h3 class="prod_title prod_title_${ids[i]}">

                    </h3>
                    <div class="prod_preco">
                        <h4 class="preco_${ids[i]}">
                            ${ "R$ " + Number(precos[i]).toFixed(2).toString().replace(".", ",")}
                        </h4>
                    </div>
                    <a href="../login/cad.php" class="btn_prod btn_prod_${ids[i]}">
                        Comprar
                    </a>
                    <div class="prod_quant">
                        <div class="prod_quant_container">
                            <img src="assets/quant_prod.svg" class="prod_quant_add prod_quant_add_${ids[i]}">
                            <input type="text" value="1" class="quant_prod_number quant_prod_number_${ids[i]}">
                            <img src="assets/quant_prod.svg" class="prod_quant_remove prod_quant_remove_${ids[i]}">
                        </div>
                        <a class="btn_prod btn_prod_carrinho btn_carrinho_${ids[i]}">
                            Add ao carrinho
                        </a>
                    </div>
                </div>`;

            prod_container.innerHTML = produtos_html;
        }
       

    </script>
    <script src="script/carrinho.js"></script>
    <script src="script/script.js"></script>
    <script src="script/produto.js"></script>
    <!-- <script src="script/produto_desc.js"></script> -->
    <script src="script/hero.js"></script>

</body>

</html>