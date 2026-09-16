const carrinho_btn = document.querySelector(".carrinho_btn");
const carrinho_element = document.getElementById("carrinho");
const prod_quant_add_carrinho = document.querySelectorAll(".prod_quant");
const carrinho_title = document.querySelector(".carrinho_title");
const carrinho_html_produtos = document.querySelector(".carrinho_produtos");
const sumario_valor = document.querySelector(".sumario_title_result");
const sumario_total_result = document.querySelector(".sumario_total_result");
const img_anima_caixa = document.querySelector(".img_anima_add_carrinho");
const contador_carrinho = document.querySelector(".contador_carrinho");
let contador_anima = 0;
let prod_id_antes = 0;
let valor_do_sumario = 0;

function adiconar_infos_carrinho() {
    let carrinho_ = localStorage.getItem("carrinho");
    carrinho_ = JSON.parse(carrinho_)

    console.log('carrinho_voltou', carrinho_);
}
adiconar_infos_carrinho()


let click_fechar = false;
let click_pagina = false;

setInterval(() => {
    if (carrinho_produtos.innerHTML.length === 0) {
        carrinho_title.innerHTML = "Carrinho Vazio";
    } else {
        carrinho_title.innerHTML = "";
    }
}, 100)
prod_quant_add_carrinho.forEach((element) => {
    element.addEventListener("click", () => {
        click_pagina = true;
        setTimeout(() => { click_pagina = false; }, 50)
    })
})

let btn_liberado = false;

carrinho_btn.addEventListener("click", () => {

    if (btn_liberado) { return };

    btn_liberado = true;

    console.log("carrinhi_aberto")
    carrinho_element.classList.add("carrinho_active");
    setTimeout(() => { click_fechar = true; }, 100)
    setTimeout(() => { btn_liberado = false; }, 500)
});

carrinho_element.addEventListener("click", () => {
    click_pagina = true;
    setTimeout(() => { click_pagina = false; }, 50)
})
window.addEventListener("click", () => {
    if (click_fechar && !click_pagina) {
        carrinho_element.classList.remove("carrinho_active");
        click_fechar = false;
    }
})

// carrinho

let Botoes_de_adicionar_ao_carrinho = [];
let Carrinho_sem_conta = {};
let preco_tot_sumario = 0;
let preco_tot_sumario_c_frete = 0;
let frete = 0;

let carrinho_local = localStorage.getItem("carrinho");
carrinho_local = JSON.parse(carrinho_local);

if (carrinho_local) {
    Carrinho_sem_conta = carrinho_local;
}

function adiconar_infos_carrinho(id_do_produto, qtd_prod, tamanho_carrinho) {
    if (id_do_produto != undefined || id_do_produto != null) {
        let preco_total = Number(precos[id_do_produto]) * Number(qtd_prod);

        let carrinho_html = `<div class="carrinho_prod_item carrinho_prod_item_${id_do_produto}">
                                                
                    <div class="img_carrinho_prod img_carrinho_prod_${id_do_produto}">
                        <img src=../home/${imagens[id_do_produto]}>
                    </div>
                    <div class="carrinho_prod_infos">
                        <h4 class="carrinho_prod_preco carrinho_prod_preco_${id_do_produto}">
                            ${"R$ " + Number(precos[id_do_produto]).toFixed(2).toString().replace(".", ",")}
                        </h4>
                        <div class="carrinho_prod_quant">
                            <img src="../home/assets/quant_prod.svg" class="carrinho_prod_quant_add carrinho_prod_quant_add_${id_do_produto}">
                            <input type="text" value="${qtd_prod}"
                                class="carrinho_quant_prod_number carrinho_quant_prod_number_${id_do_produto}">
                            <img src="../home/assets/quant_prod_sub.svg" class="carrinho_prod_quant_remove carrinho_prod_quant_remove_${id_do_produto}">
                        </div>

                        <h4 class="carrinho_preco_total carrinho_preco_total_${id_do_produto}">
                            ${"R$ " + preco_total.toFixed(2).toString().replace(".", ",")}
                        </h4>

                        <img src="../home/assets/remove_prod_img.svg" class="prod_remove prod_remove_${id_do_produto}">
                    </div>
                </div>`;

        if (!carrinho_html_produtos.querySelector(`.carrinho_prod_item_${id_do_produto}`)) {
            carrinho_html_produtos.innerHTML += carrinho_html;
        }

        preco_tot_sumario += preco_total
        preco_tot_sumario_c_frete = preco_tot_sumario + frete;

        valor_do_sumario = preco_tot_sumario;

        sumario_valor.innerHTML = "R$ " + preco_tot_sumario.toFixed(2).toString().replace(".", ",");
        sumario_total_result.innerHTML = "R$ " + preco_tot_sumario_c_frete.toFixed(2).toString().replace(".", ",");

        contador_carrinho.classList.add("contador_carrinho_animacao");
        contador_anima = tamanho_carrinho
        contador_carrinho.innerHTML = tamanho_carrinho;

        setTimeout(() => {
            contador_carrinho.classList.remove("contador_carrinho_animacao");
        }, 500)

        iniciar_chamado_da_funcao_de_remover();
    }
}

if (carrinho_local) {
    const chaves = Object.keys(carrinho_local);

    for (let i = 0; i < chaves.length; i++) {
        adiconar_infos_carrinho(
            chaves[i],
            carrinho_local[chaves[i]],
            chaves.length
        );

        console.log("chave = ", chaves[i]);
        console.log("valor = ", carrinho_local[chaves[i]]);
    }
}

function coletar_botoes_do_carrinho() {
    for (let i = 1; i < total_produtos; i++) {
        Botoes_de_adicionar_ao_carrinho[i] = document.querySelector(`.btn_carrinho_${i}`);
    }
}
console.log(Botoes_de_adicionar_ao_carrinho)
coletar_botoes_do_carrinho();

let verificacao = false;

if (carrinho_local != null) {
    verificacao = true;
}

function Adicionar_produtos_ao_carrinho(id_do_produto) {

    for (let i = 1; i < total_produtos; i++) {
        if ((verificacao && carrinho_local[id_do_produto]) || Carrinho_sem_conta[id_do_produto]) {
            console.log("Item já está no carrinho");
            document.querySelector(".carrinho_mensagem").classList.add("carrinho_mensagem_active");
            setTimeout(() => {
                document.querySelector(".carrinho_mensagem").classList.remove("carrinho_mensagem_active");
            }, 800)
            return;
        }
    }
    // if (indice_posicao_produto_no_carrinho == )

    animação_de_adiconar_ao_carrinho(`../home/assets/produtos_image/prod_${id_do_produto}.jpg`, id_do_produto);

    console.log("car", Carrinho_sem_conta)
    let qtd_prod = document.querySelector(`.quant_prod_number_${id_do_produto}`).value;

    Carrinho_sem_conta[id_do_produto] = qtd_prod;
    console.log(Carrinho_sem_conta);


    const preco_total = Math.min(Number(precos[id_do_produto]) * qtd_prod);
    console.log(preco_total);
    valor_do_sumario += preco_total;

    const carrinho_item_html = `<div class="carrinho_prod_item carrinho_prod_item_${id_do_produto}">
                                                
                    <div class="img_carrinho_prod img_carrinho_prod_${id_do_produto}">
                        <img src=../home/${imagens[id_do_produto]}>
                    </div>
                    <div class="carrinho_prod_infos">
                        <h4 class="carrinho_prod_preco carrinho_prod_preco_${id_do_produto}">
                            ${"R$ " + Number(precos[id_do_produto]).toFixed(2).toString().replace(".", ",")}
                        </h4>
                        <div class="carrinho_prod_quant">
                            <img src="../home/assets/quant_prod.svg" class="carrinho_prod_quant_add carrinho_prod_quant_add_${id_do_produto}">
                            <input type="text" value="${qtd_prod}"
                                class="carrinho_quant_prod_number carrinho_quant_prod_number_${id_do_produto}">
                            <img src="../home/assets/quant_prod_sub.svg" class="carrinho_prod_quant_remove carrinho_prod_quant_remove_${id_do_produto}">
                        </div>

                        <h4 class="carrinho_preco_total carrinho_preco_total_${id_do_produto}">
                            ${"R$ " + preco_total.toFixed(2).toString().replace(".", ",")}
                        </h4>

                        <img src="../home/assets/remove_prod_img.svg" class="prod_remove prod_remove_${id_do_produto}">
                    </div>
                </div>`;

    carrinho_html_produtos.innerHTML += carrinho_item_html;

    sumario_valor.innerHTML = 'R$ ' + valor_do_sumario.toFixed(2).toString().replace(".", ",");

    const frete_content = document.querySelector(".frete_result");
    let valor_do_frete = Number(frete_content.innerHTML.replace(",", "."));


    sumario_total_result.innerHTML = 'R$ ' + (valor_do_sumario + valor_do_frete).toFixed(2).toString().replace(".", ",");
    console.log("carrinho+", Carrinho_sem_conta)

    // Carrinho_sem_conta.filter(item => item != null);

    localStorage.setItem("carrinho", JSON.stringify(Carrinho_sem_conta));
    localStorage.setItem("preco_tot", JSON.stringify(preco_total));
}

// remover produtos usando o id

function Remover_produtos_do_carrinho(id_do_produto) {
    const item_a_ser_removido = document.querySelector(`.carrinho_prod_item_${id_do_produto}`);
    let qtd_prod = document.querySelector(`.quant_prod_number_${id_do_produto}`).value;

    if (item_a_ser_removido) {
        item_a_ser_removido.remove();
    }

    console.log("Id do produto", id_do_produto)
    if (!Carrinho_sem_conta[id_do_produto]) {
        return;
    }

    console.log("ii,,", id_do_produto)
    let preco_total = precos[id_do_produto] * qtd_prod;
    valor_do_sumario -= preco_total;
    console.log("valor_do sumario", valor_do_sumario)


    const sumario_valor = document.querySelector(".sumario_title_result");
    sumario_valor.innerHTML = valor_do_sumario.toFixed(2).toString().replace(".", ",");

    delete Carrinho_sem_conta[id_do_produto];
    console.log(Carrinho_sem_conta);

    const frete_content = document.querySelector(".frete_result");
    let valor_do_frete = Number(frete_content.innerHTML.replace(",", "."));

    const sumario_total_result = document.querySelector(".sumario_total_result");
    let valor_do_result = (valor_do_sumario + valor_do_frete).toFixed(2);
    sumario_total_result.innerHTML = valor_do_result;

    animação_de_remover_do_carrinho();
    localStorage.setItem("carrinho", JSON.stringify(Carrinho_sem_conta));
    localStorage.setItem("preco_tot", JSON.stringify(preco_total));
}


// chamando a função de adicionar produtos por meio de outra função para evitar que
//  algo execute na hora errada ou que parametros sejam passados de forma errada

function Chamar_funcao_de_adicionar_ao_carrinho(Botao_clicado, id_do_botao) {
    Botao_clicado.addEventListener("click", () => {
        Adicionar_produtos_ao_carrinho(id_do_botao);
        iniciar_chamado_da_funcao_de_remover();
    })
}
function Chamar_funcao_de_remover_do_carrinho(Botao_clicado, id_do_produto) {
    if (Botao_clicado) {
        Botao_clicado.addEventListener("click", () => {
            Remover_produtos_do_carrinho(id_do_produto);
        });
    }
}
for (let i = 1; i < total_produtos; i++) {
    Chamar_funcao_de_adicionar_ao_carrinho(document.querySelector(`.btn_carrinho_${i}`), i);
}
function iniciar_chamado_da_funcao_de_remover() {
    for (let i = 1; i < total_produtos; i++) {
        Chamar_funcao_de_remover_do_carrinho(document.querySelector(`.prod_remove_${i}`), i);
    }
}

function animação_de_adiconar_ao_carrinho(prod_image, prod_id) {

    img_anima_caixa.innerHTML += `<img src="../home/${prod_image}" class="img_anima_add_carrinho img_anima_add_carrinho_${prod_id}">`;
    document.querySelector(`.img_anima_add_carrinho_${prod_id}`).classList.add("animação_da_imagem");
    contador_carrinho.classList.add("contador_carrinho_animacao");

    setTimeout(() => {
        document.querySelector(`.img_anima_add_carrinho_${prod_id}`).classList.remove("animação_da_imagem");
        document.querySelector(`.img_anima_add_carrinho_${prod_id}`).classList.remove("animação_da_imagem");
        document.querySelector(`.img_anima_add_carrinho_${prod_id}`).remove();
        contador_carrinho.classList.remove("contador_carrinho_animacao");
        if (contador_anima < 10) {
            contador_anima += 1;
            contador_carrinho.innerHTML = contador_anima;
        } else {
            contador_carrinho.innerHTML = "...";
        }
    }, 600)
}

function animação_de_remover_do_carrinho() {
    contador_anima -= 1;
    contador_carrinho.innerHTML = contador_anima;
}

let local_id = localStorage.getItem("prod_id");
console.log("iddddd", local_id)
console.log("doc", document.querySelector(`.btn_prod_desc_carrinho_${local_id}`));

const btn_prod_desc_carrinho = document.querySelector(".btn_prod_desc_carrinho");

btn_prod_desc_carrinho.addEventListener("click", () => {
    Chamar_funcao_de_adicionar_ao_carrinho(document.querySelector(`.btn_prod_desc_carrinho_${local_id}`), local_id);
})



// amanha, terminar a prod_desc










