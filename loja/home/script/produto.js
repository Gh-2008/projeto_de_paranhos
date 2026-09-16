let prod_qtd_add = [];
let prod_qtd_rem = [];

for (let i = 1; i < total_produtos; i++) {
    prod_qtd_add[i] = document.querySelector(`.prod_quant_add_${i}`);
    prod_qtd_rem[i] = document.querySelector(`.prod_quant_remove_${i}`);
}

function prod_qtd(add, rem, id) {
    let value = 1;
    add.addEventListener("click", () => {
        if (value < 10) {
            value += 1;
        }
        document.querySelector(`.quant_prod_number_${id}`).value = value;
    })
    rem.addEventListener("click", () => {
        if (value > 0) {
            value -= 1;
            if (value == 0) {
                value = 1;
            }
        }
        document.querySelector(`.quant_prod_number_${id}`).value = value;
    })
}
for (let i = 1; i < total_produtos; i++) {
    prod_qtd(
        prod_qtd_add[i],
        prod_qtd_rem[i],
        i
    )
}


var prod_desc_links = {};
var prod_desc_descrição = {};
const btn_desc_add_carrinho = document.querySelector(".btn_prod_desc_carrinho");

for (let i = 1; i <= total_produtos; i++) {
    prod_desc_links[`desc_link_${i}`] = document.querySelector(`.desc_link_${i}`);
}

// click para descrição do prod
function btn_s(desc_link, prod_id, prod_img, prod_preco, prod_nome, prod_desc, prod_qtd) {

    desc_link.addEventListener("click", () => {
        // document.documentElement.style.overflow = "hidden";

        localStorage.setItem("prod_id", prod_id);
        localStorage.setItem("prod_img", prod_img);
        localStorage.setItem("prod_preco", prod_preco);
        localStorage.setItem("prod_nome", prod_nome);
        localStorage.setItem("prod_desc", prod_desc);
        localStorage.setItem("prod_qtd", prod_qtd);
        localStorage.setItem("posi", window.scrollY);
    })
}

console.log(imagens[1])
for (let i = 1; i < total_produtos; i++) {
    btn_s(
        prod_desc_links[`desc_link_${i}`],
        ids[i],
        imagens[i],
        Number(precos[i]).toFixed(2).toString().replace(".", ","),
        nomes[i],
        descricoes[i],
        document.querySelector(`.quant_prod_number_${i}`).value
    );
}

const prod_back = document.querySelector(".prod_back");


