const img_prod_container = document.querySelector(".img_prod_content");
const prod_desc_preco = document.querySelector(".prod_desc_preco");
const prod_desc_title = document.querySelector(".prod_desc_title");
const produto_desc_desc = document.querySelector(".produto_desc_desc");
let quant_number = document.querySelector(".quant_number");


// carrinho_produtos.innerHTML = l

function adicionar_infos(prod_id, prod_img, prod_preco, prod_nome, prod_desc, prod_qtd) {

    btn_prod_desc_carrinho.classList.add(`btn_prod_desc_carrinho_${prod_id}`);
    document.querySelector(".desc_quant_number").classList.add(`quant_prod_number_${prod_id}`);
    img_prod_container.innerHTML = `<img src="../home/${prod_img}" class="prod_img_prod">`;
    prod_desc_preco.innerHTML = "R$ " + prod_preco;
    prod_desc_title.innerHTML = prod_nome;
    produto_desc_desc.innerHTML = prod_desc;
    quant_number.value = prod_qtd;
    document.querySelector(`.p_${prod_id}`).remove();
}

adicionar_infos(
    localStorage.getItem("prod_id"),
    localStorage.getItem("prod_img"),
    localStorage.getItem("prod_preco"),
    localStorage.getItem("prod_nome"),
    localStorage.getItem("prod_desc"),
    localStorage.getItem("prod_qtd")
);

function adiconar_infos_carrinho(id_do_produto, qtd_prod) {
    console.log("carrinhoo", carrinho);
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
}

if (carrinho_local) {
    const chaves = Object.keys(carrinho_local);

    for (let i = 0; i < chaves.length; i++) {
        adiconar_infos_carrinho(
            chaves[i],
            carrinho_local[chaves[i]]
        );

        console.log("chave = ", chaves[i]);
        console.log("valor = ", carrinho_local[chaves[i]]);
    }
}

prod_back.addEventListener("click", () => {
    const local_prod_id = localStorage.getItem("prod_id");
    console.log("loc", local_prod_id)
})

// produtos_quant

const quant_rem = document.querySelector(".quant_remove");
const quant_add = document.querySelector(".quant_add");
let quant_new_number = 1;

function rem_add(element, opera) {
    element.addEventListener("click", () => {
        if (quant_new_number >= 1) {
            quant_new_number += opera

            if (quant_new_number == 0) {
                quant_new_number = 1;
            }

            quant_number.value = quant_new_number;
        }
    })
}
rem_add(quant_add, 1);
rem_add(quant_rem, -1);

prod_back.addEventListener("click", () => {
    // let posi =
})

console.log(Date.now);